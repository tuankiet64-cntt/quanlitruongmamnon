<?php

namespace App\Http\Controllers;

use App\checkin;
use App\giaovien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = new \DateTime();
        $checkin=0;
        $id=Auth::user()->id;
        $idgv=giaovien::where('mataikhoan','=',$id)
            ->select('id')
            ->first();
        $month = date('m');
        $currentday = $now->format('Y-m-d');
        $data=checkin::where('idgv','=',$idgv['id'])
            ->where('created_at', '>=', $currentday)->first();
        $total=checkin::where('idgv','=',$idgv['id'])
            ->whereMonth('created_at','=',$month)->count();
        $time=date("h:i:s", strtotime($data['created_at']));
        if($data!=null){
            $checkin=1;
        }
        $active_nav='';
        return view('home',compact('active_nav','checkin','time','total'));
    }
}
