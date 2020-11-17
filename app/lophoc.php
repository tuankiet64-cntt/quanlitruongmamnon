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
    public function lichday()
    {
        return $this->hasMany('App\lichday','idlophoc','id');
    }
    public function danhmuc()
    {
        return $this->belongsTo('App\danhmuclophoc','madanhmuclop','id');
    }
}
