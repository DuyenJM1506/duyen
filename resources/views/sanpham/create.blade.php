@extends('backend.layouts.index')

@section('title')
Create new product
@endsection

@section('main-content')
<h1>Create new type of product</h1>
<form id="frmThemMoiLoaiSP" method="post" action="{{ route('danhsachloai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Nhập loại sản phẩm</label>
        <select name="l_ma">
            @foreach($danhsachloai as $loai)
            <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
            @endforeach
        </select>
    </div>

     <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" placeholder="Ma">
    </div>

     <div class="form-group">
        <label for="sp_giaGoc">Gía gốc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" placeholder="Ten">
    </div>

     <div class="form-group">
        <label for="sp_hinh">Hình đại diện</label>
        <input type="file" name="sp_hinh">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    @endsection
