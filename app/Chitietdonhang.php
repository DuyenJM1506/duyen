<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    // const     CREATED_AT    = 'dhsp_taoMoi';
    // const     UPDATED_AT    = 'dhsp_capNhat';
    protected $table        = 'chitietdonhang';
    protected $fillable     = ['dh_ma', 'sp_ma','dhsp_soLuong', 'dhsp_donGia'];
    protected $guarded      = ['dhsp_stt'];
    protected $primaryKey   = 'dhsp_stt'; 
    //  protected $dates        = ['dhsp_taoMoi', 'dhsp_capNhat']; // Carbon
    // protected $dateFormat   = 'Y-m-d H:i:s';
    public function donhang()
    {
    	return $this->belongsTo('App\Donhang', 'dh_ma', 'dh_ma');
    }
    public function sanpham()
    {
    	return $this->belongsTo('App\Sanpham', 'sp_ma', 'sp_ma');
    }
}
