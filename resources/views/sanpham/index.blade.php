@extends('backend.layouts.index')

@section('title')
    Danh sách sản phẩm
@endsection

@section('main-content')
<h1>List of products</h1>

<table border = "2">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Thuộc loại</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten }}</td>
                <td>{{ $sanpham->loaisanpham->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection