<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='';
        return view('app.user.password.index',compact('active_nav'));
    }
    public function update(Request $request){
        $email=$request->get('email');
        $newpass=$request->get('newpass');
        $oldpass=$request->get('oldpass');
        $data=['email'=>$email,'password'=>$oldpass];
        if(Auth::attempt($data)){
            $changepass=User::where('email','=',$email)->first();
            $changepass->password=Hash::make($newpass);
            if($changepass->save()){
                return 1;
            }else{
                return 0;
            }
        }else{
           return 2;
        }
    }
}
