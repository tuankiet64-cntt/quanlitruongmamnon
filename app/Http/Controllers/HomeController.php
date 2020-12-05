<?php

namespace App\Http\Controllers;

use App\checkin;
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
        $month = date('m');
        $currentday = $now->format('Y-m-d');
        $data=checkin::where('idgv','=',$id)
            ->where('created_at', '>=', $currentday)->first();
        $total=checkin::where('idgv','=',$id)
            ->whereMonth('created_at','=',$month)->count();
        $time=date("h:i:s A", strtotime($data['created_at']));
        if($data!=null){
            $checkin=1;
        }
        $active_nav='';
        return view('home',compact('active_nav','checkin','time','total'));
    }
}
