<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\nknhaphoc;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(){
        return view('website.dangkynhaphoc');
    }
    public function create(Request $request){
        $tenhs=$request->get('tenhs');
        $ngaysinh=$request->get('ngaysinh');
        $newDate = date("Y-m-d", strtotime($ngaysinh));
        $gioitinh=$request->get('gioitinh');
        $hokhau=$request->get('hokhau');
        $diachi=$request->get('diachi');
        $suckhoe=$request->get('suckhoe');
        $tenph=$request->get('tenph');
        $sdtph=$request->get('sdtph');
        $mailph=$request->get('mailph');
        $hs=new nknhaphoc;
        $hs->tenhs=$tenhs;
        $hs->ngaysinh=$newDate;
        $hs->gioitinh=$gioitinh;
        $hs->hokhau=$hokhau;
        $hs->diachi=$diachi;
        $hs->suckhoehientai=$suckhoe;
        $hs->hovatenph=$tenph;
        $hs->sdtph=$sdtph;
        $hs->emailph=$mailph;
        $hs->trangthai=0;
        if($hs->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
