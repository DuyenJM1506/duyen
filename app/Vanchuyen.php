<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanchuyen extends Model
{
    const     CREATED_AT    = 'vc_taoMoi';
    const     UPDATED_AT    = 'vc_capNhat';
    protected $table        = 'vanchuyen';
    protected $fillable     = ['vc_ma', 'vc_ten','vc_chiPhi','v_trangThai'];
    protected $guarded      = ['vc_ma'];
     protected $dates        = ['vc_taoMoi', 'vc_capNhat']; // Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';
    protected $primaryKey   = 'vc_ma';

     public function donhang()
    {
        return $this->hasMany('App\Donhang', 'vc_ma', 'vc_ma');
    }
}
