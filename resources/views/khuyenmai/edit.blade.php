@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh khuyến mãi
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
<h2>Hiệu chỉnh khuyến mãi</h2>
<form id="frmEditKM" method="post" action="{{ route('danhsachkhuyenmai.update', ['id'=> $km->km_ma ]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
   
    <div class="form-group">
        <label for="km_ten">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="km_ten" name="km_ten" placeholder="Ten khuyen mai" value="{{ $km->km_ten }}">
    </div>

    <div class="form-group">
     <label for="km_noiDung">Nội dung khuyến mãi</label>
        <div class="file-loading">
        <input type="text" class="form-control" id="km_noiDung" name="km_noiDung" placeholder="Noi dung khuyen mai" value="{{ $km->km_noiDung }}">
        </div>
    </div>  

    <div class="form-group">
     <label for="km_giaTri">Gía trị khuyến mãi</label>
        <div class="file-loading">
        <input type="text" class="form-control" id="km_giaTri" name="km_giaTri" placeholder="Gia tri khuyen mai" value="{{ $km->km_giaTri }}">
        </div>
    </div>  

    <div class="form-group">
        <label for="km_ngayBatDau">Ngày bắt đầu</label>
            <input type="text" class="form-control" id="km_ngayBatDau" name="km_ngayBatDau" placeholder="Ngay" value="{{ $km->km_ngayBatDau }}">
    </div>

    <div class="form-group">
        <label for="km_ngayKetThuc">Ngày kết thúc</label>
            <input type="text" class="form-control" id="km_ngayKetThuc" name="km_ngayKetThuc" placeholder="Ngay" value="{{ $km->km_ngayKetThuc }}">
    </div>

    <div class="form-group">
        <label for="nv_nguoiLap">Người lập</label>
        <select name="nv_ma">
            @foreach($danhsachnhanvien as $nv)
                @if($nv->nv_ma == $km->nv_ma)
                    <option value="{{ $nv->nv_ma }}" selected>{{ $nv->nv_hoTen }}</option>
                @else
                    <option value="{{ $nv->nv_ma }}">{{ $nv->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="km_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="km_taoMoi" name="km_taoMoi" placeholder="Ngay" value="{{ $km->km_taoMoi }}">
    </div>
    <div class="form-group">
        <label for="km_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="km_capNhat" name="km_capNhat" placeholder="Ngay" value="{{ $km->km_capNhat }}">
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
