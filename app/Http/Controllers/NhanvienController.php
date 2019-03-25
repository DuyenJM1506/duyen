<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhanvien;
use Session;
use Storage;

class NhanvienController extends Controller
{
    public function index()
    {
        $ds_nv = Nhanvien::where('q_ma','=','2')->paginate(5);

        return view('nhanvien.index')
            ->with('danhsachnhanvien', $ds_nv);
    }

    public function create()
    {
        $ds_nv = Nhanvien::all();
        return view('nhanvien.create')
            ->with('danhsachnhanvien', $ds_nv);
    }
    public function store(Request $request)
    {
        $nv = new Nhanvien();
        $nv->nv_id = $request->nv_id;
        $nv->nv_hoTen = $request->nv_hoTen;
        $nv->nv_gioiTinh= $request->nv_gioiTinh;
        $nv->nv_ngaySinh = $request->nv_ngaySinh;
        $nv->nv_dienThoai = $request->nv_dienThoai;
        $nv->nv_diaChi = $request->nv_diaChi;
        $nv->nv_email = $request->nv_email;
        $nv->nv_taoMoi = $request->nv_taoMoi;
        $nv->nv_capNhat = $request->nv_capNhat;
        $nv->nv_trangThai = $request->nv_trangThai;
        $nv->q_ma = '2';

        $nv->save();
        
        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachnhanvien.index');
    }
    public function edit($id)
    {
        $nv = Nhanvien::where("nv_ma", $id)->first();
        return view('nhanvien.edit')
            ->with('nv', $nv);
    }
    public function update(Request $request, $id)
    {
        $nv = Nhanvien::where("nv_ma", $id)->first();
        $nv->nv_id = $request->nv_id;
        $nv->nv_hoTen = $request->nv_hoTen;
        $nv->nv_gioiTinh= $request->nv_gioiTinh;
        $nv->nv_ngaySinh = $request->nv_ngaySinh;
        $nv->nv_dienThoai = $request->nv_dienThoai;
        $nv->nv_diaChi = $request->nv_diaChi;
        $nv->nv_email = $request->nv_email;
        $nv->nv_taoMoi = $request->nv_taoMoi;
        $nv->nv_capNhat = $request->nv_capNhat;
        $nv->nv_trangThai = $request->nv_trangThai;
        $nv->q_ma = '2';

        $nv->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!');
        return redirect()->route('danhsachnhanvien.index');
    }

    public function destroy($id)
    {
        $nv = Nhanvien::where("nv_ma", $id)->first();
        $nv->delete();

        Session::flash('alert-info', 'Xoa nhan vien thanh cong!');
        return redirect()->route('danhsachnhanvien.index');
    }
}
