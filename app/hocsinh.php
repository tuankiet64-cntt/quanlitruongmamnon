<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hocsinh extends Model
{
    protected $table = 'hocsinh';
    public function lophoc()
    {
        return $this->belongsTo('App\lophoc','malophoc','id');
    }
    public function phuhuynh()
    {
        return $this->hasMany('App\phuhuynh','mahs','id');
    }
}
