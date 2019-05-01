<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use App\Mau;
use App\Xuatxu;
use App\Sanpham;
use App\Vanchuyen;
use App\Khachhang;
use App\Donhang;
use App\Thanhtoan;
use App\Chitietdonhang;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\ContactMailer;
use App\Mail\OrderMailer;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class FrontendController extends Controller
{
    /**
 * Action hiển thị view Trang chủ
 * GET /
 */
public function index(Request $request)
{


    // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
    $ds_top3_newest_loaisanpham = DB::table('loai')
                                ->join('sanpham', 'loai.l_ma', '=', 'sanpham.l_ma')
                                ->orderBy('l_capNhat')->take(3)->get();
    
    // Query tìm danh sách sản phẩm
    $danhsachsanpham = $this->getSearch($request);


     // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
    $danhsachhinhanhlienquan = DB::table('hinhanh')
        ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
        ->get();

     // Query danh sách Loại
    $danhsachloai = Loai::all();

     // Query danh sách màu
    $danhsachmau = Mau::all();

    // Hiển thị view `frontend.index` với dữ liệu truyền vào
    return view('frontend.index')
        ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
        ->with('danhsachsanpham', $danhsachsanpham)
        ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
        ->with('danhsachmau', $danhsachmau)
        ->with('danhsachloai', $danhsachloai);
}

// private function searchSanPham(Request $request)
// {
//     $query = DB::table('sanpham')->select('*');
//     // Kiểm tra điều kiện `searchByLoaiMa`
//     $searchByLoaiMa = $request->query('searchByLoaiMa');
//     if($searchByLoaiMa != null)
//     {
//         $query->where('l_ma', $searchByLoaiMa);
//     }
    
//     $data = $query->get();
//     return $data;
// }

public function getSearch(Request $req){
    $tk = Sanpham::where('sp_ten', 'like', '%'.$req->key.'%')
                    ->orWhere('sp_giaBan', $req->key)
                    ->get();
    return view('frontend.search', compact('tk'));
}

/**
 * Hàm query danh sách sản phẩm theo nhiều điều kiện
 */
// public function searchpage($tukhoa)
// {

//     $ta = str_replace('-', ' ', $tukhoa);
//         $ds_loai = Loai::all();
//         $data = DB::table('sanpham')
//             ->join('loai', 'sanpham.l_ma', '=', 'loai.l_ma')
//             ->where('sp_ten', 'LIKE', "%{$ta}%")
//             ->orWhere('l_ten', 'LIKE', "%{$ta}%")
//             ->orderBy('sp_giaBan', 'ASC')
//             ->paginate(10);
//         $count = DB::table('sanpham')
//             ->where('sp_ten', 'LIKE', "%{$ta}%")
//             ->count();
//         return view('frontend.ketquatimkiem')
//             ->with('data', $data)
//             ->with('count', $count)
//             ->with('danhsachloai', $ds_loai);
// }

// public function searchpage_gia($gia1, $gia2)
//     {
//         $ds_loai = Loai::all();
//         if ($gia2 == 'Hight') {
//             $data = DB::table('sanpham')
//              ->join('loai', 'sanpham.l_ma', '=', 'loai.l_ma')
//                 ->where('sp_giaBan', '>', $gia1)
//                 ->orderBy('sp_giaBan', 'ASC')
//                 ->paginate(10);
//             $count = DB::table('sanpham')
//                 ->join('loai', 'sanpham.l_ma', '=', 'loai.l_ma')
//                 ->where('sp_giaBan', '>', $gia1)
//                 ->count();
//         } else {
//             $data = DB::table('sanpham')
//                 ->join('loai', 'sanpham.l_ma', '=', 'loai.l_ma')
//                 ->where('sp_giaBan', '>', $gia1)
//                 ->where('sp_giaBan', '<', $gia2)
//                 ->orderBy('sp_giaBan', 'ASC')
//                 ->paginate(10);
//             $count = DB::table('sanpham')
//                 ->join('loai', 'sanpham.l_ma', '=', 'loai.l_ma')
//                 ->where('sp_giaBan', '>', $gia1)
//                 ->where('sp_giaBan', '<', $gia2)
//                 ->count();
//         }

//         return view('frontend.ketquatimkiem')
//             ->with('data', $data)
//             ->with('count', $count)
//             ->with('danhsach', $ds_loai);
//     }

    

public function about ()
    {
        return view('frontend.pages.about');
    }

// page thu do online
public function trying ()
{
    return view('frontend.pages.tryingonl');
}

public function contact ()
    {
        return view('frontend.pages.contact');
    }

public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('tester.agmk@gmail.com')
            ->send(new ContactMailer($input));
        return $input;
    } 

/**
 * Action hiển thị chi tiết Sản phẩm
 */
public function productDetail(Request $request, $id)
    {
    $sp = Sanpham::find($id);
    // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
    $danhsachhinhanhlienquan = DB::table('hinhanh')
                            ->where('sp_ma', $id)
                            ->get();
    // Query danh sách Loại
    $danhsachloai = Loai::all();
    // Query danh sách màu
   $danhsachmau = Mau::all();
   $dsxuatxu = Xuatxu::all();
    return view('frontend.pages.product-detail')
        ->with('sp', $sp)
        ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
       ->with('danhsachmau', $danhsachmau)
       ->with('dsxuatxu', $dsxuatxu)
        ->with('danhsachloai', $danhsachloai);
    }

