<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    const CREATED_AT = 'pn_taoMoi';
    const UPDATED_AT = 'pn_capNhat';

    protected $table = 'phieunhap';
    protected $fillable= ['pn_nguoiGiao','pn_hoaDon', 'pn_ngayXuatHoaDon', 'pn_ghiChu',
                        'pn_ngayLapPhieu', 'pn_ngayXacNhan', 'pn_ngayNhapKho',
                        'pn_taoMoi', 'pn_capNhat', 'pn_trangThai'];
    protected $guarded = ['pn_ma'];
    protected $primaryKey = 'pn_ma';
    protected $dates = ['pn_taoMoi', 'pn_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function nguoilapphieu()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_nguoiLapPhieu', 'nv_ma');
    }
    public function ketoan()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_keToan', 'nv_ma');
    }
    public function thukho()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_thuKho', 'nv_ma');
    }
    public function nhacungcap()
    {
        return $this->belongsTo('App\Nhacungcap', 'ncc_ma', 'ncc_ma');
    }

}
