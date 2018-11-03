<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    public $timestamps = false;
    protected $table = 'hinhanh';
    protected $fillable= ['ha_ten'];
    protected $guarded = ['ha_stt' , 'sp_ma'];
    protected $primaryKey = ['sp_ma' , 'ha_stt'];
    public $incrementing = false;

    public function hinhsanphams()
    {
        return $this->hasMany('App\Sanpham', 'sp_ma', 'sp_ma');
    }
}
