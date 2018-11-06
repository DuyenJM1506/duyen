<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chude;

class ChudeController extends Controller
{
    public function index()
    {
        $ds_chude = Chude::all();
        return view('chude.index')
            ->with('danhsachchude', $ds_chude);
    }
}
