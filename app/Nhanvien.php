<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    const     CREATED_AT    = 'nv_taoMoi';
    const     UPDATED_AT    = 'nv_capNhat';
    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_id', 'nv_hoTen', 
                                'nv_gioiTinh', 'nv_email', 'nv_ngaySinh', 'nv_diaChi', 'nv_dienThoai', 
                                'nv_taoMoi', 'nv_capNhat', 'nv_trangThai'];
    protected $guarded      = ['nv_ma'];
    protected $primaryKey   = 'nv_ma';
    protected $dates        = ['nv_taoMoi', 'nv_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
