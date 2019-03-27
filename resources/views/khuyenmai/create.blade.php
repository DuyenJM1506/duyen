@extends('backend.layouts.index')

@section('title')
Thêm mới khuyến mãi
@endsection


@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h1>Thêm mới khuyến mãi</h1>
<form id="frmThemMoiKM" method="post" action="{{ route('danhsachkhuyenmai.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

     <div class="form-group">
        <label for="km_ten">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="km_ten" name="km_ten" placeholder="Ten khuyen mai" value="{{ old('km_ten') }}">
    </div>

    <div class="form-group">
     <label for="km_noiDung">Nội dung khuyến mãi</label>
        <input type="text" class="form-control" id="km_noiDung" name="km_noiDung" placeholder="Noi dung khuyen mai" value="{{ old('km_noiDung') }}">
    </div>  

    <div class="form-group">
     <label for="km_giaTri">Gía trị khuyến mãi</label>
        <input type="text" class="form-control" id="km_giaTri" name="km_giaTri" placeholder="Gia tri khuyen mai" value="{{ old('km_giaTri') }}">
    </div>  

    <div class="form-group">
        <label for="km_ngayBatDau">Ngày bắt đầu</label>
            <input type="text" class="form-control" id="km_ngayBatDau" name="km_ngayBatDau" placeholder="Ngay" value="{{ old('km_ngayBatDau') }}">
    </div>

    <div class="form-group">
        <label for="km_ngayKetThuc">Ngày kết thúc</label>
            <input type="text" class="form-control" id="km_ngayKetThuc" name="km_ngayKetThuc" placeholder="Ngay" value="{{ old('km_ngayKetThuc') }}">
    </div>

    <div class="form-group">
        <label for="nv_nguoiLap">Người lập</label>
        <select name="nv_ma">
            @foreach($danhsachnhanvien as $nv)
                @if(old('nv_ma') == $nv->nv_ma)
                    <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_hoTen }}</option>
                @else
                    <option value="{{ $nv->nv_ma }}">{{ $nv->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
     <label for="km_hinhDaiDien">Hình đại diện</label>
        <div class="file-loading">
            <input id="km_hinhDaiDien" type="file" name="km_hinhDaiDien">
        </div>
    </div>

    <div class="form-group">
        <label for="km_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="km_taoMoi" name="km_taoMoi" placeholder="Ngay" value="{{ old('km_taoMoi') }}">
    </div>
    <div class="form-group">
        <label for="km_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="km_capNhat" name="km_capNhat" placeholder="Ngay" value="{{ old('km_capNhat') }}">
    </div>
    <label for="km_taoMoi">Trạng thái</label>
    <select name="km_trangThai">
        <option value="1" {{ old('km_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('km_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
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

<script>
    $(document).ready(function() {
        $("#km_hinhDaiDien").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
    });
</script>

@endsection


