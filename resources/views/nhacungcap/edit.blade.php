@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh nhà cung cấp
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

<h2>Hiệu chỉnh thông tin nhà cung cấp</h2>
<form id="frmEditNhaCC" method="post" action="{{ route('danhsachnhacungcap.update', ['id'=> $ncc->ncc_ma ]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}

    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
            <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" placeholder="Ten" value="{{ $ncc->ncc_ten }}">
    </div>

     <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" placeholder="Địa chỉ" value="{{ $ncc->ncc_diaChi }}"> 
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
            <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" placeholder="Điện thoại" value="{{ $ncc->ncc_dienThoai }}"> 
    </div>

    <div class="form-group">
        <label for="ncc_email">Email</label>
            <input type="text" class="form-control" id="ncc_email" name="ncc_email" placeholder="Email" value="{{ $ncc->ncc_email }}">
    </div>

    <div class="form-group">
        <label for="ncc_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" placeholder="Ngay" value="{{ $ncc->ncc_taoMoi }}">
    </div>
    <div class="form-group">
        <label for="ncc_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="ncc_capNhat" name="ncc_capNhat" placeholder="Ngay" value="{{ $ncc->ncc_capNhat }}">
    </div>
    <label for="ncc_taoMoi">Trạng thái</label>
    <select name="ncc_trangThai">
        <option value="1" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
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
