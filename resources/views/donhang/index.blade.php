@extends('backend.layouts.index')

@section('title')
    Danh sách đơn hàng
@endsection

@section('main-content')
    <a href=""></a>
 

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
        DANH SÁCH ĐƠN HÀNG
        <small>Thông tin đơn hàng</small>
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
                    <th>Mã ĐH</th>
                    <th>Mã KH</th>
                    <th>Tên KH</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Thời gian đặt hàng</th>
                    <th>Tổng cộng</th>
                    <th>Trạng thái</th>
                    <th>TT</th>
                    <th>VC</th>
                    <th>NV xử lý</th>
                    <th>NV giao hàng</th>
                    <th>CTĐH</th>
                    <th>Sửa - Xóa</th>
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachdonhang as $dh)
                <tr>
                    <td>{{ $dh->dh_ma }}</td>
                    <td>{{ $dh->khachhang->id }}</td>
                    <td>{{ $dh->dh_tenKhachHang }}</td>
                    <td>{{ $dh->dh_diaChi }}</td>
                    <td>{{ $dh->dh_dienThoai }}</td>
                    <td>{{ $dh->dh_email }}</td>
                    <td>{{ $dh->dh_thoiGianDatHang }}</td>
                    <td>{{ $dh->dh_tongcong }}</td>
                    <td>{{ $dh->dh_trangThai }}</td>
                    <td>{{ $dh->thanhtoan->tt_ten }}</td>
                    <td>{{ $dh->vanchuyen->vc_ten }}</td>
                    <td>{{ $dh->nhanvienXL->nv_hoTen }}</td>
                    <td>{{ $dh->nhanvienGH->nv_hoTen }}</td>
                    <td>
                        <a href="#">Xem</a>
                    </td>
                    <td>
                        <a href="{{ route('danhsachdonhang.edit' , ['id' => $dh->dh_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a>
                        <form action="{{ route('danhsachdonhang.destroy', ['id' => $dh->dh_ma]) }}" method="post" class="pull-left">
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