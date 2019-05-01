<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donhang;
use App\Sanpham;
use App\Size;
use App\Chitietdonhang;

class CTDHController extends Controller
{
    public function index($id)
    {
        $spdh = Chitietdonhang::all();
        $madonhang = Donhang::where('dh_ma', $id)->first();
        $masp = Sanpham::all();
        $masize = Size::all();
        return view('chitietdonhang.index')
            ->with('ctdonhang', $spdh)
            ->with('madonhang', $madonhang)
            ->with('masp', $masp)
            ->with('masize', $masize);

    }

}
