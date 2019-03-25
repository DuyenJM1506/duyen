@extends('backend.layouts.index')

@section('title')
    Quản lý phiếu nhập
@endsection

@section('main-content')
<a href="{{route('danhsachphieunhap.create')}}" class="btn btn-primary">Thêm mới</a>
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
      QUẢN LÝ PHIẾU NHẬP
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
                    <th>Số hóa đơn</th>
                    <th>Họ tên người lập phiếu</th>
                    <th>Kế toán</th>
                    <th>Thủ kho</th>
                    <th>Người giao</th>
                    <th>Nhà cung cấp</th>
                    <th>Ngày lập phiếu</th>
                    <th>Ngày xác nhận</th>
                    <th>Ngày nhập kho</th>
                    <th>Sửa</th>
                    <th>Xóa</th>

                </tr>
                </thead>

                <tbody>
                @foreach($danhsachphieunhap as $pn)
                <tr>
                    <td>{{ $pn->pn_ma }}</td>
                    <td>{{ $pn->pn_soHoaDon }}</td>
                    <td>{{ $pn->nguoilapphieu->nv_hoTen }}</td>
                    <td>{{ $pn->ketoan->nv_hoTen }}</td>
                    <td>{{ $pn->thukho->nv_hoTen }}</td>
                    <td>{{ $pn->pn_nguoiGiao }}</td>
                    <td>{{ $pn->nhacungcap->ncc_ten }}</td>
                    <td>{{ $pn->pn_ngayXacNhan }}</td>
                    <td>{{ $pn->pn_nhapKho }}</td>
                    <td>
                    <a href="{{ route('danhsachphieunhan.edit' , ['id' => $pn->pn_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('danhsachphieunhan.destroy', ['id' => $pn->pn_ma]) }}" method="post" class="pull-left">
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