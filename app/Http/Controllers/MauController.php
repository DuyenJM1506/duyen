<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MauController extends Controller
{
    public function index()
    {
        $ds_mau = Mau::all();

        return view('mau.index')
            ->with('danhsachmau', $ds_mau);
    }
    public function create()
    {
        return view('mau.create');
    }
    public function store(Request $request)
    {
        $mau               = new Mau();
        $mau->m_ten       = $request->m_ten;
        $mau->m_taoMoi    = $request->m_taoMoi;
        $mau->m_capNhat   = $request->m_capNhat;
        $mau->m_trangThai = $request->m_trangThai;
        $mau->save();

    }
    public function edit($id){
        //Lay du lieu de edit
        $mau = Mau::where("m_ma", $id)->first();
        return view('mau.edit')->with('mau', $mau);
            
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
        $mau = Mau::where("m_ma", $id)->first();
        $mau->m_ten       = $request->m_ten;
        $mau->m_taoMoi    = $request->m_taoMoi;
        $mau->m_capNhat   = $request->m_capNhat;
        $mau->m_trangThai = $request->m_trangThai;
        $mau->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachmau.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $mau = Mau::where("m_ma", $id)->first();
        $mau->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachmau.index');
            
    } 

        /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new MauExport, 'danhsachmau.xlsx');
    }

    public function pdf() 
    {
        return PDF::download(new MauExport, 'danhsachmau.pdf');
    }
}
