<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    const CREATED_AT = 'sp_taoMoi';
    const UPDATED_AT = 'sp_capNhat';

    protected $table = 'sanpham';
    protected $fillable= ['sp_ten', 'sp_taoMoi', 'sp_capNhat', 'sp_giaGoc',
                           'sp_giaBan', 'sp_moTa', 'sp_soluongBanDau', 'sp_soluongHienTai',
                           'l_ma', 'm_ma', 'xx_ma', 'km_ma'];
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
    public function xuatxus()
    {
        return $this->belongsTo('App\Xuatxu', 'xx_ma', 'xx_ma');
    }
    public function maus()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');
    }
    public function khuyenmai()
    {
        return $this->belongsTo('App\Khuyenmai', 'km_ma', 'km_ma');
    }
    public function sizesp()
    {
        return $this->belongsTo('App\Size_Sanpham', 's_ma', 's_ma');
    }
}
