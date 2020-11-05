<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diemdanh extends Model
{
    protected $table = 'diemdanh';
    public function hocsinh()
    {
        return $this->belongsTo('App\hocsinh', 'idhs', 'id');
    }
}
