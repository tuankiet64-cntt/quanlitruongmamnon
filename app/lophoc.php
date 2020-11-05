<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lophoc extends Model
{
    protected $table = 'lophoc';
    public function hocsinh()
    {
        return $this->hasMany('App\hocsinh','malophoc','id');
    }
}
