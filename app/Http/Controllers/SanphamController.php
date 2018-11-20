<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;

class SanphamController extends Controller
{
    public function index()
    {
        $ds_sanpham = Sanpham::all();

        return view('sanpham.index')
            ->with('danhsachsanpham', $ds_sanpham);
    }
    public function create()
    {
        $ds_loai = Loai::all();
        return view('sanpham.create')
            ->with('danhsachloai', $ds_loai);
    }
    public function store(Request $request)
    {
        $sp = new Sanpham();
        $sp->sp_ten = $request->sp_ten;

        if($request->hasFile('sp_hinh'));
        {
            $file = $request->sp_hinh;
            //lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $file->storeAs('photo', $file->getClientOriginalName());
        }
        $sp->save();

        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachsanpham.index');
    }
}
