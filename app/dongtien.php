<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dongtien extends Model
{
    protected $table = 'dongtien';
    protected $casts= [
        'created_at' => 'datetime:d/m/Y',
        'update_at' => 'datetime:d/m/Y,',
    ];

}
