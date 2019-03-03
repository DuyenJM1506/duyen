<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model
{
    const     CREATED_AT    = 'tt_taoMoi';
    const     UPDATED_AT    = 'tt_capNhat';
     protected $table        = 'thanhtoan';
    protected $fillable     = ['tt_ma', 'tt_ten','tt_trangThai'];
    protected $guarded      = ['tt_ma'];
    protected $dates        = ['tt_taoMoi', 'tt_capNhat']; // Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';
    protected $primaryKey   = 'tt_ma';

     public function donhang()
    {
        return $this->hasMany('App\Donhang', 'tt_ma', 'tt_ma');
    }
}
