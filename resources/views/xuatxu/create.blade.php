@extends('backend.layouts.index')

@section('title')
Them moi xuat xu san pham
@endsection

@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h1>Thêm mới xuất xứ sản phẩm</h1>
<form id="frmThemXuatxuSP" method="post" action="{{ route('danhsachxuatxu.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="xx_ten">Nhập tên xuất xứ</label>
            <input type="text" class="form-control" id="xx_ten" name="xx_ten" placeholder="Nhap ten xuat xu">
    </div>

     <div class="form-group">
        <label for="xx_taoMoi">Nhập ngày tạo mới</label>
            <input type="text" class="form-control" id="xx_taoMoi" name="xx_taoMoi" placeholder="Nhap ngay tao moi">
    </div>

     <div class="form-group">
        <label for="xx_capNhat">Nhập ngày cập nhật</label>
            <input type="text" class="form-control" id="xx_capNhat" name="xx_capNhat" placeholder="Nhap ngay cap nhat">
    </div>

     <div class="form-group">
        <label for="xx_trangThai">Trạng thái</label>
            <select name="xx_trangThai">
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
    