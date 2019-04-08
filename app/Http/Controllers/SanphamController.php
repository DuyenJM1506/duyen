<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\Loai;
use App\Xuatxu;
use App\Khuyenmai;
use App\Mau;
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
        $ds_xuatxu  = Xuatxu::all();
        $ds_mau     = Mau::all();
        $ds_km      = Khuyenmai::all();

        return view('sanpham.index')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachxuatxu', $ds_xuatxu)
            ->with('danhsachmau', $ds_mau)
            ->with('danhsachkhuyenmai', $ds_km);
    }
    public function create()
    {
        $ds_loai    = Loai::all();
        $ds_xuatxu  = Xuatxu::all();
        $ds_mau     = Mau::all();
        $ds_km      = Khuyenmai::all();

        return view('sanpham.create')
            ->with('danhsachmau', $ds_mau)
            ->with('danhsachloai', $ds_loai)
            ->with('danhsachxuatxu', $ds_xuatxu)
            ->with('danhsachkhuyenmai', $ds_km);
    
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $sp = new Sanpham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_soLuongBanDau = $request->sp_soLuongBanDau;
        $sp->sp_soLuongHienTai= $request->sp_soLuongHienTai;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        $sp->m_ma = $request->m_ma;
        $sp->xx_ma = $request->xx_ma;
        $sp->km_ma = $request->km_ma;

        if($request->hasFile('sp_hinh'));
        {
            $file = $request->sp_hinh;
            //lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $file->storeAs('storage/photos/' , $file->getClientOriginalName());
        }
        $sp->save();
        
            //lưu hình ảnh liên quan
            if($request->hasFile('sp_hinhanhlienquan')) {
                $file = $request->sp_hinhanhlienquan;
                
                //duyệt từng ảnh và thực hiện lưu
                foreach ($request->sp_hinhanhlienquan as $index => $file) {
                    $file->storeAs('storage/photos/', $file->getClientOriginalName());

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
        $sp         = Sanpham::where("sp_ma", $id)->first();
        $ds_loai    = Loai::all();
        $ds_xuatxu  = Xuatxu::all();
        $ds_mau     = Mau::all();
        $ds_km      = Khuyenmai::all();
        return view('sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai)
            ->with('danhsachxuatxu', $ds_xuatxu)
            ->with('danhsachmau', $ds_mau)
            ->with('danhsachkhuyenmai', $ds_km);
    }
    public function update(Request $request, $id)
    {
        $sp = Sanpham::where("sp_ma", $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_soLuongBanDau = $request->sp_soLuongBanDau;
        $sp->sp_soLuongHienTai = $request->sp_soLuongHienTai;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        $sp->m_ma = $request->m_ma;
        $sp->xx_ma = $request->xx_ma;
        $sp->km_ma = $request->km_ma;

        if($request->hasFile('sp_hinh'))
        {
            //Xóa hình cũ để tránh rác
            Storage::delete('storage/photos/' .$sp->sp_hinh);
            //Upload hình mới 
            $file = $request->sp_hinh;
            //lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $fileSaved = $file->storeAs('storage/photos/', $sp->sp_hinh);
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
             Storage::delete('storage/photos/' .$sp->sp_hinh);
        }
        $sp->delete();

        Session::flash('alert-info', 'Xoa san pham thanh cong!');
        return redirect()->route('danhsachsanpham.index');
    }
    public function excel() 
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();
        $ds_xuatxu  = Xuatxu::all();
        $ds_mau     = Mau::all();
        $ds_km      = Khuyenmai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
            'danhsachmau'     => $ds_mau,
            'danhsachxuatxu'  => $ds_xuatxu,
            'danhsachkhuyenmai'=> $ds_km,
        ];
        return Excel::download(new SanPhamExport, 'danhsachsanpham.xlsx');
    }

   
}
