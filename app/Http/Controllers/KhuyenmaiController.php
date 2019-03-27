<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khuyenmai;
use App\Nhanvien;
use Session;
use Storage;


class KhuyenmaiController extends Controller
{
    public function index()
    {
        $ds_km = Khuyenmai::all();
        $ds_nv = Nhanvien::all();
        return view('khuyenmai.index')
            ->with('danhsachkhuyenmai', $ds_km)
            ->with('danhsachnhanvien', $ds_nv);
    }
    public function create()
    {
        $ds_nv = Nhanvien::all();
        return view('khuyenmai.create')
                ->with('danhsachnhanvien', $ds_nv);
    }
    public function store(Request $request)
    {
        $km               = new Khuyenmai();
        $km->km_ten       = $request->km_ten;
        $km->km_noiDung   = $request->km_noiDung;
        $km->km_ngayBatDau  = $request->km_ngayBatDau;
        $km->km_ngayKetThuc = $request->km_ngayKetThuc;
        $km->km_giaTri      = $request->km_giaTri;
      
        $km->km_taoMoi    = $request->km_taoMoi;
        $km->km_capNhat   = $request->km_capNhat;
        $km->km_trangThai = $request->km_trangThai;
        $km->nv_nguoiLap  = $request->nv_ma;
        if($request->hasFile('km_hinhDaiDien'));
        {
            $file = $request->km_hinhDaiDien;
            //lưu tên hình vào column sp_hinh
            $km->km_hinhDaiDien = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $file->storeAs('storage/photos/' , $file->getClientOriginalName());
        }
        $km->save();
        return redirect()->route('danhsachkhuyenmai.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $km = Khuyenmai::where("km_ma", $id)->first();
        $ds_nv = Nhanvien::all();
        return view('khuyenmai.edit')
            ->with('km', $km)
            ->with('danhsachnhanvien', $ds_nv);
            
    } 

    public function update(Request $request, $id){
        //cap nhat du lieu
        $km = Khuyenmai::where("km_ma", $id)->first();
        $km->km_ten       = $request->km_ten;
        $km->km_noiDung   = $request->km_noiDung;
        $km->km_ngayBatDau  = $request->km_ngayBatDau;
        $km->km_ngayKetThuc = $request->km_ngayKetThuc;
        $km->km_giaTri      = $request->km_giaTri;
        
        $km->km_taoMoi    = $request->km_taoMoi;
        $km->km_capNhat   = $request->km_capNhat;
        $km->km_trangThai = $request->km_trangThai;
        $km->nv_nguoiLap  = $request->nv_ma;
        if($request->hasFile('km_hinhDaiDien'))
        {
            //Xóa hình cũ để tránh rác
            Storage::delete('storage/photos/' .$km->km_hinhDaiDien);
            //Upload hình mới 
            $file = $request->km_hinhDaiDien;
            //lưu tên hình vào column sp_hinh
            $km->km_hinhDaiDien = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $fileSaved = $file->storeAs('storage/photos/', $km->km_hinhDaiDien);
        }
        $km->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachkhuyenmai.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $km = Khuyenmai::where("km_ma", $id)->first();
        if(empty($km) == false)
        {
             //Xóa hình cũ để tránh rác
             Storage::delete('storage/photos/' .$km->km_hinhDaiDien);
        }
        $km->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachkhuyenmai.index');
            
    } 
}
