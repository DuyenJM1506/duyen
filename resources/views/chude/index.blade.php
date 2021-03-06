@extends('backend.layouts.index')

@section('title')
    Danh sách chủ đề sản phẩm
@endsection

@section('main-content')
<h1>List of themes</h1>

<table border = "2">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachchude as $chude)
            <tr>
                <td>{{ $chude->cd_ma }}</td>
                <td>{{ $chude->cd_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection