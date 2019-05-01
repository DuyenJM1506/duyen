
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
                
                <div class="form-group">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th >Sản phẩm mua</th>
                                <th >Số lượng</th>
                                <th >Đơn giá</th>
                                <th >Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ number_format(($item->price)*($item->quantity)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <h4>Thông tin khách hàng</h4>
              <br>
                <div class="form-group">
                    <label for="dh_tenKhachHang"><b>Họ tên:</b></label>
                    @if (isset(Auth::user()->name))
                    <input type="text" id="dh_tenKhachHang" name="dh_tenKhachHang" value="{{ Auth::user()->name }}" class="form-control" >
                    @else
                    <input type="text" class="form-control" id="dh_tenKhachHang" name="dh_tenKhachHang" ng-model="dh_tenKhachHang" ng-minlength="6" ng-maxlength="100" ng-required=true>
                    @endif
                </div>
               
                <div class="form-group">
                    <label for="dh_diaChi"><b>Địa chỉ:</b></label>
                    @if (isset(Auth::user()->diachi)) 
                    <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" value="{{ Auth::user()->diachi }}">
                    @else
                    <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250">
                    @endif
                 </div>
               
                <div class="form-group">
                    <label for="dh_dienThoai"><b>Điện thoại:</b></label>
                    @if (isset(Auth::user()->dienthoai)) 
                    <input type="text" class="form-control" id="dh_dienThoai"  name="dh_dienThoai" value="{{ Auth::user()->dienthoai }}">
                    @else
                    <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11">
                    @endif
                </div>

                
                <div class="form-group">
                    <label for="dh_email"><b>Email:</b></label>
                    @if (isset(Auth::user()->email)) 
                    <input type="text" class="form-control" id="dh_email"  name="dh_email" value="{{ Auth::user()->email }}" >
                    @else
                    <input type="email" class="form-control" id="dh_email" name="dh_email" ng-model="dh_email" ng-pattern="/^.+@gmail\.com$/" ng-required=true>
                    @endif
                </div>
               
            </div>
 <!-- Thông tin đặt hàng -->           
            <div class="col-lg-6 col-md-6">
                <h4>Thông tin Đặt hàng</h4>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
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
                    <label for="vc_ma"><b>Hình thức vận chuyển:</b></label>
                    <select class="form-control" id="vc_ma" name="vc_ma">
                        @foreach ($vanchuyen as $htvc)
                        <option value="{{ $htvc->vc_ma }}">{{ $htvc->vc_ten }}</option>
                        @endforeach
                    </select>
                </div>


               
                <div class="form-group">
                <div class="order_total_content text-md-left">
                    <div class="order_total_title"><b>Phí vận chuyển:</b></div>
                        <div class="order_total_amount">
                            @if($total>500000)
                                0 đ &nbsp 
                            @else
                                30,000 đ &nbsp 
                            @endif
                        </div>
                    <br>
                        <div class="order_total_title"><b> Tổng cộng:</b></div>
                        <div class="order_total_amount">
                        @if($total>500000)
                            {{ number_format($total) }} đ
                        @else
                            {{ number_format($total+30000) }} đ
                        @endif
                        </div>
                    </div>
                </div>
                </div>
                
                <!-- <div class="form-group">
                    <a href="{{ route('giohang') }}">
                    
                    <button type="button" class="button btn btn-primary cart_button_checkout">Trở lại đặt hàng</button></a>
                </div> -->

                
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
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
  }
</script>
@endsection