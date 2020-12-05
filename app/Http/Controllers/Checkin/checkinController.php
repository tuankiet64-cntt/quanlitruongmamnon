<?php

namespace App\Http\Controllers\Checkin;

use App\checkin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert(Request $request){
        $idgv=$request->get('idgv');
        $new=new checkin;
        $new->idgv=$idgv;
        if($new->save()){
            return 1;
        }
        return 0;
    }

}
