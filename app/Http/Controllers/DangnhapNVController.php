<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DangnhapNVController extends Controller
{
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
        $rules = [
            'username' =>'required|username',
            'password' => 'required|min:8'
        ];
        $messages = [
            'username.required' => 'Xin hãy đăng nhập bằng tài khoản nhân viên',
            'username.username' => 'Xin hãy đăng nhập bằng tài khoản nhân viên',
            'password.required' => 'Xin hãy đăng nhập bằng tài khoản nhân viên',
            'password.min' => 'Xin hãy đăng nhập bằng tài khoản nhân viên',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $username = $request->input('username');
            $password = $request->input('password');

            if( Auth::attempt(['username' => $username, 'password' =>$password,'q_ma' =>2])) {
                return redirect()->intended('/nhanvien/tong-quat');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Xin hãy đăng nhập bằng tài khoản nhân viên']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
}
