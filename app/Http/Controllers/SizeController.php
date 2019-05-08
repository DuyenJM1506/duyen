<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    public function index()
    {
        $ds_size = Size::all();

        return view('size.index')
            ->with('danhsachsize', $ds_size);
    }
    public function create()
    {
        return view('size.create');
    }
    public function store(Request $request)
    {
        $size             = new Size();
        $size->s_ten       = $request->s_ten;
        $size->s_taoMoi    = $request->s_taoMoi;
        $size->s_capNhat   = $request->s_capNhat;
        $size->s_trangThai = $request->s_trangThai;
        $size->save();
        return redirect()->route('danhsachsize.index');

    }
}
