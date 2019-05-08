@extends('backend.layouts.index')

@section('title')
    Trang quản trị admin
@endsection

@section('main-content')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                    <h3 class="panel-title">Tuần làm việc từ &nbsp; &nbsp;
                            <b>{{date_format($ngaydautuan,"Y-m-d")}}</b> &nbsp; &nbsp; đến &nbsp; &nbsp; 
                            <b id="demo"></b></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-tags"></i></span>
                                    <p>
                                        <span class="number">{{$slsp}}</span>
                                        <span class="title">Tổng sản phẩm</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                    <p>
                                        <span class="number">{{$sldh}}</span>
                                        <span class="title">Đơn hàng</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-dollar"></i></span>
                                    <p>
                                        <span class="number">{{number_format($doanhthu/1000000)}} triệu</span>
                                        <span class="title">Doanh thu</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <p>
                                        <span class="number">{{$sltv}}</span>
                                        <span class="title">Thành viên mới</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        </div>
                    </div>
                </div>
                <!-- END OVERVIEW -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- RECENT PURCHASES -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Đơn hàng mới</h3>
                              
                            </div>
                            <div class="panel-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng cộng (đ)</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dhm as $dh)
                                        <tr>
                                            <td><a href="{{ route('themdonhang',$dh->dh_ma)}}">{{$dh->dh_ma}}</a></td>
                                            <td>{{$dh->dh_tenKhachHang}}</td>
                                            <td>{{number_format($dh->dh_tongcong)}} </td>
                                            <td>{{$dh->dh_thoiGianDatHang}}</td>
                                            <td>
                                                @if($dh->dh_trangThai == 1)
                                                    <span class="label label-primary">Mới</span>
                                                @elseif($dh->dh_trangThai == 2)
                                                    <span class="label label-warning">Đang xử lý</span>
                                                @elseif($dh->dh_trangThai == 3)
                                                    <span class="label label-warning">Đang vận chuyển</span>
                                                @elseif($dh->dh_trangThai == 4)
                                                    <span class="label label-success">Hoàn tất</span>
                                                @elseif($dh->dh_trangThai == 5)
                                                    <span class="label label-danger">Hủy</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Đơn hàng mới nhất</span>
                                    </div>
                                    <div class="col-md-6 text-right"><a href="{{ route('donhang_index') }}" class="btn btn-primary">Xem tất cả
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <!-- END RECENT PURCHASES -->
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <!-- TODO LIST -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sản phẩm vừa thêm</h3>
                               
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Loại</th>
                                        <th>Xuất xứ</th>
                                        <th>Ngày thêm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($spm as $sp)
                                        <tr>
                                            <td><a href="{{ route('sanpham_edit',$sp->sp_ma)}}">{{$sp->sp_ma}}</a></td>
                                            <td>
                                                <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" width="10px" height="10px" />
                                            </td>
                                            <td><a href="{{ route('sanpham_edit',$sp->sp_ma)}}">{{str_limit($sp->sp_ten,10)}}</a></td>
                                            <td>{{$sp->loaisanpham->l_ten}} </td>
                                            <td>{{$sp->xuatxus->xx_ten}}</td>
                                            <td>
                                                {{ date_format($sp->sp_taoMoi,'Y-m-d') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Sản phẩm mới nhất</span>
                                    </div>
                                    <div class="col-md-6 text-right"><a href="{{ route('sanpham_index') }}" class="btn btn-primary">Xem tất cả
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <!-- END TODO LIST -->
                    </div>
                    <div class="col-md-5">
                        <!-- TIMELINE -->

                        <!-- END TIMELINE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
@endsection
@section('custom-scripts')
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
            <?php $result = $ngaydautuan->format('Y.m.d');?>
        var new_date = moment("<?php echo $result; ?>", "YYYY-MM-DD").add(6, 'days').format('YYYY-MM-DD');
        document.getElementById("demo").innerHTML = new_date;
        
</script>
@endsection