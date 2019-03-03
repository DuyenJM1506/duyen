@extends('frontend.layouts.app')

@section('title')
    Kiểm tra giỏ hàng
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
    <style type="text/css">
        #preselection {
            max-width: 30%;
        }
    </style>
@endsection
@section('content')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title" style="font-family: Arial">Kiểm tra giỏ hàng</div>
                        <div class="cart_items border">
                            <table class="table table-hover" style="font-family: Arial">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá gốc</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Tổng cộng</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody ng-app="myApp" ng-controller="myCtrl">
                                <?php $a = 1 ?>
                                <?php
                                $sorted = $cart->sortByDesc('id');
                                ?>
                                @foreach ($sorted as $item)
                                    <tr>
                                        <th scope="row">{{ $a }}</th>
                                        <td><img src="{{ asset('upload/' . $item->attributes->img) }}" height="50px"
                                                 width="40px" alt=""></td>
                                        <td align="center">{{ str_limit($item->name,30) }}</td>
                                        <td class="align-items-center">
                                            <div class="input-group">

                                                <a href="{{ route('capnhatgiam',$item->id ) }}"><span><i
                                                                class="fas fa-minus-circle fa-2x"></i></span></a>
                                                <button type="button"
                                                        class="btn btn-default">{{$item->quantity}}</button>

                                                <a href="{{ route('capnhattang',$item->id ) }}"><span><i
                                                                class="fas fa-plus-circle fa-2x"></i></span></a>

                                            </div>
                                        </td>
                                        <td class="align-items-center">{{ number_format($item->attributes->giagoc) }}
                                            đ
                                        </td>
                                        <td class="align-items-center">{{ number_format($item->price) }} đ</td>
                                        <td class="d-flex align-items-center">{{ number_format($item->getPriceSum()) }}
                                            đ
                                        </td>
                                        <td class="align-items-center">
                                            <a onclick="return ktra()" href="{{ route('xoasanpham', $item->id) }}">
											<span>
												<i class="far fa-trash-alt fa-2x"></i>
											</span>
                                            </a></td>
                                    </tr>
                                    <?php $a = $a + 1; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total" style="height: 150px">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Phí vận chuyển:</div>
                                <div class="order_total_amount">
                                    @if($total>500000)
                                        0 đ
                                    @else
                                        30,000 đ
                                    @endif
                                </div>
                                <br>
                                <div class="order_total_title">Tổng cộng:</div>
                                <div class="order_total_amount">
                                    @if($total>500000)
                                        {{ number_format($total) }} đ
                                    @else
                                        {{ number_format($total+30000) }} đ
                                    @endif

                                </div>

                            </div>

                        </div>

                        <div class="cart_buttons">
                            <a href="{{ route('index') }}">
                                <button type="button" class="button cart_button_clear">Tiếp tục mua hàng</button>
                            </a>
                            <a href="{{ route('dathang') }}">
                                <button type="button" class="button cart_button_checkout">Tiến hành đặt hàng</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript">
        function ktra() {
            if (confirm("Bạn có chắc chắn muốn xóa ")) {
                return true;
            }
            else {
                return false;
            }
        }


    </script>
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
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection