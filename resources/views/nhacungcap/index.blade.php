@extends('backend.layouts.index')

@section('title')
    Danh sách nhà cung cấp
@endsection

@section('main-content')
    <a href="{{route('danhsachnhacungcap.create')}}" class="btn btn-primary">Thêm mới</a>

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
        DANH SÁCH NHÀ CUNG CẤP
        <small>Thông tin chi tiết nhà cung cấp</small>
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
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Cập nhật</th>
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachnhacungcap as $ncc)
                <tr>
                    <td>{{ $ncc->ncc_ma }}</td>
                    <td>{{ $ncc->ncc_ten }}</td>
                    <td>{{ $ncc->ncc_diaChi }}</td>
                    <td>{{ $ncc->ncc_dienThoai }}</td>
                    <td>{{ $ncc->ncc_email }}</td>
                    <td>
                    <a href="{{ route('danhsachnhacungcap.edit' , ['id' => $ncc->ncc_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a>
                        <form action="{{ route('danhsachnhacungcap.destroy', ['id' => $ncc->ncc_ma]) }}" method="post" class="pull-left">
                            <input type="hidden" name="_method" value="DELETE"/>
                            {{ csrf_field() }}
                            &nbsp; <button type="submit" class="btn btn-danger">Xóa</button>
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