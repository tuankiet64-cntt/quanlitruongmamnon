<?php

namespace App\Http\Controllers\Checkin;

use App\checkin;
use App\giaovien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert(Request $request){
        $idacc=$request->get('idacc');
        $idgv=giaovien::where('mataikhoan','=',$idacc)
            ->select('id')
            ->first();
        $new=new checkin;
        $new->idgv=$idgv['id'];
        $new->trangthai=1;
        if($new->save()){
            return 1;
        }
        return 0;
    }

}
