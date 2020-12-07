<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giaovien extends Model
{
    protected $table = 'giaovien';
    public function taikhoan()
    {
        return $this->hasOne('App\User','id','mataikhoan');
    }
    public function roles()
    {
        return $this->belongsToMany('App\chucvu','App\User','id','level','mataikhoan');
    }
    public function lichday(){
        return $this->hasOne('App\lichday','idgv','id');
    }
    public function chamcong(){
        return $this->hasMany('App\checkin','idgv','id');
    }
}

