<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiRequest;
use App\Loai;
use Session;

class LoaiController extends Controller
{
    public function index()
    {
        $ds_loai = Loai::all();

        return view('loai.index')
            ->with('danhsachloai', $ds_loai);
    }
    public function create()
    {
        return view('loai.create');
    }
    public function store(Request $request)
    {
        $loai              = new Loai();
        $loai->l_ten       = $request->l_ten;
        $loai->l_taoMoi    = $request->l_taoMoi;
        $loai->l_capNhat   = $request->l_capNhat;
        $loai->l_trangThai = $request->l_trangThai;
        $loai->save();
        return redirect()->route('danhsachloai.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $loai = Loai::where("l_ma", $id)->first();
        return view('loai.edit')->with('loai', $loai);
            
    } 

    public function update(LoaiRequest $request, $id){
       /* $validator = Validator::make($$request->all(),
            [
                'l_ten' => 'required|unique:loai|max:60',
                'l_taoMoi' => 'required',
                'l_capNhat' => 'required',
                'l_trangThai' => 'required',
            ]);
        if($validator->fails()) {
            return redirect(route('danhsachloai.edit', ['id' =>$id]))
                ->withErrors($validator)
                ->withInput();
        }*/
        //cap nhat du lieu
        $loai = Loai::where("l_ma", $id)->first();
        $loai->l_ten        = $request->l_ten;
        $loai->l_taoMoi     = $request->l_taoMoi;
        $loai->l_capNhat    = $request->l_capNhat;
        $loai->l_trangThai  = $request->l_trangThai;
        
        $loai->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachloai.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $loai = Loai::where("l_ma", $id)->first();
        $loai->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachloai.index');
            
    } 

        /**
     * Action xuất Excel
     */
    public function excel() 
    {
        /* Code dành cho việc debug
        - Khi debug cần hiển thị view để xem trước khi Export Excel
        */
        // $ds_sanpham = Sanpham::all();
        // $ds_loai    = Loai::all();
        // $data = [
        //     'danhsachsanpham' => $ds_sanpham,
        //     'danhsachloai'    => $ds_loai,
        // ];
        // return view('sanpham.excel')
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachloai', $ds_loai);
        return Excel::download(new LoaiExport, 'danhsachloai.xlsx');
    }

    public function pdf() 
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];
        $pdf = PDF::loadView('loai.pdf', $data);
        return $pdf->download('DanhMucLoai.pdf');
    }

/**
 * Action hiển thị biểu mẫu xem trước khi in trên Web
 */
    public function print()
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];
        return view('sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
    }
}
