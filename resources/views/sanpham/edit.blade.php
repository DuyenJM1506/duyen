@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh sản phẩm
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
<form id="frmEditSP" method="post" action="{{ route('danhsachsanpham.update', ['id'=> $sp->sp_ma ]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Loại sản phẩm</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
                @if($loai->l_ma == $sp->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                    <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

     <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Ma" value="{{ $sp->sp_ten }}">
    </div>

     <div class="form-group">
        <label for="sp_giaGoc">Gía gốc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Ten" value="{{ $sp->sp_giaGoc }}">
    </div>
    <div class="form-group">
        <label for="sp_giaBan">Gía bán</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" placeholder="Ten" value="{{ $sp->sp_giaBan }}">
    </div>

     <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh">
        </div>
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" placeholder="Thong tin" value="{{ $sp->sp_thongTin }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
            <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" placeholder="Danh gia" value="{{ $sp->sp_danhGia }}">
    </div>
    <div class="form-group">
        <label for="sp_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" placeholder="Ngay" value="{{ $sp->sp_taoMoi }}">
    </div>
    <div class="form-group">
        <label for="sp_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" placeholder="Ngay" value="{{ $sp->sp_capNhat }}">
    </div>
    <select name="sp_trangThai">
        <option value="1" {{ $sp->sp_trangThai == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ $sp->sp_trangThai == 2 ? "selected" : "" }}>Khả dụng</option>
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
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPrewiewAsData: true,
            initialPrewiew: [
                "{{ asset('storage/photos/' .$sp->sp_hinh) }}"
            ],
            initialPrewiewConfig: [
                {caption: "{{ $sp->sp_hinh }}", size: {{ Storage::size('public/photos/' .$sp->sp_hinh) }}, 
                width: "120px", url: "{$url}", key: 1},
            ]
        });
    });
</script>
@endsection
