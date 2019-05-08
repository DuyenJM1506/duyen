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
        <label for="s_ten">Chọn size sản phẩm</label>
        <select name="s_ma">
            @foreach($danhsachsizesp as $ds_size)
                @if($ds_size->s_ma == $sp->s_ma)
                    <option value="{{ $ds_size->s_ma }}" selected>{{ $ds_size->s_ten }}</option>
                @else
                    <option value="{{ $ds_size->s_ma }}">{{ $ds_size->s_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="sp_soLuongBanDau">Số lượng ban đầu</label>
            <input type="text" class="form-control" id="sp_soLuongBanDau" name="sp_soLuongBanDau" placeholder="So luong ban dau" value="{{ $sp->sp_soLuongBanDau }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Số lượng hiện tại</label>
            <input type="text" class="form-control" id="sp_soLuongHienTai" name="sp_soLuongHienTai" placeholder="So luong hien tai" value="{{ $sp->sp_soLuongHienTai }}">
    </div>

    <div class="form-group">
        <label for="xx_ten">Chọn xuất xứ sản phẩm</label>
        <select name="xx_ma">
            @foreach($danhsachxuatxu as $xx)
                @if($xx->xx_ma == $sp->xx_ma)
                    <option value="{{ $xx->xx_ma }}" selected>{{ $xx->xx_ten }}</option>
                @else
                    <option value="{{ $xx->xx_ma }}">{{ $xx->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="m_ten">Chọn màu sản phẩm</label>
        <select name="m_ma">
            @foreach($danhsachmau as $mau)
                @if($mau->m_ma == $sp->m_ma)
                    <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                    <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="km_ten">Chọn khuyến mãi</label>
        <select name="km_ma">
            @foreach($danhsachkhuyenmai as $km)
                @if($km->km_ma == $sp->km_ma)
                    <option value="{{ $km->km_ma }}" selected>{{ $km->km_ten }}</option>
                @else
                    <option value="{{ $km->km_ma }}">{{ $km->km_ten }}</option>
                @endif
            @endforeach
        </select>
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
            overwriteInitial: false
        });
    });
</script>
@endsection
