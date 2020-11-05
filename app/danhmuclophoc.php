<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuclophoc extends Model
{
    protected $table = 'danhmuclop';
    public function lophoc()
    {
        return $this->hasMany('App\lophoc');
    }
}
