@extends('backend.layouts.index')

@section('title')
    Danh sách sản phẩm
@endsection

@section('main-content')
    <a href="{{route('danhsachsanpham.create')}}" class="btn btn-primary">Thêm mới</a>
    <a href="{{route('danhsachsanpham.excel')}}" class="btn btn-primary">Xuất Excel</a>
 

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
        DANH SÁCH SẢN PHẨM
        <small>Chi tiết sản phẩm</small>
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
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá gốc</th>
                    <th>Giá bán</th>
                    <th>Loại</th>
                    <th>SL ban đầu</th>
                    <th>SL hiện tại</th>
                    <th>Xuất xứ</th>
                    <th>Màu</th>
                    <th>Khuyến mãi</th>
                    <th>Sửa - Xóa</th>
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachsanpham as $sp)
                <tr>
                    <td>{{ $sp->sp_ma }}</td>
                    <td>{{ $sp->sp_ten }}</td>
                    <td><img src="{{ asset('storage/photos/' .$sp->sp_hinh) }}" class="img-list"></td>
                    
                    <td class="text-right">{{ number_format($sp->sp_giaGoc) }}</td>
                    <td class="text-right">{{ number_format($sp->sp_giaBan) }}</td>
                    <td>{{ $sp->loaisanpham->l_ten }}</td>
                    <td>{{ $sp->sp_soLuongBanDau }}</td>
                    <td>{{ $sp->sp_soLuongHienTai }}</td>
                    <td>{{ $sp->xuatxus->xx_ten }}</td>
                    <td>{{ $sp->maus->m_ten }}</td>
                    <td>{{ $sp->khuyenmai->km_ten }}</td>
                    <td>
                        <a href="{{ route('danhsachsanpham.edit' , ['id' => $sp->sp_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a>
                        <form action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_ma]) }}" method="post" class="pull-left">
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