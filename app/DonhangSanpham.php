<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonhangSanpham extends Model
{
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';

    protected $table        = 'donhang';
    protected $fillable     = ['kh_ma', 'dh_tenKhachHang', 'dh_email','dh_diaChi','dh_daThanhToan', 'dh_tongCong','dh_dienThoai', 'dh_trangThai', 
    'vc_ma', 'tt_ma','dh_taoMoi','dh_capNhat' , 'dh_ngayXuLy' , 'dh_ngayGiaoHang', 'nv_xuLy' , 'nv_giaoHang'];
    protected $guarded      = ['dh_ma'];

    protected $primaryKey   = 'dh_ma'; 

    protected $dates        = ['dh_taoMoi', 'dh_capNhat']; // Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';
     public function dhct()
    {
        return $this->hasMany('App\Chitietdonhang', 'dh_ma', 'dh_ma');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\User', 'kh_ma', 'id');
    }
    public function vanchuyen()
    {
        return $this->belongsTo('App\Vanchuyen', 'vc_ma', 'vc_ma');
    }
    public function tt()
    {
        return $this->belongsTo('App\Thanhtoan', 'tt_ma', 'tt_ma');
    }
   
}
