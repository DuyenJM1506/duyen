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
Route::get('/danhsachchude', 'ChudeController@index')->name('danhsachchude.index');
Route::get('/danhsachsanpham', 'SanphamController@index')->name('danhsachsanpham.index');


