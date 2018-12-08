@extends('backend.layouts.index')

@section('title')
    Danh sach loai san pham
@endsection

@section('main-content')

<h2>{{Session::get('aaaa')}} DANH SÁCH LOẠI SẢN PHẨM </h2>
<div>
    <a href="{{route('danhsachloai.create')}}" class="btn btn-primary">Thêm mới</a> 
    <a href="{{route('danhsachloai.excel')}}" class="btn btn-primary">Xuất Excel</a> 
    <a href="{{route('danhsachloai.pdf')}}" class="btn btn-primary">Xuất PDF</a> 
    <a href="{{route('danhsachloai.print')}}" class="btn btn-primary">Print</a> 
</div>
<br/>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{$msg}}">{{Session::get('alert-' . $msg)}}<a href="#" class="close"
        data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>

<table border = "1">
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
    <td><a href="{{ route('danhsachloai.edit', ['id' => $loai->l_ma]) }}">Edit</a></td>
    <td>
        <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->l_ma]) }}">
            <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}
            <button type="submit" class = "btn btn-danger">Xoa</button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection