<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
/*
use App\Loai;
Route::get('/danhsachloai', function() {
    //Eloquent model để lấy DL
    //$ds_loai = Loai::all(); //= select * from loai
    //$json = json_encode($ds_loai);
    //return $json;
   $ds_loai = DB::table('loai') ->get(); //Query builder
   $json = json_encode($ds_loai);
   return $json;
});
use App\Chude;
Route::get('/danhsachchude', function() {
    //$ds_chude = Chude::all(); //= select * from chude
    //$json = json_encode($ds_chude);
    //return $json;
    $ds_chude = DB::table('chude') ->get(); //Query builder
    $json = json_encode($ds_chude);
    return $json;
});
*/
Auth::routes();
Route::get('/danhsachloai', 'LoaiController@index')->name('danhsachloai.index');
Route::get('/danhsachloai/create', 'LoaiController@create')->name('danhsachloai.create');
Route::post('/danhsachloai/store', 'LoaiController@store')->name('danhsachloai.store');

Route::get('/danhsachsanpham', 'SanphamController@index')->name('danhsachsanpham.index');
Route::put('/danhsachloai/{id}', 'LoaiController@update')->name('danhsachloai.update');
Route::get('/danhsachloai/{id}', 'LoaiController@edit')->name('danhsachloai.edit');
Route::delete('/danhsachloai/{id}', 'LoaiController@destroy')->name('danhsachloai.destroy');

//route mau san pham
Route::get('/danhsachmau', 'MauController@index')->name('danhsachmau.index');
Route::get('/danhsachmau/create', 'MauController@create')->name('danhsachmau.create');
Route::post('/danhsachmau/store', 'MauController@store')->name('danhsachmau.store');
Route::get('/danhsachmau/{id}', 'MauController@edit')->name('danhsachmau.edit');
Route::delete('/danhsachmau/{id}', 'MauController@destroy')->name('danhsachmau.destroy');
Route::put('/danhsachmau/{id}', 'MauController@update')->name('danhsachmau.update');
//route san pham
Route::get('/danhsachsanpham/excel', 'SanphamController@excel')->name('danhsachsanpham.excel');
Route::get('/danhsachsanpham/pdf', 'SanphamController@pdf')->name('danhsachsanpham.pdf');
Route::get('/admin/danhsachsanpham/print', 'SanphamController@print')->name('danhsachsanpham.print');

//route size (model) san pham
Route::get('/danhsachmodel', 'ModelsController@index')->name('danhsachmodel.index');
Route::get('/danhsachmodel/create', 'ModelsController@create')->name('danhsachmodel.create');
Route::post('/danhsachmodel/store', 'ModelsController@store')->name('danhsachmodel.store');
Route::get('/danhsachmodel/{id}', 'ModelsController@edit')->name('danhsachmodel.edit');
Route::delete('/danhsachmodel/{id}', 'ModelsController@destroy')->name('danhsachmodel.destroy');
Route::put('/danhsachmodel/{id}', 'ModelsController@update')->name('danhsachmodel.update');
//route nha cung cap
Route::get('/danhsachnhacungcap', 'NhacungcapController@index')->name('danhsachnhacungcap.index');
Route::get('/danhsachnhacungcap/create', 'NhacungcapController@create')->name('danhsachnhacungcap.create');
Route::post('/danhsachnhacungcap/store', 'NhacungcapController@store')->name('danhsachnhacungcap.store');
Route::get('/danhsachnhacungcap/{id}', 'NhacungcapController@edit')->name('danhsachnhacungcap.edit');
Route::delete('/danhsachnhacungcap/{id}', 'NhacungcapController@destroy')->name('danhsachnhacungcap.destroy');
Route::put('/danhsachnhacungcap/{id}', 'NhacungcapController@update')->name('danhsachnhacungcap.update');

