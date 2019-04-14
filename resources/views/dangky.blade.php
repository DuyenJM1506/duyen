@extends('frontend.layouts.index')

@section('title')
Đăng ký tài khoản
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
@endsection
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Đăng ký thành công</span>
		</button>
	</div>
@endif
@section('main-content')

    <div class="container" style="margin-bottom: 3%; width: 100%">
        <div class="row">
            <div class="col-sm-12 row-sm-12">
                        <div class="panel panel-default"><!--contact_form_container form-group-->
                        
                            <div class="contact_form_title row d-flex justify-content-center">
                            <font style="font-family: Ampersand; font-size: 30px;color: white; padding: 10px">Đăng ký tài khoản</font></div> 
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <fieldset style="background: #17568C">
                            <form  class="form" method="POST" action="{{ url('/register') }}" >  
                                {{ csrf_field() }}
                                <div class="d-flex flex-md-row flex-column">
                                    <div class="col-sm-4 d-flex align-items-end flex-column" ><font style="color: white">Họ tên</font> </div>
                                    <div class="col-sm-8">
                                        <input type="name"name="name" value="{{ old('name') }}"  class="form-control" placeholder="Vui lòng nhập đầy đủ họ tên" required>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div style="height: 30px"></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white"> Email</font></div>
                                        <div class="col-sm-8">
                                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="example@gmail.com" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div style="height: 30px"></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white"> Username</font></div>
                                        <div class="col-sm-8">
                                            <input type="username" id="username" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username để đăng nhập" required>
                                        </div>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                <div style="height: 30px"></div>

                                <div class="d-flex flex-md-row flex-column">
                                    <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white"> Mật khẩu</font></div>
                                    <div class="col-sm-8">
                                        <input name="password" id="password" type="password" placeholder="Mật khẩu" class="form-control"  required>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div style="height: 30px"></div>

                                <div class="d-flex flex-md-row flex-column">
                                    <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white"> Nhập lại mật khẩu</font> </div>
                                    <div class="col-sm-8">
                                        <input  id="password_confirmation" placeholder="Mật khẩu nhập lại" name="password_confirmation" type="password" class="form-control"  required>
                                    </div>
                                </div>
                                <div style="height: 30px"></div>
                                <div class="d-flex flex-md-row flex-column">
                                    <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white">Giới tính</font></div>
                                    <div class="col-sm-6">
                                    <select name="gioitinh" id="gioitinh" class="form-control">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>

                                </div>
                            </div>
                            <div style="height: 30px"></div>
                            <div class="d-flex flex-md-row flex-column">
                                <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white">Năm sinh</font> </div>
                                <div class="col-sm-6">
                                <select name="namsinh" id="namsinh" class="form-control">
                                    <?php 
                                    for($i=1950;$i<=2019;$i++){
                                        echo "<option value='".$i."'>".$i."</option> ";
                                    }                
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height: 30px"></div>
                        <div class="d-flex flex-md-row flex-column">
                            <div class="col-sm-4 d-flex align-items-end flex-column"><font style="color: white"> Địa chỉ</font></div>
                            <div class="col-sm-8">
                                <input id="diachi" type="text" name="diachi" value="{{ old('diachi') }}" class="form-control" placeholder="Nhập đầy đủ và chính xác địa chỉ" required>
                            </div>
                            
                        </div>
                        <div style="height: 30px"></div>
                            <div class="d-flex flex-md-row flex-column">
                                <div class="col-sm-4 d-flex align-items-end flex-column"> <font style="color: white">Điện thoại</font></div>
                                 <div class="col-sm-8">
                                    <input id="dienthoai" type="number" name="dienthoai" value="{{ old('dienthoai') }}" class="form-control" placeholder="Số điện thoại" required>
                            </div>
                        </div>
                        </br>
                            <div class="contact_form_button d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary ">Đăng ký</button>
                            </div>

                        </br>
                        </fieldset>
                                </form>

        </div>
    </div>
</div>
</div>
<div class="panel-body col-sm-6 col-md-4 col-md-offset-4"></div>



@endsection
@section('scripts')
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>

<style>
    body{
	background: #17568C;
}
.panel{
	border-radius: 5px;
}
.panel-heading {
    padding: 10px 15px;
}
.panel-title{
	text-align: center;
	font-size: 15px;
	font-weight: bold;
	color: #17568C;
}
.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}
.profile-img {
	width: 120px;
	height: 120px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
</style>
@endsection