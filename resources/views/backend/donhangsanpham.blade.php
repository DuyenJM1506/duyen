@extends('backend.layouts.app')

@section('title')
    Danh sách sản phẩm vừa được thêm vào đơn hàng
@endsection
@section('styles')
    <style>
        #datepicker{
            width:300px;
            margin: 0 20px 20px 20px;
        }
        #datepicker > span:hover{
            cursor: pointer;
        }</style>
@endsection
@section('main-content')
    <div class="main">
        <div class="panel">
            <div class="panel-heading row">
                <div class="col-sm-6"><h3 class="panel-title">Danh sách sản phẩm vừa được order</h3></div>
                <div class="col-sm-6 row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">

                    </div>

                </div>

                <div class="col-sm-12" style="height: 20px"></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Tên </th>
                        <th>Số lượng</th>
                        <th>Đơn giá bán</th>
                        <th>Ngày order</th>
                        <th>Đơn hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($spdh as $sanpham)
                        <tr>
                            <td>{{ $sanpham->sp_ma }}</td>
                            <td>
                                <img src="{{ asset('upload/' . $sanpham->sp_anhDaiDien) }}" width="20px" height="20px" />
                            </td>
                            <td><a href="{{ route('sanpham_edit',$sanpham->sp_ma)}}">{{ str_limit($sanpham->sp_ten,23) }}</a></td>
                            <td>{{ $sanpham->ctdh_soLuong }}</td>
                            <td>{{ number_format($sanpham->sp_giaBan) }} đ</td>
                            <td>{{ $sanpham->ctdh_taoMoi }}</td>
                            <td><a href="{{ route('donhang_edit',$sanpham->dh_ma)}}">{{ $sanpham->dh_ma }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <br>
                Tổng số trang: {{ $spdh->lastPage()}}
                <div class="pagination pull-right">
                    {!! $spdh->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script language="javascript">
        function ktra()
        {
            if(confirm("Bạn có chắc chắn muốn xóa "))
            {
                return true;
            }
            else
            {
                return false;
            }
        }


    </script>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $("#datepicker2").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
        $(function () {
            $("#datepicker1").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

    </script>
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endsection