@extends('backend.layouts.index')

@section('title')
    Hieu chinh don hang
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

<h2>Hiệu chỉnh đơn hàng</h2>
<form method="post" action="{{ route('danhsachdonhang.update', ['id' => $dh->dh_ma]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT"/>

    {{ csrf_field() }}

<div class="form-group">
    <label for="tt_ten">Nhập tên thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" value="{{ $tt->tt_ten }}" placeholder="Nhap ten thanh toan">
</div>  
<div class="form-group">
    <label for="tt_taoMoi">Nhap ngay tao moi</label>
        <input type="text" class="form-control" id="tt_taoMoi" name="tt_taoMoi" value="{{ $tt->tt_taoMoi }}" placeholder="Nhap ngay tao moi">
</div>
<div class="form-group">
    <label for="l_capNhat">Nhap ngay cap nhat</label>
        <input type="text" class="form-control" id="l_capNhat" name="l_capNhat" value="{{ $loai->l_capNhat }}" placeholder="Nhap ngay cap nhat">
</div>
<div class="form-group">
    <label for="tt_trangThai">Trang thai</label>
    <select name="tt_trangThai">
        <option value="1" {{ $tt->tt_trangThai == 1 ? "selected" : "" }}>Khoa</option>
        <option value="2" {{ $tt->tt_trangThai == 2 ? "selected" : "" }}>Kha dung</option>
    </select>
        
</div>
<button type="submit" class="btn btn-primary">Submit</button>     
</form>                      
@endsection