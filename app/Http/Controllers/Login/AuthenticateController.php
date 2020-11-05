<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function Authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            dd(123);
        }
        else{
            dd('saiii');
        }
    }
}
