<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichday extends Model
{
    protected $table = 'lichday';
    public function giaovien(){
        return $this->hasOne('App\giaovien','id','idgv');
    }
}
