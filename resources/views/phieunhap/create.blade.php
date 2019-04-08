@extends('backend.layouts.index')

@section('title')
Thêm mới phiếu nhập
@endsection


@section('custom-css')
<!--Cac cssdanh rieng cho thu vien bootstrap-fileinput-->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" type="text/css">
@endsection

@section('main-content')
<h3>Thêm mới phiếu nhập</h3>
<form id="frmThemMoiPhieunhap" method="post" action="{{ route('danhsachphieunhap.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group ">
        <label for="pn_soHoaDon">Số hóa đơn</label>
            <input type="text" class="form-control" id="pn_soHoaDon" name="pn_soHoaDon" placeholder="HDxxx" value="{{ old('pn_soHoaDon') }}">
    </div>

    <div class="form-group">
        <label for="nv_nguoiLapPhieu">Người lập phiếu</label>
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
        <label for="nv_keToan">Kế toán</label>
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
        <label for="nv_thuKho">Thủ kho</label>
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
        <label for="pn_nguoiGiao">Người giao</label>
            <input type="text" class="form-control" id="pn_nguoiGiao" name="pn_nguoiGiao" placeholder="Ho ten nguoi giao" value="{{ old('pn_nguoiGiao') }}">
    </div>

    <div class="form-group">
        <label for="ncc_ten">Nhà cung cấp</label>
        <select name="ncc_ma">
            @foreach($danhsachnhacungcap as $ncc)
                @if(old('ncc_ma') == $ncc->ncc_ma)
                    <option value="{{ $ncc->ncc_ma }}" selected>{{ $ncc->ncc_ten }}</option>
                @else
                    <option value="{{ $ncc->ncc_ma }}">{{ $ncc->ncc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="pn_ghiChu">Ghi chú</label>
            <input type="text" class="form-control" id="pn_ghiChu" name="pn_ghiChu" placeholder="Ghi chu" value="{{ old('pn_ghiChu') }}">
    </div>

    <div class="form-group">
        <label for="pn_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
            <input type="text" class="form-control" id="pn_ngayXuatHoaDon" name="pn_ngayXuatHoaDon" placeholder="yyyy-mm-dd" value="{{ old('pn_ngayXuatHoaDon') }}">
    </div>

    <div class="form-group">
        <label for="pn_ngayLapPhieu">Ngày lập phiếu</label>
            <input type="text" class="form-control" id="pn_ngayLapPhieu" name="pn_ngayLapPhieu" placeholder="yyyy-mm-dd" value="{{ old('pn_ngayLapPhieu') }}">
    </div>

     <div class="form-group">
        <label for="pn_ngayXacNhan">Ngày xác nhận</label>
            <input type="text" class="form-control" id="pn_ngayXacNhan" name="pn_ngayXacNhan" placeholder="yyyy-mm-dd" value="{{ old('pn_ngayXacNhan') }}"> 
    </div>
    <div class="form-group">
        <label for="pn_ngayNhapKho">Ngày nhập kho</label>
            <input type="text" class="form-control" id="pn_ngayNhapKho" name="pn_ngayNhapKho" placeholder="yyyy-mm-dd" value="{{ old('pn_ngayNhapKho') }}"> 
    </div>

    <div class="form-group">
        <label for="pn_taoMoi">Ngày tạo mới</label>
            <input type="text" class="form-control" id="pn_taoMoi" name="pn_taoMoi" placeholder="yyyy-mm-dd" value="{{ old('pn_taoMoi') }}">
    </div>
    <div class="form-group">
        <label for="pn_capNhat">Ngày cập nhật</label>
            <input type="text" class="form-control" id="pn_capNhat" name="pn_capNhat" placeholder="yyyy-mm-dd" value="{{ old('pn_capNhat') }}">
    </div>
    <label for="pn_taoMoi">Trạng thái</label>
    <select name="pn_trangThai">
        <option value="1" {{ old('pn_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('pn_trangThai') == 1 ? "selected" : "" }}>Khả dụng</option>
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


