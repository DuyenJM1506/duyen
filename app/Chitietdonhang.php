<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    protected $table        = 'chitietdonhang';
    protected $fillable     = ['dh_ma', 'sp_ma','spdh_soLuong', 'spdh_donGia', 's_ma'];
    protected $guarded      = ['spdh_ma'];
    protected $primaryKey   = 'spdh_ma'; 
    protected $dates        = ['created_at', 'updated_at']; // Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhang()
    {
    	return $this->belongsTo('App\Donhang', 'dh_ma', 'dh_ma');
    }
    public function sanpham()
    {
    	return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
    public function size()
    {
    	return $this->belongsTo('App\Size', 's_ma', 's_ma');
    }
}
