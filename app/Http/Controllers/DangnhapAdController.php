<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DangnhapAdController extends Controller
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
    		'username.required' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'username.username' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'password.required' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'password.min' => 'Xin hãy đăng nhập bằng tài khoản admin',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $request->input('username');
    		$password = $request->input('password');

    		if( Auth::attempt(['username' => $email, 'password' =>$password,'q_ma' =>1])) {
    			return redirect()->intended('/admin/tong-quat');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Xin hãy đăng nhập bằng tài khoản admin']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
}
