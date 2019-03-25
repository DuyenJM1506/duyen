@extends('backend.layouts.index')

@section('title')
    Danh sách size sản phẩm
@endsection

@section('main-content')
    <a href="#" class=""> </a>
    </br>
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
        DANH SÁCH SIZE SẢN PHẨM
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
                    <th>Tên size</th>
                    <th>Cân nặng</th>
                    <th>Chiều cao</th>
                    <th>Giới tính</th>
                    <th>Mô tả</th>
                    
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachmodel as $md)
                <tr>
                    <td>{{ $md->md_ma}}</td>
                    <td>{{ $md->gioitinh->gt_ten }}</td>
                    <td>{{ $md->md_canNang }}</td>
                    <td>{{ $md->md_chieuCao }}</td>
                    <td>{{ $md->sizesanpham->s_ten }}</td>
                    <td>{{ $md->trangthai }}</td>
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