<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Switch_;
use DateTime;
use App\Sanpham;
use App\Donhang;
use App\Loai;

class BackendController extends Controller
{
    public function index()
    {
        $date = getdate();
        $ngay = $date['wday'];
        $ngaydautuan = new DateTime(new Carbon);
        switch ($ngay) {
            case 0:
                $ngaydautuan -> modify('-6 day');
                break;
            case 1:
                $ngaydautuan = new DateTime(new Carbon);
                break;
            case 2:
                $ngaydautuan -> modify('-1 day');
                break;
            case 3:
                $ngaydautuan -> modify('-2 day');
                break;

            case 4:
                $ngaydautuan -> modify('-3 day');
                break;
            case 5:
                $ngaydautuan -> modify('-4 day');
                break;
            case 6:
                $ngaydautuan -> modify('-5 day');
                break;

            default:
                break;
        }
        $slsp = DB::table('sanpham')->count();
        $spm = Sanpham::orderBy('sp_taoMoi', 'desc')->limit(4)->get();
        $doanhthu = DB::table('donhang')->where('dh_taoMoi', '>=', $ngaydautuan)->sum('dh_tongcong');

        $dhm = DB::table('donhang')
            ->limit(4)
            ->where('dh_taoMoi', '>=', $ngaydautuan)
            ->orderBy('dh_taoMoi', 'desc')
            ->get();

        $sltv = DB::table('users')->where('q_ma', 3)->where('created_at', '>=', $ngaydautuan)->count();

        $date = new Carbon;

        $sldh = DB::table('donhang')->where('dh_taoMoi', '>=', $ngaydautuan)->count();

        // $spdh = DB::table('sanpham-donhang')
        //     ->join('sanpham', 'sanpham-donhang.sp_ma', '=', 'sanpham.sp_ma')
        //     ->join('donhangsanpham', 'sanpham-donhang.dh_ma', '=', 'donhangsanpham.dh_ma')
        //     ->limit(4)
        //     ->orderBy('dh_taoMoi', 'desc')
        //     ->get();
       
        // $sldt = DB::table('sanpham-donhang')
        //     ->join('sanpham', 'sanpham-donhang.sp_ma', '=', 'sanpham.sp_ma')
        //     ->join('donhangsanpham', 'sanpham-donhang.dh_ma', '=', 'donhangsanpham.dh_ma')
        //     ->where('dh_taoMoi', '>', $ngaydautuan)
        //     ->where('l_ma','=',1)
        //     ->sum(DB::raw('dhsp_soLuong *dhsp_donGia'));
        // $sllt = DB::table('sanpham-donhang')
        //     ->join('sanpham', 'sanpham-donhang.sp_ma', '=', 'sanpham.sp_ma')
        //     ->join('donhangsanpham', 'sanpham-donhang.dh_ma', '=', 'donhangsanpham.dh_ma')
        //     ->where('dh_taoMoi', '>', $ngaydautuan)
        //     ->where('l_ma','=',2)
        //     ->sum(DB::raw('dhsp_soLuong *dhsp_donGia'));
        // $slmtb = DB::table('sanpham-donhang')
        //     ->join('sanpham', 'sanpham-donhang.sp_ma', '=', 'sanpham.sp_ma')
        //     ->join('donhangsanpham', 'sanpham-donhang.dh_ma', '=', 'donhangsanpham.dh_ma')
        //     ->where('dh_taoMoi', '>', $ngaydautuan)
        //     ->where('l_ma','=',3)
        //     ->sum(DB::raw('dhsp_soLuong *dhsp_donGia'));
        // $slpk = DB::table('sanpham-donhang')
        //     ->join('sanpham', 'sanpham-donhang.sp_ma', '=', 'sanpham.sp_ma')
        //     ->join('donhangsanpham', 'sanpham-donhang.dh_ma', '=', 'donhangsanpham.dh_ma')
        //     ->where('dh_taoMoi', '>', $ngaydautuan)
        //     ->where('l_ma','=',4)
        //     ->sum(DB::raw('dhsp_soLuong *dhsp_donGia'));
       

        return view('backend.index')
            ->with('slsp', $slsp)
            ->with('doanhthu', $doanhthu)
            ->with('sldh', $sldh)
            ->with('sltv', $sltv)
            ->with('ngay', $ngay)
            ->with('spm', $spm)
            ->with('ngaydautuan', $ngaydautuan)
            ->with('dhm', $dhm);
            // ->with('spdh', $spdh)
            // ->with('sldt', $sldt)
            // ->with('sllt', $sllt)
            // ->with('dstvm', $dstvm)
            // ->with('slmtb', $slmtb)
            // ->with('slpk', $slpk)
            
    }
    public function login()
    {
        auth()->login();
        return view('backend.login');
    }
    public function logout()
    {
        auth()->logout();
        return view('backend.login');
    }
}
