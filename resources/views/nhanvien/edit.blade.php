@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh thông tin nhân viên
@endsection

@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/boostrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
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

<h2>Hiệu chỉnh thông tin nhân viên</h2>
<form id="frmEditNhanvien" method="post" action="{{ route('danhsachnhanvien.update', ['id'=> $nv->nv_ma ]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nv_id">ID nhân viên</label>
            <input disabled type="text" class="form-control" id="nv_id" name="nv_id" placeholder="ID" value="{{ $nv->nv_id }}">
    </div>


    <div class="form-group">
        <label for="nv_hoTen">Họ tên nhân viên</label>
            <input type="text" class="form-control" id="nv_hoTen" name="nv_hoTen" placeholder="Ten" value="{{ $nv->nv_hoTen }}">
    </div>

    <div class="form-group">
        <label for="nv_gioiTinh">Giới tính</label>
            <input type="text" class="form-control" id="nv_gioiTinh" name="nv_gioiTinh" placeholder="Gioi tinh" value="{{ $nv->nv_gioiTinh }}">
    </div>

    <div class="form-group">
        <label for="nv_ngaySinh">Ngày sinh</label>
            <input type="text" class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" placeholder="Ngay sinh" value="{{ $nv->nv_ngaySinh }}">
    </div>

     <div class="form-group">
        <label for="nv_diaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="nv_diaChi" name="nv_diaChi" placeholder="Địa chỉ" value="{{ $nv->nv_diaChi }}"> 
    </div>
    <div class="form-group">
        <label for="nv_dienThoai">Điện thoại</label>
            <input type="text" class="form-control" id="nv_dienThoai" name="nv_dienThoai" placeholder="Điện thoại" value="{{ $nv->nv_dienThoai }}"> 
    </div>

    <div class="form-group">
        <label for="nv_email">Email</label>
            <input type="text" class="form-control" id="nv_email" name="nv_email" placeholder="Email" value="{{ $nv->nv_email }}">
    </div>

    <div class="form-group">
        <label for="ncc_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" placeholder="Ngay" value="{{ $nv->nv_taoMoi }}">
    </div>
    <div class="form-group">
        <label for="nv_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="nv_capNhat" name="nv_capNhat" placeholder="Ngay" value="{{ $nv->nv_capNhat }}">
    </div>
    <label for="nv_taoMoi">Trạng thái</label>
    <select name="nv_trangThai">
        <option value="1" {{ old('nv_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('nv_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
    </select>

    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @endsection

    @section('custom-scripts')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

@endsection
