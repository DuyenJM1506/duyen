<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\Loai;
use Session;
use Storage;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;


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
        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'sp_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $sp = new Sanpham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_hinh'));
        {
            $file = $request->sp_hinh;
            //lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $file->storeAs('public/photos/' ,$file->getClientOriginalName());
        }
        $sp->save();
        
            //lưu hình ảnh liên quan
            if($request->hasFile('sp_hinhanhlienquan')) {
                $file = $request->sp_hinhanhlienquan;
                
                //duyệt từng ảnh và thực hiện lưu
                foreach ($request->sp_hinhanhlienquan as $index => $file) {
                    $file->storeAs('public/photos', $file->getClientOriginalName());

                    //tạo đối tượng HinhAnh
                    $hinhAnh = new HinhAnh();
                    $hinhAnh->sp_ma = $sp->sp_ma;
                    $hinhAnh->ha_stt = ($index +1);
                    $hinhAnh->ha_ten = $file->getClientOriginalName();
                    $hinhAnh->save();
                }
            }

        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachsanpham.index');
    }
    public function edit($id)
    {
        $sp = Sanpham::where("sp_ma", $id)->first();
        $ds_loai = Loai::all();
        return view('sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai);
    }
    public function update(Request $request, $id)
    {
        $sp = Sanpham::where("sp_ma", $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_hinh'))
        {
            //Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' .$sp->sp_hinh);
            //Upload hình mới 
            $file = $request->sp_hinh;
            //lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $fileSaved = $file->storeAs('public/photos/', $sp->sp_hinh);
        }
        $sp->save();

        Session::flash('alert-info', 'Cap nhat thanh cong!');
        return redirect()->route('danhsachsanpham.index');
    }
    public function destroy($id)
    {
        $sp = Sanpham::where("sp_ma", $id)->first();
        if(empty($sp) == false)
        {
             //Xóa hình cũ để tránh rác
             Storage::delete('public/photos/' .$sp->sp_hinh);
        }
        $sp->delete();

        Session::flash('alert-info', 'Xoa san pham thanh cong!');
        return redirect()->route('danhsachsanpham.index');
    }
    public function excel() 
    {
        return Excel::download(new SanPhamExport, 'danhsachsanpham.xlsx');
    }

    public function pdf() 
{
    $ds_sanpham = Sanpham::all();
    $ds_loai    = Loai::all();
    $data = [
        'danhsachsanpham' => $ds_sanpham,
        'danhsachloai'    => $ds_loai,
    ];
    $pdf = PDF::loadView('sanpham.pdf', $data);
    return $pdf->download('DanhMucSanPham.pdf');
}
}
