<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xuatxu;
use Session;

class XuatxuController extends Controller
{
    public function index()
    {
        $ds_xuatxu = Xuatxu::all();

        return view('xuatxu.index')
            ->with('danhsachxuatxu', $ds_xuatxu);
    }
    public function create()
    {
        return view('xuatxu.create');
    }
    public function store(Request $request)
    {
        $xx              = new Xuatxu();
        $xx->xx_ten       = $request->xx_ten;
        $xx->xx_taoMoi    = $request->xx_taoMoi;
        $xx->xx_capNhat   = $request->xx_capNhat;
        $xx->xx_trangThai = $request->xx_trangThai;
        $xx->save();
        return redirect()->route('danhsachxuatxu.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $xx = Xuatxu::where("xx_ma", $id)->first();
        return view('xuatxu.edit')->with('xx', $xx);
            
    } 

    public function update(LoaiRequest $request, $id){
        //cap nhat du lieu
        $loai = Xuatxu::where("xx_ma", $id)->first();
        $xx->xx_ten       = $request->xx_ten;
        $xx->xx_taoMoi    = $request->xx_taoMoi;
        $xx->xx_capNhat   = $request->xx_capNhat;
        $xx->xx_trangThai = $request->xx_trangThai;
        $xx->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachxuatxu.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $xx = Xuatxu::where("xx_ma", $id)->first();
        $xx->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachxuatxu.index');
            
    } 
}
