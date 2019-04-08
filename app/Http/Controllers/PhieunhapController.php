<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phieunhap;
use App\Nhanvien;
use App\Nhacungcap;
use Session;
use Storage;

class PhieunhapController extends Controller
{
    public function index()
    {
        $ds_pn = Phieunhap::all();
        return view('phieunhap.index')
            ->with('danhsachphieunhap', $ds_pn);
    }
    public function create()
    {
        $ds_ncc = Nhacungcap::all();
        $ds_nv = Nhanvien::all();
        return view('phieunhap.create')
            ->with('danhsachnhacungcap', $ds_ncc)
            ->with('danhsachnhanvien', $ds_nv);
        
    }
    public function store(Request $request)
    {
        $pn                     = new Phieunhap();
        $pn->pn_nguoiGiao       =$request->pn_nguoiGiao;
        $pn->pn_soHoaDon        =$request->pn_soHoaDon;
        $pn->pn_ngayXuatHoaDon  =$request->pn_ngayXuatHoaDon;
        $pn->pn_ghiChu          =$request->pn_ghiChu;
        $pn->pn_ngayLapPhieu    =$request->pn_ngayLapPhieu;
        $pn->pn_ngayXacNhan     =$request->pn_ngayXacNhan;
        $pn->pn_ngayNhapKho     =$request->pn_ngayNhapKho;
        $pn->nv_nguoiLapPhieu   = $request->nv_ma;
        $pn->nv_keToan          = $request->nv_ma;
        $pn->nv_thuKho          = $request->nv_ma;
        $pn->ncc_ma             = $request->ncc_ma;
        $pn->pn_taoMoi          = $request->pn_taoMoi;
        $pn->pn_capNhat         = $request->pn_capNhat;
        $pn->pn_trangThai       = $request->pn_trangThai;

        $pn->save();
        return redirect()->route('danhsachphieunhap.index');
    }
    public function edit($id){
        //Lay du lieu de edit
        $pn = Phieunhap::where("pn_ma", $id)->first();
        $ds_nv = Nhanvien::all();
        $ds_ncc = Nhacungcap::all();
        return view('phieunhap.edit')
                    ->with('pn', $pn)
                    ->with('danhsachnhanvien', $ds_nv)
                    ->with('danhsachnhacungcap', $ds_ncc);
            
    } 

    public function update(Request $request, $id){
        //cap nhat du lieu
        $pn = Phieunhap::where("pn_ma", $id)->first();
        $pn->pn_nguoiGiao       = $request->pn_nguoiGiao;
        $pn->pn_soHoaDon        =$request->pn_soHoaDon;
        $pn->pn_ngayXuatHoaDon  = $request->pn_ngayXuatHoaDon;
        $pn->pn_ghiChu          = $request->pn_ghiChu;
        $pn->pn_ngayLapPhieu    = $request->pn_ngayLapPhieu;
        $pn->pn_ngayXacNhan     = $request->pn_ngayXacNhan;
        $pn->pn_ngayNhapKho     = $request->pn_ngayNhapKho;
        $pn->nv_nguoiLapPhieu   = $request->nv_ma;
        $pn->nv_keToan          = $request->nv_ma;
        $pn->nv_thuKho          = $request->nv_ma;
        $pn->ncc_ma              = $request->ncc_ma;
        $pn->pn_taoMoi          = $request->pn_taoMoi;
        $pn->pn_capNhat         = $request->pn_capNhat;
        $pn->pn_trangThai       = $request->pn_trangThai;
        
        $pn->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachphieunhap.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $pn = Phieunhap::where("pn_ma", $id)->first();
        $pn->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachphieunhap.index');
            
    } 

/**
 * Action hiển thị biểu mẫu xem trước khi in trên Web
 */
    public function print()
    {
        $ds_pn    = Phieunhap::all();
        $ds_nv    = Nhanvien::all();
        $ds_ncc   = Nhacungcap::all();
        $data = [
            'danhsachphieunhap'     => $ds_pn,
            'danhsachnhanvien'    => $ds_nv,
            'danhsachnhacungcap'  => $ds_ncc,
        ];
        return view('phieunhap.print')
            ->with('danhsachphieunhap', $ds_pn)
            ->with('danhsachnhanvien', $ds_nv)
            ->with('danhsachnhacungcap', $ds_ncc);
    }
}
