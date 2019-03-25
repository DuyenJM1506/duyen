<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhacungcap;
use Session;
use Storage;

class NhacungcapController extends Controller
{
    public function index()
    {
        $ds_ncc = Nhacungcap::all();

        return view('nhacungcap.index')
            ->with('danhsachnhacungcap', $ds_ncc);
    }
    public function create()
    {
        $ds_ncc = Nhacungcap::all();
        return view('nhacungcap.create')
            ->with('danhsachnhacungcap', $ds_ncc);
    }
    public function store(Request $request)
    {
        $ncc = new Nhacungcap();
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_email = $request->ncc_email;
        $ncc->ncc_taoMoi = $request->ncc_taoMoi;
        $ncc->ncc_capNhat = $request->ncc_capNhat;
        $ncc->ncc_trangThai = $request->ncc_trangThai;

        $ncc->save();
        
        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachnhacungcap.index');
    }
    public function edit($id)
    {
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        return view('nhacungcap.edit')
            ->with('ncc', $ncc);
    }
    public function update(Request $request, $id)
    {
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_email = $request->ncc_email;
        $ncc->ncc_taoMoi = $request->ncc_taoMoi;
        $ncc->ncc_capNhat = $request->ncc_capNhat;
        $ncc->ncc_trangThai = $request->ncc_trangThai;

        $ncc->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!');
        return redirect()->route('danhsachnhacungcap.index');
    }
    public function destroy($id)
    {
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        $ncc->delete();

        Session::flash('alert-info', 'Xoa nha cung cap thanh cong!');
        return redirect()->route('danhsachnhacungcap.index');
    }
}
