<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'model';
    protected $fillabled = ['md_ma', 'md_canNang', 'md_chieuCao', 'gt_ten', 's_ma', 'trangthai'];
    protected $guarded = ['md_ma'];
    protected $primaryKey = 'md_ma';

    public function sizesanpham()
    {
        return $this->belongsTo('App\Size', 's_ma', 's_ma');
    }
    public function gioitinh()
    {
        return $this->belongsTo('App\Gioitinh', 'gt_ten', 'gt_ten');
    }
}
