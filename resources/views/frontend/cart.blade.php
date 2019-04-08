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
<h4>Tổng cộng: {{ number_format($total) }} VNĐ</h4>
<br>
<a href="{{route('frontend.product')}}" ><h5>Tiếp tục mua hàng</h5></a> 
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
        <td style="text-transform: uppercase;">{{$item->name}}</td>
        <td>{{ number_format($item->price) }} VNĐ</td>
        
        <td>
          <div class="text-left wrap-num-product flex-w m-l-auto m-r-0" style="float:left;">
            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" style="float:left;">
              <a href="{{ route('capnhatgiam',$item->id ) }}" style="padding: 13px 17px; ">
                <i class="fs-16 zmdi zmdi-minus"></i></a>
            </div>

            <input style="float:left;" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $item->quantity}}">

            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" style="float:left;">
              <a href="{{ route('capnhattang',$item->id ) }}" style="padding: 13px 17px; ">
                <i class="fs-16 zmdi zmdi-plus"></i></a>
            </div>
          </div>

        </td>
        <td>
        <a href="{{ route('xoasanpham', $item->id) }}">
        <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" >Xóa</button>
        </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> 
<br>
<hr>

<br>

<a href="{{ route('frontend.dathang') }}">
      <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
                  Đặt hàng
      </button>
</a>

</div>
<!-- Slider -->
<!-- @include('frontend.widgets.homepage-slider') -->
<!-- Banner -->
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
@endsection