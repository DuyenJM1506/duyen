<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;


class UserController extends Controller
{
    public function index()
    {
        $ds_khachhang = User::where('q_ma','=','3')->paginate(5);

        return view('khachhang.index')
            ->with('danhsachkhachhang', $ds_khachhang);
    }
    public function destroy($id)
    {
        $kh = User::where("id", $id)->first();
        $kh->delete();

        Session::flash('alert-info', 'Xoa khach hang thanh cong!');
        return redirect()->route('danhsachkhachhang.index');
    }

}
