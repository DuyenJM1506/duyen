<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         return Validator::make($data,[ 'name' => 'required', 'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'diachi' => 'required',
            'dienthoai' => 'required'
                                    ],
            [
            'name.required' => 'Tên không được bỏ trống',
            'username.required' => 'Username không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'password.required'  => 'Mật khẩu không được bỏ trống',
            'password_confirmation.required'  => 'Mật khẩu nhập lại không được bỏ trống',
            'password_confirmation.same'  => 'Mật khẩu nhập lại phải giống mật khẩu',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'dienthoai.required' => 'Điện thoại không được bỏ trống',
       
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gioitinh' => $data['gioitinh'],
            'namsinh' => $data['namsinh'],
            'diachi' => $data['diachi'],
            'dienthoai' => $data['dienthoai'],
            'q_ma' => 3,
        ]);
    }
    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        
        return redirect('/login')->with('status', 'Vui lòng đăng nhập bằng tài khoản mới đăng ký!');
    }
}
