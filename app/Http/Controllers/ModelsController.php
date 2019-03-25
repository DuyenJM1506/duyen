<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Gioitinh;
use App\Size;
use App\Session;
use App\Storage;

class ModelsController extends Controller
{
    public function index()
    {
        $ds_model = Models::all();

        return view('model.index')
            ->with('danhsachmodel', $ds_model);
    }
    public function create()
    {
        $ds_model = Models::all();
        return view('model.create')
            ->with('danhsachmodel', $ds_model);

        $ds_size = Size::all();
        return view('model.create')
            ->with('danhsachsize', $ds_size);
        
        $ds_gioitinh = Gioitinh::all();
        return view('model.create')
            ->with('danhsachgioitinh', $ds_gioitinh);

    }
    public function store(Request $request)
    {
        $md               = new Models();
        $md->md_canNang   = $request->md_canNang;
        $md->md_chieuCao  = $request->md_chieuCao;
        $md->s_ma         = $request->s_ma;
        $md->gt_ten       = $request->gt_ten;
        $md->trangthai    = $request->trangthai;
        $md->save();

        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachmodel.index');

    }
    public function edit($id){
        //Lay du lieu de edit
        $md = Models::where("md_ma", $id)->first();
        $ds_size = Size::all();
        $ds_gioitinh = Gioitinh::all();

        return view('model.edit')
                    ->with('md', $md)
                    ->with('danhsachsize', $ds_size)
                    ->with('danhsachgioitinh', $ds_gioitinh);
    } 

    public function update(Request $request, $id){
   
        //cap nhat du lieu
        $md = Models::where("md_ma", $id)->first();
        $md->md_canNang   = $request->md_canNang;
        $md->md_chieuCao  = $request->md_chieuCao;
        $md->s_ma         = $request->s_ma;
        $md->gt_ten       = $request->gt_ten;
        $md->trangthai    = $request->trangthai;
        $md->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachmodel.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $md = Models::where("md_ma", $id)->first();
        $md->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachmodel.index');     
    } 
}
