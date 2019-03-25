{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.index` --}}
@extends('frontend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Giỏ hàng
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.index` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.index` --}}
@section('main-content')

<div class="container text-center">
<h2>Giỏ hàng</h2>
<br>
<h4>Tổng cộng: </h4>
<br>
<a href="{{route('frontend.product')}}" ><h5>Thêm sản phẩm</h5></a> 
<br>  
<div class="container text-left">   
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sản phẩm </th>
        <th></th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($cart as $item)
      <tr>
        <td>
        <img src="{{ asset('storage/photos/' . $item->attributes->img) }}" height="50px" width="40px" alt="hinh">
        </td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}} đ</td>
        <td>
        <td>
          <div class="text-left wrap-num-product flex-w m-l-auto m-r-0">
            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
              <a href="{{ route('capnhatgiam',$item->id ) }}">
                <i class="fs-16 zmdi zmdi-minus"></i></a>
            </div>

            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
              <a href="{{ route('capnhattang',$item->id ) }}">
                <i class="fs-16 zmdi zmdi-plus"></i></a>
            </div>
          </div>

        </td>
        <td>
        <a href="{{ route('xoasanpham', $item->id) }}">
        <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}
            &nbsp; <button type="submit" class="btn btn-danger">Xóa</button>
        </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> 
<!-- Thông tin khách hàng -->
<div class="container" ng-controller="orderController">
    <form name="orderForm" ng-submit="submitOrderForm()" novalidate>               
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin khách hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <br>
              
                <div class="form-group">
                    <label for="kh_hoTen">Họ tên:</label>
                    <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" ng-model="kh_hoTen" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_gioiTinh">Giới tính:</label>
                    <select name="kh_gioiTinh" id="kh_gioiTinh" class="form-control" ng-model="kh_gioiTinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kh_email">Email:</label>
                    <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-pattern="/^.+@gmail\.com$/" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_ngaySinh">Ngày sinh:</label>
                    <input type="text" class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" ng-model="kh_ngaySinh" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_diaChi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                </div>
                <div class="form-group">
                    <label for="kh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" ng-model="kh_dienThoai" ng-minlength="6" ng-maxlength="11">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin Đặt hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
              <br>
                <div class="form-group">
                    <label for="dh_thoiGianNhanHang">Thời gian nhận hàng:</label>
                    <input type="text" class="form-control" id="dh_thoiGianNhanHang" name="dh_thoiGianNhanHang" ng-model="dh_thoiGianNhanHang" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_nguoiNhan">Người nhận:</label>
                    <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" ng-model="dh_nguoiNhan" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_diaChi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="dh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                </div>
               
             
            </div>
        </div>
        <!-- Div Thông báo validate hợp lệ 
        Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$valid = true
        Sử dụng tiền chỉ lệnh ng-show="orderForm.$valid"
        -->
        <!-- <div class="alert alert-success" ng-show="orderForm.$valid">
            Thông tin hợp lệ, vui lòng bấm nút <b>"Thanh toán"</b> để hoàn tất ĐƠN HÀNG<br />
            Chúng tôi sẽ gởi mail đển quý khách. Xin chân thành cám ơn Quý Khách hàng đã tin tưởng sản phẩm của chúng tôi.
        </div> -->
        <!-- Nút submit form -->
        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
            Thanh toán
        </button>
    </form>
</div>


</div>
<!-- Slider -->
<!-- @include('frontend.widgets.homepage-slider') -->
<!-- Banner -->
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
@endsection