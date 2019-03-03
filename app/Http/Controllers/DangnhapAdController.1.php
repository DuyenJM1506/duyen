<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class DangnhapAdController extends Controller
{
    public function getLogin() {
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$rules = [
    		'username' =>'required|username',
    		'password' => 'required|password'
    	];
    	$messages = [
    		'username.required' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'username.username' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'password.required' => 'Xin hãy đăng nhập bằng tài khoản admin',
    		'password.required' => 'Xin hãy đăng nhập bằng tài khoản admin',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$email = $request->input('username');
    		$password = $request->input('password');

    		if( Auth::attempt(['username' => $email, 'password' =>$password,'q_ma' =>1])) {
    			return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Xin hãy đăng nhập bằng tài khoản Admin']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
}
