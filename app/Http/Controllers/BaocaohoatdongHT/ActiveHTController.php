<?php

namespace App\Http\Controllers\BaocaohoatdongHT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActiveHTController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.baocaohoatdongHT.index');
    }
}
