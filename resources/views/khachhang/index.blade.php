@extends('backend.layouts.index')

@section('title')
    Danh sách khách hàng
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
        DANH SÁCH KHÁCH HÀNG
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
                    <th>Họ tên</th>
                    <th>Username</th>
                    <th>Giới tính</th>
                    <th>Năm sinh</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Xóa</th>
                   
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachkhachhang as $kh)
                <tr>
                    <td>{{ $kh->id }}</td>
                    <td>{{ $kh->name }}</td>
                    <td>{{ $kh->username }}</td>
                    <td>{{ $kh->gioitinh }}</td>
                    <td>{{ $kh->namsinh }}</td>
                    <td>{{ $kh->diachi }}</td>
                    <td>{{ $kh->dienthoai }}</td>
                    <td>{{ $kh->email }}</td>
                    <td>{{ $kh->password }}</td>
                    <td>
                        <form action="{{ route('danhsachkhachhang.destroy', ['id' => $kh->id]) }}" method="post" class="pull-left">
                            <input type="hidden" name="_method" value="DELETE"/>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                    
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