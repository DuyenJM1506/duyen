<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    const     CREATED_AT    = 'km_taoMoi';
    const     UPDATED_AT    = 'km_capNhat';
    protected $table        = 'khuyenmai';
    protected $fillable     = ['km_ma', 'km_ten','km_noiDung', 'km_ngayBatDau', 'km_ngayKetThuc', 'km_giatri',
                                'nv_nguoiLap', 'km_taoMoi', 'km_capNhat', 'km_hinhDaiDien','km_trangThai'];
    protected $guarded      = ['km_ma'];
    protected $dates        = ['km_taoMoi', 'km_capNhat']; 
    protected $dateFormat   = 'Y-m-d H:i:s';
    protected $primaryKey   = 'km_ma';

    public function nguoilapkm()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_nguoiLap', 'nv_ma');
    }
}