Route::get('/danhsachnhacungcap/excel', 'NhacungcapController@excel')->name('danhsachnhacungcap.excel');
Route::get('/danhsachnhacungcap/pdf', 'NhacungcapController@pdf')->name('danhsachnhacungcap.pdf');
Route::get('/admin/danhsachnhacungcap/print', 'NhacungcapController@print')->name('danhsachnhacungcap.print');
//khachhang
Route::get('/danhsachkhachhang', 'UserController@index')->name('danhsachkhachhang.index');
Route::delete('/danhsachkhachhang/{id}', 'UserController@destroy')->name('danhsachkhachhang.destroy');
//nhanvien
Route::get('/danhsachnhanvien', 'NhanvienController@index')->name('danhsachnhanvien.index');
Route::get('/danhsachnhanvien/create', 'NhanvienController@create')->name('danhsachnhanvien.create');
Route::post('/danhsachnhanvien/store', 'NhanvienController@store')->name('danhsachnhanvien.store');
Route::get('/danhsachnhanvien/{id}', 'NhanvienController@edit')->name('danhsachnhanvien.edit');
Route::put('/danhsachnhanvien/{id}', 'NhanvienController@update')->name('danhsachnhanvien.update');
Route::delete('/danhsachnhanvien/{id}', 'NhanvienController@destroy')->name('danhsachnhanvien.destroy');

//phieu nhap
Route::get('/danhsachphieunhap', 'PhieunhapController@index')->name('danhsachphieunhap.index');
Route::get('/danhsachphieunhap/create', 'PhieunhapController@create')->name('danhsachphieunhap.create');
Route::get('/admin/danhsachphieunhap/print', 'PhieunhapController@print')->name('danhsachphieunhap.print');
Route::post('/danhsachphieunhap/store', 'PhieunhapController@store')->name('danhsachphieunhap.store');
Route::get('/danhsachphieunhap/{id}', 'PhieunhapController@edit')->name('danhsachphieunhap.edit');
Route::put('/danhsachphieunhap/{id}', 'PhieunhapController@update')->name('danhsachphieunhap.update');
Route::delete('/danhsachphieunhap/{id}', 'PhieunhapController@destroy')->name('danhsachphieunhap.destroy');

//xuatxu
Route::get('/danhsachxuatxusanpham', 'XuatxuController@index')->name('danhsachxuatxu.index');
Route::get('/danhsachxuatxusanpham/create', 'XuatxuController@create')->name('danhsachxuatxu.create');
Route::post('/danhsachxuatxusanpham/store', 'XuatxuController@store')->name('danhsachxuatxu.store');
Route::get('/danhsachxuatxusanpham/{id}', 'XuatxuController@edit')->name('danhsachxuatxu.edit');
Route::put('/danhsachxuatxusanpham/{id}', 'XuatxuController@update')->name('danhsachxuatxu.update');
Route::delete('/danhsachxuatxusanpham/{id}', 'XuatxuController@destroy')->name('danhsachxuatxu.destroy');

//khuyenmai
Route::get('/danhsachkhuyenmai', 'KhuyenmaiController@index')->name('danhsachkhuyenmai.index');
Route::get('/danhsachkhuyenmai/create', 'KhuyenmaiController@create')->name('danhsachkhuyenmai.create');
Route::post('/danhsachkhuyenmai/store', 'KhuyenmaiController@store')->name('danhsachkhuyenmai.store');
Route::get('/danhsachkhuyenmai/{id}', 'KhuyenmaiController@edit')->name('danhsachkhuyenmai.edit');
Route::put('/danhsachkhuyenmai/{id}', 'KhuyenmaiController@update')->name('danhsachkhuyenmai.update');
Route::delete('/danhsachkhuyenmai/{id}', 'KhuyenmaiController@destroy')->name('danhsachkhuyenmai.destroy');

//donhang
Route::get('/danhsachdonhang', 'DonhangController@index')->name('danhsachdonhang.index');
Route::get('/danhsachdonhang/{id}', 'DonhangController@edit')->name('danhsachdonhang.edit');
Route::put('/danhsachdonhang/{id}', 'DonhangController@update')->name('danhsachdonhang.update');
Route::delete('/danhsachdonhang/{id}', 'DonhangController@destroy')->name('danhsachdonhang.destroy');
Route::get('/chitietdonhang/{id}' , 'CTDHController@index')->name('chitietdonhang.index');

