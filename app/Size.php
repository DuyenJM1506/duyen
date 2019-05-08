<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    const CREATED_AT = 's_taoMoi';
    const UPDATED_AT = 's_capNhat';

    protected $table = 'size';
    protected $fillable= ['s_ten', 's_taoMoi', 's_capNhat', 's_trangThai'];
    protected $guarded = ['s_ma'];
    protected $primaryKey = 's_ma';
    protected $dates = ['s_taoMoi', 's_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function chitietdonhang()
    {
    	return $this->hasMany('App\Chitietdonhang', 's_ma', 's_ma');
    }
    public function sizesp()
    {
        return $this->belongsTo('App\Size_Sanpham', 's_ma', 's_ma');
    }
}
