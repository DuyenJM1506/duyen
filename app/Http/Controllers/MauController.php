<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mau;
use Session;
use Storage;

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
        $ds_mau = Mau::all();
        return view('mau.create')
            ->with('danhsachmau', $ds_mau);
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'm_hinhDaiDien' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $mau               = new Mau();
        $mau->m_ten       = $request->m_ten;
        $mau->m_taoMoi    = $request->m_taoMoi;
        $mau->m_capNhat   = $request->m_capNhat;
        $mau->m_trangThai = $request->m_trangThai;

        if($request->hasFile('m_hinhDaiDien'));
        {
            $file = $request->m_hinhDaiDien;
            //lưu tên hình vào column m_hinhDaiDien
            $mau->m_hinhDaiDien = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $file->storeAs('storage/photos/' , $file->getClientOriginalName());
        }
        $mau->save();

        Session::flash('alert-info', 'Them moi thanh cong!');
        return redirect()->route('danhsachmau.index');


    }
    public function edit($id){
        //Lay du lieu de edit
        $mau = Mau::where("m_ma", $id)->first();
        return view('mau.edit')->with('mau', $mau);
    } 

    public function update(Request $request, $id){
   
        //cap nhat du lieu
        $mau = Mau::where("m_ma", $id)->first();
        $mau->m_ten       = $request->m_ten;
        $mau->m_taoMoi    = $request->m_taoMoi;
        $mau->m_capNhat   = $request->m_capNhat;
        $mau->m_trangThai = $request->m_trangThai;

        if($request->hasFile('m_hinhDaiDien'))
        {
            //Xóa hình cũ để tránh rác
            Storage::delete('storage/photos/' .$mau->m_hinhDaiDien);
            //Upload hình mới 
            $file = $request->m_hinhDaiDien;
            //lưu tên hình vào column m_hinhDaiDien
            $mau->m_hinhDaiDien = $file->getClientOriginalName();

            //chép file vào thư mục"photos"
            $fileSaved = $file->storeAs('storage/photos/', $mau->m_hinhDaiDien);
        }

        $mau->save();

        //Hien thi thong bao update
        Session::flash('alert-info', 'Update Successfully!!');
        return redirect()->route('danhsachmau.index');

    } 

    public function destroy($id){
        //Xoa du lieu de edit
        $mau = Mau::where("m_ma", $id)->first();
        if(empty($mau) == false)
        {
             //Xóa hình cũ để tránh rác
             Storage::delete('storage/photos/' .$mau->m_hinhDaiDien);
        }
        $mau->delete();

        //Hien thi thong bao delete
        Session::flash('alert-danger', 'Delete Successfully!!');
        return redirect()->route('danhsachmau.index');     
    } 
}
