@extends('backend.layouts.index')

@section('title')
Thêm mới sản phẩm
@endsection


@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h1>Thêm mới sản phẩm</h1>
<form id="frmThemMoiSP" method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Chọn loại sản phẩm</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
                @if(old('l_ma') == $loai->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                    <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

     <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Ten" value="{{ old('sp_ten') }}">
    </div>

     <div class="form-group">
        <label for="sp_giaGoc">Gía gốc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="" value="{{ old('sp_giaGoc') }}"> 
    </div>
    <div class="form-group">
        <label for="sp_giaBan">Gía bán</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" placeholder="" value="{{ old('sp_giaBan') }}"> 
    </div>

     <div class="form-group">
     <label for="sp_hinh">Hình đại diện</label>
        <div class="file-loading">
            <input id="sp_hinh" type="file" name="sp_hinh">
        </div>
    </div>

    <div class="form-group">
        <label for="s_ten">Chọn size sản phẩm</label>
        <select name="s_ma">
            @foreach($danhsachsizesp as $ds_size)
                @if(old('s_ma') == $ds_size->s_ma)
                    <option value="{{ $ds_size->s_ma }}" selected>{{ $ds_size->s_ten }}</option>
                @else
                    <option value="{{ $ds_size->s_ma }}">{{ $ds_size->s_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="sp_soLuongBanDau">Số lượng ban đầu</label>
            <input type="text" class="form-control" id="sp_soLuongBanDau" name="sp_soLuongBanDau" placeholder="Số lượng sản phẩm ban đầu" value="{{ old('sp_soLuongBanDau') }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Số lượng hiện tại</label>
            <input type="text" class="form-control" id="sp_soLuongHienTai" name="sp_soLuongHienTai" placeholder="Số lượng sản phẩm hiện tại" value="{{ old('sp_soLuongHienTai') }}">
    </div> 

    <div class="form-group">
        <label for="xx_ten">Chọn xuất xứ sản phẩm</label>
        <select name="xx_ma">
            @foreach($danhsachxuatxu as $xx)
                @if(old('xx_ma') == $xx->xx_ma)
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
                @if(old('m_ma') == $mau->m_ma)
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
                @if(old('km_ma') == $km->km_ma)
                    <option value="{{ $km->km_ma }}" selected>{{ $km->km_ten }}</option>
                @else
                    <option value="{{ $km->km_ma }}">{{ $km->km_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="sp_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" placeholder="Ngay" value="{{ old('sp_taoMoi') }}">
    </div>
    <div class="form-group">
        <label for="sp_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" placeholder="Ngay" value="{{ old('sp_capNhat') }}">
    </div>
    <label for="sp_taoMoi">Trạng thái</label>
    <select name="sp_trangThai">
        <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
    </select>
    

    <div class="form-group">
    <label>Hình ảnh liên quan sản phẩm</label>
        <div class="file-loading">
            <input type="file" id="sp_hinhanhlienquan" mame="sp_hinhanhlienquan[]" multiple>
        </div>
    </div>

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

        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>
@endsection


