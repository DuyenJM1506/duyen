{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.index` --}}
@extends('frontend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Đặt hàng
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.index` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.index` --}}
@section('main-content')

<!-- Thông tin khách hàng -->
<div class="container text-center">
    <h2>Thông tin đơn hàng</h2><br>
    <div class="btn-group" role="group" >
    <a href="{{ route('giohang') }}">
        <button type="button" class="btn btn-default"><b><font style="font-size:18px">Trở lại giỏ hàng</font></b></button> 
        <img src="{{asset('storage/photos/shopping-01-512.png')}}" alt="img" width= "40px" height="36px"></button>

    </a>
</div>
</div>
<hr>
<div class="container" ng-controller="orderController">
    <form name="orderForm" ng-submit="submitOrderForm()" novalidate method="POST" action="{{ route('themdonhang') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>               
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h4>Thông tin khách hàng</h4>

                <br>
              
                <div class="form-group">
                    <label for="kh_hoTen"><b>Họ tên:</b></label>
                    @if (isset(Auth::user()->name))
                    <input type="text" id="kh_hoTen" name="kh_hoTen" value="{{ Auth::user()->name }}" class="form-control" >
                    @else
                    <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" ng-model="kh_hoTen" ng-minlength="6" ng-maxlength="100" ng-required=true>
                    @endif
                </div>
               
                <div class="form-group">
                    <label for="kh_email"><b>Email:</b></label>
                    @if (isset(Auth::user()->email)) 
                    <input type="text" class="form-control" id="dh_email"  name="dh_email" value="{{ Auth::user()->email }}" >
                    @else
                    <input type="email" class="form-control" id="dh_email" name="dh_email" ng-model="dh_email" ng-pattern="/^.+@gmail\.com$/" ng-required=true>
                    @endif
                </div>
               
                <div class="form-group">
                    <label for="kh_diaChi"><b>Địa chỉ:</b></label>
                    @if (isset(Auth::user()->diachi)) 
                    <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" value="{{ Auth::user()->diachi }}">
                    @else
                    <input type="text" class="form-control" id="dh_diaChi" name="kh_ddh_diaChiiaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                    @endif
                 </div>

                <div class="form-group">
                    <label for="kh_dienThoai"><b>Điện thoại:</b></label>
                    @if (isset(Auth::user()->dienthoai)) 
                    <input type="text" class="form-control" id="dh_dienThoai"  name="dh_dienThoai" value="{{ Auth::user()->dienthoai }}">
                    @else
                    <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="kh_dienThoai" ng-minlength="6" ng-maxlength="11">
                    @endif
                </div>
            </div>
 <!-- Thông tin đặt hàng -->           
            <div class="col-lg-6 col-md-6">
                <h4>Thông tin Đặt hàng</h4>
              <br>
                <div class="form-group">
                    <label for="tt_ma"><b>Hình thức thanh toán:</b></label>
                    <select name="tt_ma" id="tt_ma" class="form-control" ng-model="tt_ma" ng-required=true>
                        @foreach ($thanhtoan as $httt)
                          <option value="{{ $httt->tt_ma }}">{{ $httt->tt_ten }}</option>
                        @endforeach
                    </select>
                </div>
              
                <div class="form-group">
                    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
                    <script>paypal.Buttons().render('body');</script>
                </div>

            </div>
        </div>
     
        <div >
            <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
                    Đặt hàng
            </button>
        </div>
    </form>
</div>

@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
@endsection


