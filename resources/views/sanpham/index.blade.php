@extends('backend.layouts.index')

@section('title')
    Danh sách sản phẩm
@endsection

@section('main-content')
<h1>List of products</h1>
<a href="{{route('danhsachsanpham.create')}}">Them moi</a>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}<a href="#" class="close"
        data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>
<table border = "2">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Thuộc loại</th>
            <th>Sửa - Xóa</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sp)
            <tr>
                <td>{{ $sp->sp_ma }}</td>
                <td>{{ $sp->sp_ten }}</td>
                <td><img src="{{ asset('storage/photos/' .$sp->sp_hinh) }}" class="img-list"></td>
                <td>{{ $sp->loaisanpham->l_ten }}</td>
                <td>
                    <a href="{{ route('danhsachsanpham.edit' , ['id' => $sp->sp_ma]) }}"
                    class="btn btn-primary pull-left">Sửa
                    </a>
                    <form action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_ma]) }}" method="post" class="pull-left">
                        <input type="hidden" name="_method" value="DELETE"/>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection