<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xuatxu extends Model
{
    const CREATED_AT = 'xx_taoMoi';
    const UPDATED_AT = 'xx_capNhat';

    protected $table = 'xuatxu';
    protected $fillable= ['xx_ten', 'xx_taoMoi', 'xx_capNhat', 'xx_trangThai'];
    protected $guarded = ['xx_ma'];
    protected $primaryKey = 'xx_ma';
    protected $dates = ['xx_taoMoi', 'xx_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function xuatxus()
    {
        return $this->hasMany('App\Sanpham', 'xx_ma', 'xx_ma');
    }
}
