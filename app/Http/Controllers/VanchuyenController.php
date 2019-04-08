<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vanchuyen;
use App\Session;
use App\Storage;

class VanchuyenController extends Controller
{
    public function index()
    {
        $ds_vanchuyen = Vanchuyen::all();

        return view('vanchuyen.index')
            ->with('danhsachvanchuyen', $ds_vanchuyen);
    }
    public function create()
    {
        return view('vanchuyen.create');
    }
    public function store(Request $request)
    {
        $vc              = new Vanchuyen();
        $vc->vc_ten       = $request->vc_ten;
        $vc->vc_taoMoi    = $request->vc_taoMoi;
        $vc->vc_capNhat   = $request->vc_capNhat;
        $vc->vc_trangThai = $request->vc_trangThai;
        $vc->save();
        return redirect()->route('danhsachvanchuyen.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $vc = Vanchuyen::where("vc_ma", $id)->first();
        return view('vanchuyen.edit')->with('vc', $vc);
            
    } 

    public function update(Request $request, $id){
        //cap nhat du lieu
        $vc = Vanchuyen::where("vc_ma", $id)->first();
        $vc->vc_ten       = $request->vc_ten;
        $vc->vc_taoMoi    = $request->vc_taoMoi;
        $vc->vc_capNhat   = $request->vc_capNhat;
        $vc->vc_trangThai = $request->vc_trangThai;
        $vc->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachvanchuyen.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $vc = Vanchuyen::where("vc_ma", $id)->first();
        $vc->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachvanchuyen.index');
            
    } 
}
