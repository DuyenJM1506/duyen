@extends('backend.layouts.index')

@section('title')
    Danh sách màu sản phẩm
@endsection

@section('main-content')
    <a href="{{route('danhsachmau.create')}}" class="btn btn-primary">Thêm mới</a>

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
        DANH SÁCH MÀU SẢN PHẨM
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
                    <th>Tên màu</th>
                    <th>Màu</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>

                <tbody>
                @foreach($danhsachmau as $mau)
                <tr>
                    <td>{{ $mau->m_ma }}</td>
                    <td>{{ $mau->m_ten }}</td>
                    <td>
                        <img src="{{ asset('storage/photos/' .$mau->m_hinhDaiDien) }}" class="img-list">
                    </td>
                    <td>
                        <a href="{{ route('danhsachmau.edit' , ['id' => $mau->m_ma]) }}"
                        class="btn btn-primary pull-left">Sửa
                        </a> </td>
                      <td>
                        <form action="{{ route('danhsachmau.destroy', ['id' => $mau->m_ma]) }}" method="post" class="pull-left">
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