<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    const CREATED_AT = 'sp_taoMoi';
    const UPDATED_AT = 'sp_capNhat';

    protected $table = 'sanpham';
    protected $fillable= ['sp_ten', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai', 'sp_giaGoc',
                           'sp_giaBan', 'sp_danhGia', 'sp_thongTin', 'l_ma'];
    protected $guarded = ['sp_ma'];
    protected $primaryKey = 'sp_ma';
    protected $dates = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function loaisanpham()
    {
        return $this->belongsTo('App\Loai', 'l_ma', 'l_ma');
    }
    public function hinhanhs()
    {
        return $this->belongsTo('App\Hinhanh', 'sp_ma', 'sp_ma');
    }
}
