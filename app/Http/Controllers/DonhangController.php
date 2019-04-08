<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use App\Vanchuyen;
use App\Thanhtoan;
use App\Nhanvien;
use App\User;
// use App\Chitietdonhang;
use Session;
use Storage;

class DonhangController extends Controller
{
    public function index()
    {
        $ds_donhang     = Donhang::all();
        $ds_khachhang   = User::all();
        $ds_nv          = Nhanvien::all();
        $ds_vanchuyen   = Vanchuyen::all();
        $ds_thanhtoan   = Thanhtoan::all();

        return view('donhang.index')
            ->with('danhsachdonhang', $ds_donhang)
            ->with('danhsachkhachhang', $ds_khachhang)
            ->with('danhsachnhanvien', $ds_nv)
            ->with('danhsachvanchuyen', $ds_vanchuyen)
            ->with('danhsachthanhtoan', $ds_thanhtoan);
    }

    public function create()
    {
        $ds_khachhang   = User::all();
        $ds_nv          = Nhanvien::all();
        $ds_vanchuyen   = Vanchuyen::all();
        $ds_thanhtoan   = Thanhtoan::all();

        return view('donhang.create')
            ->with('danhsachdonhang', $ds_donhang)
            ->with('danhsachkhachhang', $ds_khachhang)
            ->with('danhsachnhanvien', $ds_nv)
            ->with('danhsachvanchuyen', $ds_vanchuyen)
            ->with('danhsachthanhtoan', $ds_thanhtoan);
    }

    public function store(Request $request)
    {   
        $dh = new Donhang();
        $dh->id                 = $request->id;
        $dh->dh_thoiGianDatHang = $request->dh_thoiGianDatHang;
        $dh->dh_trangThai       = $request->dh_trangThai;
        $dh->dh_tenKhachHang    = $request->dh_tenKhachHang;
        $dh->dh_diaChi          = $request->dh_diaChi;
        $dh->dh_dienThoai       = $request->dh_dienThoai;
        $dh->dh_email           = $request->dh_email;
        $dh->dh_tongcong        = $request->dh_tongcong;
        $dh->dh_taoMoi          = $request->dh_taoMoi;
        $dh->dh_capNhat         = $request->dh_capNhat;
        $dh->tt_ma              = $request->tt_ma;
        $dh->vc_ma              = $request->vc_ma;
        $dh->nv_giaoHang        = $request->nv_ma;
        $dh->nv_xuLy            = $request->nv_ma;
        $dh->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!');
        return redirect()->route('danhsachdonhang.store');
    }

    public function edit($id)
    {
        $dh             = Donhang::where("dh_ma", $id)->first();
        $ds_khachhang   = User::all();
        $ds_nv          = Nhanvien::all();
        $ds_vanchuyen   = Vanchuyen::all();
        $ds_thanhtoan   = Thanhtoan::all();

        return view('donhang.edit')
            ->with('danhsachkhachhang', $ds_khachhang)
            ->with('danhsachnhanvien', $ds_nv)
            ->with('danhsachvanchuyen', $ds_vanchuyen)
            ->with('danhsachthanhtoan', $ds_thanhtoan);
    }
    public function update(Request $request, $id)
    {
        $dh = Donhang::where("dh_ma", $id)->first();
        $dh->id                 = $request->id;
        $dh->dh_thoiGianDatHang = $request->dh_thoiGianDatHang;
        $dh->dh_trangThai       = $request->dh_trangThai;
        $dh->dh_tenKhachHang    = $request->dh_tenKhachHang;
        $dh->dh_diaChi          = $request->dh_diaChi;
        $dh->dh_dienThoai       = $request->dh_dienThoai;
        $dh->dh_email           = $request->dh_email;
        $dh->dh_tongcong        = $request->dh_tongcong;
        $dh->dh_taoMoi          = $request->dh_taoMoi;
        $dh->dh_capNhat         = $request->dh_capNhat;
        $dh->tt_ma              = $request->tt_ma;
        $dh->vc_ma              = $request->vc_ma;
        $dh->nv_giaoHang        = $request->nv_ma;
        $dh->nv_xuLy            = $request->nv_ma;
        $dh->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!');
        return redirect()->route('danhsachdonhang.index');
    }
    public function destroy($id)
    {
        $dh = Donhang::where("dh_ma", $id)->first();
        $dh->delete();

        Session::flash('alert-info', 'Xoa don hang thanh cong!');
        return redirect()->route('danhsachdonhang.index');
    }   

}
