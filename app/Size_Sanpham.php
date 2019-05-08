<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_Sanpham extends Model
{
    protected $table = 'size_sanpham';
    protected $fillable= ['s_ma', 'sp_ma', 'ssp_soLuong'];
    protected $guarded = ['sst'];
    protected $primaryKey = 'sst';

    public function size()
    {
    	return $this->hasMany('App\Size', 's_ma', 's_ma');
    }
    public function sanpham()
    {
    	return $this->hasMany('App\Sanpham', 'sp_ma', 'sp_ma');
    }
}
