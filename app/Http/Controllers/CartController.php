<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Cart;
use App\Nhanvien;
use App\Sanpham;
use App\Donhang;
use App\Chitietdonhang;
use App\Vanchuyen;
use App\Thanhtoan;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Classes\ActivationService;

class CartController extends Controller
{
    public function muahang($id)
    {
        $sanphammua = Sanpham::find($id);
        if ($sanphammua->sp_soLuongHienTai == 0) {
            return redirect()->back()->with('alert', 'Sản phẩm đã hết hàng vui lòng chọn sản phẩm khác');
        } else {
            Cart::add(array(
                    'id' => $id,
                    'name' => $sanphammua->sp_ten,
                    'price' => $sanphammua->sp_giaBan,
                    'quantity' => 1,
                    'attributes' => array('img' => $sanphammua->sp_hinh, 'giaban' => $sanphammua->sp_giaBan,
                                           'size' =>$sanphammua->s_ten ))
            );
            $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

            $output->writeln('hello');

            return redirect()->route('giohang');
        }
    }

    public function muahangchitiet(Request $request, $id)
    {

        $sanphammua = Sanpham::find($id);
        if ($sanphammua->sp_soLuongHienTai == 0) {
            return redirect()->back()->with('alert', 'Sản phẩm đã hết hàng vui lòng chọn sản phẩm khác');
        } else {
            Cart::add(array(
                    'id' => $id,
                    'name' => $sanphammua->sp_ten,
                    'price' => $sanphammua->sp_giaBan,
                    'quantity' => Request::get('spdh_soLuong'), //dh_soluong???
                    'attributes' => array('img' => $sanphammua->sp_anhDaiDien, 'giagoc' => $sanphammua->sp_giaBan,
                                            'size' =>$sanphammua->s_ten  ))
            );
            $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

            $output->writeln('hello');

            return redirect()->route('giohang');
        }
    }

    public function add_product_cart($id)
    {   
        // Cart::clear();
        $sanphammua = Sanpham::find($id);
        Cart::add(array(
            'id' => $id,
            'name' => $sanphammua->sp_ten,
            'price' => $sanphammua->sp_giaBan,
            'quantity' => 1,
            'attributes' => array('img' => $sanphammua->sp_hinh, 'giaban' => $sanphammua->sp_giaBan,
                                'size' =>$sanphammua->s_ma ))
        );
        return redirect()->back();
        
    }

    public function index()
    {
        $cart = Cart::getContent();
        $total = Cart::getSubTotal();
        return view('frontend.cart', compact('cart'))->with('total',$total);
    }

    public function xoasanpham($id)
    {
        Cart::remove($id);
        return redirect()->action(
            'CartController@index');
    }

    public function capnhattang($id)
    {
        $sp = 0;
        $cartInfor = Cart::getContent();
        foreach ($cartInfor as $key => $item) {
            if ($item->id == $id)
                $sp = $item->quantity;
        }

        $sanphammua = Sanpham::find($id);
        if (($sanphammua->sp_soLuongHienTai) - $sp == 0) {
            return redirect()->back()->with('alert', 'Sản phẩm đã hết số lượng mong muốn của bạn');
        } else {
            Cart::update($id, array(
                'quantity' => +1
            ));

            return redirect()->action(
                'CartController@index');
        }
    }

    public function capnhatgiam($id)
    {

        Cart::update($id, array(
            'quantity' => -1
        ));
        return redirect()->action(
            'CartController@index');
    }

    public function themdonhang(Request $request)
    {
        try {
            // $cartInfor = Cart::getContent();
            $dh = new Donhang();
            if (isset(Auth::user()->name)) {
                $dh->id = Auth::user()->id;
            } else {
                $dh->id = 0;
            }
            $dh->dh_tenKhachHang = Request::get('dh_tenKhachHang');
            $dh->dh_email = Request::get('dh_email');
            $dh->dh_diaChi = Request::get('dh_diaChi');
            $dh->dh_dienThoai = Request::get('dh_dienThoai');
            if (Cart::getSubTotal() < 500000) {
                $dh->dh_tongcong = str_replace(',', '', Cart::getSubTotal() + 30000);
            } else {
                $dh->dh_tongcong = str_replace(',', '', Cart::getSubTotal());
            }

            $dh->vc_ma = Request::get('vc_ma');
            $dh->tt_ma = Request::get('tt_ma');
            
            $dh->nv_xuLy = Request::get('nv_ma', '6'); 
            $dh->nv_giaoHang = Request::get('nv_ma', '7'); 
            
            $dh->save();
            // if (count($cartInfor) > 0) {
            //     foreach ($cartInfor as $key => $item) {
            //         $spdh = new Chitietdonhang();
            //         $spdh->dh_ma = $dh->dh_ma;
            //         $spdh->sp_ma = $item->id;
            //         $spdh->s_ma = $item->id;
            //         $spdh->spdh_soLuong = $item->quantity;
            //         $spdh->spdh_donGia = $item->price;
            //         $spdh->save();
            //         $sp = DB::table('sanpham')
            //             ->where('sp_ma', $item->id)
            //             ->first();
            //         DB::table('sanpham')
            //             ->where('sp_ma', $item->id)
            //             ->update(['sp_soLuongHienTai' => $sp->sp_soLuongHienTai - $item->quantity]);
            //     }
            // }
            Cart::clear();
            return redirect(route('frontend.home'))
                ->with('alert', 'Đặt hàng thành công');
        } catch (QueryException $ex) {
            return response([
                'error' => true, 'message' => $ex->getMessage()
            ], 500);
        }
    }

    public function thongtindathang()
    {

        $cart = Cart::getContent();
        $total = Cart::getSubTotal();
        if($total>0)
        {

            $tt = Thanhtoan::all();
            $vc = Vanchuyen::all();
            return view('frontend.dathang', compact('cart', 'total'))
                ->with('thanhtoan', $tt)
                ->with('vanchuyen', $vc);
        }
        else{
            return redirect()->back()->with('alert', 'Vui lòng lựa chọn sản phẩm');
        }

    }

}
