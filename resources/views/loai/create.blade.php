@extends('backend.layouts.index')

@section('title')
Create new type of product
@endsection

@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h1>Thêm mới loại sản phẩm</h1>
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
                <option value="1">Khóa</option>
                <option value="2">Khả dụng</option>
            </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
    @endsection

    @section('custom-scripts')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    @endsection
    