//thanhtoan
Route::get('/danhsachthanhtoan', 'ThanhtoanController@index')->name('danhsachthanhtoan.index');
Route::get('/danhsachthanhtoan/{id}', 'ThanhtoanController@edit')->name('danhsachthanhtoan.edit');
Route::put('/danhsachthanhtoan/{id}', 'ThanhtoanController@update')->name('danhsachthanhtoan.update');
Route::delete('/danhsachthanhtoan/{id}', 'ThanhtoanController@destroy')->name('danhsachthanhtoan.destroy');

Route::resource('danhsachsanpham', 'SanphamController');
Route::resource('danhsachloai', 'LoaiController');
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/thu-do-online', 'FrontendController@trying')->name('frontend.tryingonl');
Route::get('/ket-qua-tim-kiem', 'FrontendController@searchpage')->name('frontend.ketquatimkiem');
Route::get('/gioi-thieu', 'FrontendController@about')->name('frontend.about');
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');
Route::get('/san-pham-a', 'FrontendController@product')->name('frontend.product');
//báo cáo
// Route::get('/admin/baocao/donhang', 'BaoCaoController@donhang')->name('baocao.donhang');
// Route::get('/admin/baocao/donhang/data', 'BaoCaoController@donhangData')->name('baocao.donhang.data');
//languge
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

//regrister&login
Route::get('login','DangnhapAdController@getLogin')->name('frontend.login');
Route::post('/kiem-tra-dang-nhap-admin', 'DangnhapAdController@postLogin')->name('kiemtradangnhapadmin');
Route::get('/admin/login', 'BackendController@login');
Route::get('/admin', 'BackendController@login');
Route::get('/admin/dang-nhap', 'BackendController@logout')->name('dangxuatam');

Route::get('/dangky', 'FrontendController@dangky')->name('frontend.dangky');
Route::get('register','RegisterController@register')->name('frontend.register');
Route::post('/kiem-tra-dang-nhap', 'FrontendController@checkLogin')->name('kiemtradangnhap');
Route::get('/giohang', 'CartController@index')->name('giohang');
Route::get('/giohangz', 'CartController@index')->name('gh');
//log out

//index backend
Route::get('/tong-quat', 'BackendController@index')->name('tongquat');
Route::get('/don-hang', 'DonhangController@index')->name('donhang_index');
Route::get('/don-hang/{id}', 'CartController@themdonhang')->name('themdonhang');
Route::get('/san-pham/cap-nhat/{id}', 'SanphamController@edit')->name('sanpham_edit');
Route::get('/san-pham', 'SanphamController@index')->name('sanpham_index');

//login admin
Route::get('/admin/login', 'BackendController@login')->name('backend.loginadmin');
Route::get('/admin', 'BackendController@login')->name('backend.loginadmin');

Route::get('/logout','FrontendController@getLogout')->name('frontend.dangxuat');
// Route::get('/gio-hang-chi-tiet', 'CartController@index')->name('giohang');
Route::get('/thong-tin-dat-hang','CartController@thongtindathang')->name('frontend.dathang');
Route::get('/mua-hang/{id}', [
	'as'=>'muahang',
    'uses' => 'CartController@add_product_cart']);
Route::get('xoa-san-pham/{id}', [
    'as'=>'xoasanpham',
    'uses' => 'CartController@xoasanpham']);
Route::get('cap-nhat-tang/{id}', [
    'as'=>'capnhattang',
    'uses' => 'CartController@capnhattang']);
Route::get('cap-nhat-giam/{id}', [
    'as'=>'capnhatgiam',
    'uses' => 'CartController@capnhatgiam']);
Route::post('them-moi-don-hang', [
    'as'=>'themdonhang',
    'uses' => 'CartController@themdonhang']);

Route::get('search', [
    'as'=>'search',
    'uses'=>'FrontendController@getSearch',
]);
