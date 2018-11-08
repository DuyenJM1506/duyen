<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;

class SanphamController extends Controller
{
    public function index()
    {
        $ds_sanpham = Sanpham::all();

        return view('sanpham.index')
            ->with('danhsachsanpham', $ds_sanpham);
    }
}
