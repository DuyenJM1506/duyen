@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh màu sản phẩm
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
<h2>Hiệu chỉnh màu sản phẩm</h2>
<form id="frmEditMauSP" method="post" action="{{ route('danhsachmau.update', ['id'=> $mau->m_ma ]) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
   

    <div class="form-group">
        <label for="m_ten">Tên màu</label>
            <input type="text" class="form-control" id="m_ten" name="m_ten" placeholder="Ten" value="{{ $mau->m_ten }}">
    </div>
    <div class="form-group">
     <label for="m_hinhDaiDien">Màu</label>
        <div class="file-loading">
            <input id="m_hinhDaiDien" type="file" name="m_hinhDaiDien">
        </div>
    </div>  
    <div class="form-group">
        <label for="m_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="m_taoMoi" name="m_taoMoi" placeholder="Ngay" value="{{ $mau->m_taoMoi}}">
    </div>
    <div class="form-group">
        <label for="m_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="m_capNhat" name="m_capNhat" placeholder="Ngay" value="{{ $mau->m_capNhat }}">
    </div>
    <label for="m_taoMoi">Trạng thái</label>
    <select name="m_trangThai">
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

<script>
    $(document).ready(function() {
        $("#m_hinhDaiDien").fileinput({
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
