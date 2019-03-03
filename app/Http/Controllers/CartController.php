<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Cart;
use App\Sanpham;
use App\Donhang;
use App\Chitietdonhang;
//use App\SanPhamKhuyenMai;
use App\Vanchuyen;
use App\Thanhtoan;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Classes\ActivationService;

class CartController extends Controller
{
    public function index(){
        Cart::add(array(
            array(
                'id' => 456,
                'name' => 'Sample Item 1',
                'price' => 67.99,
                'quantity' => 4,
                'attributes' => array()
            ),
            array(
                'id' => 568,
                'name' => 'Sample Item 2',
                'price' => 69.25,
                'quantity' => 4,
                'attributes' => array(
                  'size' => 'L',
                  'color' => 'blue'
                )
            ),
          ));
          $data = Cart::getContent();
    
        return view('frontend.cart')
        ->with('data', $data);
    }
}
