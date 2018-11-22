@extends('backend.layouts.index')

@section('title')
    Danh sách sản phẩm
@endsection

@section('main-content')
<h1>List of products</h1>
<a href="{{route('danhsachsanpham.create')}}">Them moi</a>
<table border = "2">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Thuộc loại</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sp)
            <tr>
                <td>{{ $sp->sp_ma }}</td>
                <td>{{ $sp->sp_ten }}</td>
                <td><img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-list"></td>
                <td>{{ $sp->loaisanpham->l_ten }}</td>
                <td><a href="{{ route('danhsachsanpham.edit' , ['id' =>$sp->sp_ma]) }}"></a></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection