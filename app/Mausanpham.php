<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mausanpham extends Model
{
    public    $timestamps   = false;
    protected $table        = 'mausanpham';
    protected $fillable     = ['msp_soLuong'];
    protected $guarded      = ['sp_ma', 'm_ma'];
    protected $primaryKey   = ['sp_ma', 'm_ma'];
    public    $incrementing = false;
}
