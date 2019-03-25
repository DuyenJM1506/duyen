@extends('backend.layouts.index')

@section('title')
Thêm mới size sản phẩm
@endsection


@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h2>Thêm mới size sản phẩm</h2>
<form id="frmThemSizeSP" method="post" action="{{ route('danhsachmodel.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

     <div class="form-group">
        <label for="s_ten">Tên size</label>
            <input type="text" class="form-control" id="s_ten" name="s_ten" placeholder="Ten" value="{{ old('s_ten') }}">
    </div>

    <div class="form-group">
        <label for="gt_ten">Giới tính</label>
            <input type="text" class="form-control" id="s_ten" name="s_ten" placeholder="Ten" value="{{ old('s_ten') }}">
    </div>

    <div class="form-group">
        <label for="s_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="s_taoMoi" name="s_taoMoi" placeholder="Ngay" value="{{ old('s_taoMoi') }}">
    </div>
    <div class="form-group">
        <label for="s_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="s_capNhat" name="s_capNhat" placeholder="Ngay" value="{{ old('s_capNhat') }}">
    </div>
    <label for="s_taoMoi">Trạng thái</label>
    <select name="s_trangThai">
        <option value="1" {{ old('m_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('m_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
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


