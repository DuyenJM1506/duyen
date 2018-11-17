@extends('backend.layouts.index')

@section('title')
Create new type of product
@endsection

@section('main-content')
<h1>Create new type of product</h1>
<form id="frmThemMoiLoaiSP" method="post" action="{{ route('danhsachloai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Nhập tên loại</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" placeholder="Nhap ten loai">
    </div>

     <div class="form-group">
        <label for="l_taoMoi">Nhập ngày tạo mới</label>
            <input type="text" class="form-control" id="l_taoMoi" name="l_taoMoi" placeholder="Nhap ngay tao moi">
    </div>

     <div class="form-group">
        <label for="l_capNhat">Nhập ngày cập nhật</label>
            <input type="text" class="form-control" id="l_capNhat" name="l_capNhat" placeholder="Nhap ngay cap nhat">
    </div>

     <div class="form-group">
        <label for="l_trangThai">Trạng thái</label>
            <select name="l_trangThai">
                <option value="1">Khoa</option>
                <option value="2">Kha dung</option>
            </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @endsection
