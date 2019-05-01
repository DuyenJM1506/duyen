
@extends('backend.layouts.index')

@section('title')
    Chi tiết đơn hàng 
@endsection

@section('main-content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}<a href="#" class="close"
        data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>

<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CHI TIẾT ĐƠN HÀNG 
        <!-- <small>Chi tiết loại sản phẩm</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col">
          <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>Mã đơn hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thời gian</th>
                </tr>   
                </thead>

                <tbody>
                @foreach($ctdonhang as $spdh)
                <tr>
                    <td>{{ $spdh->spdh_ma }}</td>
                    <td>{{ $spdh->donhang->dh_ma }}</td>
                    <td>{{ $spdh->sanpham->sp_ma }}</td>
                    <td>{{ $spdh->size->s_ma }}</td>
                    <td>{{ $spdh->spdh_soLuong }}</td>
                    <td>{{ $spdh->spdh_donGia }}</td>
                    <th>{{ $spdh->created_at }}</th>
                </tr>
                @endforeach
                </tbody>

              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div> <!-- col -->
      </div><!-- row -->
    </section> 
</div>
@endsection