/**
 * Action hiển thị danh sách Sản phẩm
 */
public function product(Request $request)
{
    // Query tìm danh sách sản phẩm
    $danhsachsanpham = $this->searchSanPham($request);
    // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
    $danhsachhinhanhlienquan = DB::table('hinhanh')
                            ->whereIn('sp_ma', $danhsachsanpham->pluck('sp_ma')->toArray())
                            ->get();
    // Query danh sách Loại
    $danhsachloai = Loai::all();
    // Query danh sách màu
    $danhsachmau = Mau::all();
    // Hiển thị view `frontend.index` với dữ liệu truyền vào
    return view('frontend.pages.product')
        ->with('danhsachsanpham', $danhsachsanpham)
        ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
        ->with('danhsachmau', $danhsachmau)
        ->with('danhsachloai', $danhsachloai);
}

    /**
 * Action hiển thị giỏ hàng
 */
    public function cart(Request $request)
    {
         //Query danh sách hình thức vận chuyển
    $vanchuyen = Vanchuyen::all();
     //Query danh sách phương thức thanh toán
    $thanhtoan = Thanhtoan::all();
    return view('frontend.cart')
         ->with('vanchuyen', $vanchuyen)
         ->with('thanhtoan', $thanhtoan);
    }

    /**
 * Action Đặt hàng
 */
public function order(Request $request)
{
    // dd($request);
    // Data gởi mail
    $dataMail = [];
    try {
        // Tạo mới khách hàng
        $khachhang = new Khachhang();
        $khachhang->kh_hoTen = $request->khachhang['kh_hoTen'];
        $khachhang->kh_gioiTinh = $request->khachhang['kh_gioiTinh'];
        $khachhang->kh_email = $request->khachhang['kh_email'];
        $khachhang->kh_ngaySinh = $request->khachhang['kh_ngaySinh'];
        if(!empty($request->khachhang['kh_diaChi'])) {
            $khachhang->kh_diaChi = $request->khachhang['kh_diaChi'];
        }
        if(!empty($request->khachhang['kh_dienThoai'])) {
            $khachhang->kh_dienThoai = $request->khachhang['kh_dienThoai'];
        }
        $khachhang->kh_trangThai = 2; // Khả dụng
        $khachhang->save();
        $dataMail['khachhang'] = $khachhang->toArray();
        // Tạo mới đơn hàng
        $donhang = new Donhang();
        $donhang->kh_ma = $khachhang->kh_ma;
        $donhang->dh_thoiGianDatHang = Carbon::now();
        $donhang->dh_thoiGianNhanHang = $request->donhang['dh_thoiGianNhanHang'];
        $donhang->dh_nguoiNhan = $request->donhang['dh_nguoiNhan'];
        $donhang->dh_diaChi = $request->donhang['dh_diaChi'];
        $donhang->dh_dienThoai = $request->donhang['dh_dienThoai'];
        $donhang->dh_daThanhToan = 0; //Chưa thanh toán
        $donhang->nv_xuLy = 1; //Mặc định nhân viên đầu tiên
        $donhang->nv_giaoHang = 1; //Mặc định nhân viên đầu tiên
        $donhang->dh_trangThai = 1; //Nhận đơn
        $donhang->vc_ma = $request->donhang['vc_ma'];
        $donhang->tt_ma = $request->donhang['tt_ma'];
        $donhang->save();
        $dataMail['donhang'] = $donhang->toArray();
        // Lưu chi tiết đơn hàng
        foreach($request->giohang['items'] as $sp)
        {
            $chitietdonhang = new Chitietdonhang();
            $chitietdonhang->dh_ma = $donhang->dh_ma;
            $chitietdonhang->sp_ma = $sp['_id'];
            $chitietdonhang->m_ma = 1;
            $chitietdonhang->dhsp_soLuong = $sp['_quantity'];
            $chitietdonhang->dhsp_donGia = $sp['_price'];
            $chitietdonhang->save();
            $dataMail['donhang']['chitiet'][] = $chitietdonhang->toArray();
            $dataMail['donhang']['giohang'][] = $sp;
        }
        // Gởi mail khách hàng
        // dd($dataMail);
        Mail::to($khachhang->kh_email)
            ->send(new OrderMailer($dataMail));
    }
    catch(ValidationException $e) {
        return response()->json(array(
            'code'  => 500,
            'message' => $e,
            'redirectUrl' => route('frontend.home')
        ));
    } 
    catch(\Exception $e) {
        throw $e;
    }
    return response()->json(array(
        'code'  => 200,
        'message' => 'Tạo đơn hàng thành công!',
        'redirectUrl' => route('frontend.orderFinish')
    ));
}
/**
 * Action Hoàn tất Đặt hàng
 */
public function orderFinish()
{
    return view('frontend.pages.order-finish');
}

    public function dangky()
    {
        return view('dangky');
    }
    public function checkLogin(Request $request) {
    	$rules = [
    		'password' => 'required|min:5'
    	];
    	$messages = [
    		'password.required' => 'Mật khẩu là bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$username = $request->input('username');
    		$password = $request->input('password');

    		if( Auth::attempt(['username' => $username, 'password' =>$password])) {
    			return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin' => ' Mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->intended('/');
     }

  
}



