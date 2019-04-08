<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thanhtoan;
use Session;
use Storage;

class ThanhtoanController extends Controller
{
    public function index()
    {
        $ds_thanhtoan = Thanhtoan::all();

        return view('thanhtoan.index')
            ->with('danhsachthanhtoan', $ds_thanhtoan);
    }
    public function create()
    {
        return view('thanhtoan.create');
    }
    public function store(Request $request)
    {
        $tt              = new Thanhtoan();
        $tt->tt_ten       = $request->tt_ten;
        $tt->tt_taoMoi    = $request->tt_taoMoi;
        $tt->tt_capNhat   = $request->tt_capNhat;
        $tt->tt_trangThai = $request->t_trangThai;
        $tt->save();
        return redirect()->route('danhsachthanhtoan.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $tt = Thanhtoan::where("tt_ma", $id)->first();
        return view('thanhtoan.edit')->with('tt', $tt);
            
    } 

    public function update(Request $request, $id){
        //cap nhat du lieu
        $tt = Thanhtoan::where("tt_ma", $id)->first();
        $tt->tt_ten       = $request->tt_ten;
        $tt->tt_taoMoi    = $request->tt_taoMoi;
        $tt->tt_capNhat   = $request->tt_capNhat;
        $tt->tt_trangThai = $request->t_trangThai;
        $tt->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachthanhtoan.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $tt = Thanhtoan::where("tt_ma", $id)->first();
        $tt->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachthanhtoan.index');
            
    } 
}
