<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.user.index');
    }
    public function getdata(Request $request){
        $id=$request->get('id');
        $data=User::where('users.id','=',$id)
            ->join('giaovien as gv','gv.mataikhoan','users.id')
            ->join('lichday as ld','ld.idgv','gv.id')
            ->join('chucvu as cv','cv.id','users.level')
            ->join('lophoc as lh','lh.id','ld.idlophoc')
            ->first()->toArray();
        $data['ngaysinh']=date("d-m-Y", strtotime($data['ngaysinh']));
        $data['ngayvaotruong']=date("d-m-Y", strtotime($data['ngayvaotruong']));
        if($data['gioitinh']==1){
            $data['gioitinh']='Nam';
        }
        else{
            $data['gioitinh']='Nữ';

        }
        $ngayday=[];
        $ngaydaydeco=json_decode($data['ngayday']);
        if ($ngaydaydeco!= null) {
            for($i=0;$i<count($ngaydaydeco);$i++){
                $ngayday[$i]='Thứ'.' '.($ngaydaydeco[$i]+1);
            }
            $data['ngayday']=implode(',',$ngayday);
        }  else {
            $data['ngayday']='Chưa có lịch dạy';
        }
       return $data;
    }
}
