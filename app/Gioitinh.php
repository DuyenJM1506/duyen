<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gioitinh extends Model
{
    protected $table = 'gioitinh_model';
    protected $fillabled = ['gt_ten'];
    protected $primarykey = ['gt_ten'];
}
