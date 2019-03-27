@extends('backend.layouts.index')

@section('title')
    Quản lý khuyến mãi
@endsection

@section('main-content')
<a href="{{route('danhsachkhuyenmai.create')}}" class="btn btn-primary">Thêm mới</a>
<!-- <a href="{{route('danhsachphieunhap.print')}}" class="btn btn-primary">Print</a> -->

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
      QUẢN LÝ KHUYẾN MÃI
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
                    <th>Mã khuyến mãi</th>
                    <th>Tên khuyến mãi</th>
                    <th>Nội dung</th>
                    <th>Gía trị</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Người lập</th>
                    <th>Hình đại diện</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </tr>
                </thead>

                <tbody>
                @foreach($danhsachkhuyenmai as $km)
                <tr>
                    <td>{{ $km->km_ma }}</td>
                    <td>{{ $km->km_ten }}</td>
                    <td>{{ $km->km_noiDung }}</td>
                    <td>{{ $km->km_giaTri }}</td>
                    <td>{{ $km->km_ngayBatDau }}</td>
                    <td>{{ $km->km_ngayKetThuc }}</td>
                    <td>{{ $km->nguoilapkm->nv_hoTen }}</td>
                    <td>
                        <img src="{{ asset('storage/photos/' .$km->km_hinhDaiDien) }}" class="img-list">
                    </td>
                    <td>
                    <a href="{{ route('danhsachkhuyenmai.edit' , ['id' => $km->km_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('danhsachkhuyenmai.destroy', ['id' => $km->km_ma]) }}" method="post" class="pull-left">
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