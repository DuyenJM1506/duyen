<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;


class UserController extends Controller
{
    public function index()
    {
        $ds_user = User::where('q_ma','=','3')->paginate(5);

        return view('user.index')
            ->with('danhsachuser', $ds_user);
    }
    public function destroy($id)
    {
        $user = User::where("id", $id)->first();
        $user->delete();

        Session::flash('alert-info', 'Xoa khach hang thanh cong!');
        return redirect()->route('danhsachuser.index');
    }

}
