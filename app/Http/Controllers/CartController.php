<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Cart;
use App\Sanpham;
use App\Donhang;
use App\Chitietdonhang;
//use App\SanPhamKhuyenMai;
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
    // public function index(){
    //     Cart::add(array(
    //         array(
    //             'id' => 456,
    //             'name' => 'Sample Item 1',
    //             'price' => 67.99,
    //             'quantity' => 4,
    //             'attributes' => array()
    //         ),
    //         array(
    //             'id' => 568,
    //             'name' => 'Sample Item 2',
    //             'price' => 69.25,
    //             'quantity' => 4,
    //             'attributes' => array(
    //               'size' => 'L',
    //               'color' => 'blue'
    //             )
    //         ),
    //       ));
    //       $data = Cart::getContent();
    
    //     return view('frontend.cart')
    //     ->with('data', $data);
    // }
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
                    'attributes' => array('img' => $sanphammua->sp_hinh, 'giaban' => $sanphammua->sp_giaBan))
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
            'attributes' => array('img' => $sanphammua->sp_hinh, 'giaban' => $sanphammua->sp_giaBan))
        );
        return redirect()->route('san-pham');
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


}
