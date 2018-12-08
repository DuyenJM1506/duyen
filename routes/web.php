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

Route::get('/', function () {
    return view('welcome');
});
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
Route::get('/danhsachloai', 'LoaiController@index')->name('danhsachloai.index');
Route::get('/danhsachloai/create', 'LoaiController@create')->name('danhsachloai.create');
Route::post('/danhsachloai/store', 'LoaiController@store')->name('danhsachloai.store');

Route::get('/danhsachchude', 'ChudeController@index')->name('danhsachchude.index');
Route::get('/danhsachsanpham', 'SanphamController@index')->name('danhsachsanpham.index');
Route::put('/danhsachloai/{id}', 'LoaiController@update')->name('danhsachloai.update');
Route::get('/danhsachloai/{id}', 'LoaiController@edit')->name('danhsachloai.edit');
Route::delete('/danhsachloai/{id}', 'LoaiController@destroy')->name('danhsachloai.destroy');
//route san pham
Route::get('/danhsachsanpham/excel', 'SanphamController@excel')->name('danhsachsanpham.excel');
Route::get('/danhsachsanpham/pdf', 'SanphamController@pdf')->name('danhsachsanpham.pdf');
Route::get('/admin/danhsachsanpham/print', 'SanphamController@print')->name('danhsachsanpham.print');
//route loai
Route::get('/danhsachloai/excel', 'LoaiController@excel')->name('danhsachloai.excel');
Route::get('/danhsachloai/pdf', 'LoaiController@pdf')->name('danhsachloai.pdf');
Route::get('/admin/danhsachloai/print', 'LoaiController@print')->name('danhsachloai.print');

Route::resource('danhsachsanpham', 'SanphamController');
Route::resource('danhsachloai', 'LoaiController');
Route::get('/', 'FrontendController@index')->name('frontend.home');
