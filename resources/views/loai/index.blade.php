
@extends('backend.layouts.index')

@section('title')
    Danh sách loại sản phẩm
@endsection

@section('main-content')
<a href="{{route('danhsachloai.create')}}" class="btn btn-primary">Thêm mới</a> 

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
        DANH SÁCH LOẠI SẢN PHẨM
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
                    <th>Tên loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachloai as $loai)
                <tr>
                    <td>{{ $loai->l_ma }}</td>
                    <td>{{ $loai->l_ten }}</td>
                    <td><a href="{{ route('danhsachloai.edit' , ['id' => $loai->l_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a></td>
                    <td>
                        <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->l_ma]) }}">
                            <input type="hidden" name="_method" value="DELETE"/>
                            {{ csrf_field() }}
                            <button type="submit" class = "btn btn-danger">Xóa</button>
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