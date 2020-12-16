<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recordluong extends Model
{
    protected $table = 'recordluong';
    public function luonggv(){
        return $this->hasOne('App\giaovien','id','idgv');
    }
}
