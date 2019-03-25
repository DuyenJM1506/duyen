@extends('backend.layouts.index')

@section('title')
    Hieu chinh xuat xu san pham
@endsection

@section('main-content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Hiệu chỉnh xuất xứ sản phẩm</h2>
<form method="post" action="{{ route('danhsachxuatxu.update', ['id' => $xx->xx_ma]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT"/>

    {{ csrf_field() }}

<div class="form-group">
    <label for="xx_ten">Nhập tên xuất xứ</label>
        <input type="text" class="form-control" id="xx_ten" name="xx_ten" value="{{ $xx->xx_ten }}" placeholder="Nhap ten xuat xu">
</div>  
<div class="form-group">
    <label for="xx_taoMoi">Nhập ngày tạo mới</label>
        <input type="text" class="form-control" id="xx_taoMoi" name="xx_taoMoi" value="{{ $xx->xx_taoMoi }}" placeholder="Nhap ngay tao moi">
</div>
<div class="form-group">
    <label for="xx_capNhat">Nhập ngày cập nhật</label>
        <input type="text" class="form-control" id="xx_capNhat" name="xx_capNhat" value="{{ $xx->xx_capNhat }}" placeholder="Nhap ngay cap nhat">
</div>
<div class="form-group">
    <label for="xx_trangThai">Trạng thái</label>
    <select name="xx_trangThai">
        <option value="1" {{ $xx->xx_trangThai == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ $xx->xx_trangThai == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
        
</div>
<button type="submit" class="btn btn-primary">Lưu</button>     
</form>                      
@endsection