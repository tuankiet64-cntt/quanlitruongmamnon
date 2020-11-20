<?php

namespace App\Http\Controllers\User;

use App\giaovien;
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
            $data['idgioitinh']='1';
        }
        else{
            $data['gioitinh']='Nữ';
            $data['idgioitinh']='0';

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
    function update(Request $request){
        $id=$request->get('id');
        $ten=$request->get('ten');
        $gioitinh=$request->get('gioitinh');
        $ngaysinh=$request->get('ngaysinh');
        $cmnd=$request->get('cmnd');
        $hokhau=$request->get('hokhau');
        $diachi=$request->get('diachi');
        $sdt=$request->get('sdt');
        $dantoc=$request->get('dantoc');
        $tongiao=$request->get('tongiao');
        $update=giaovien::where('mataikhoan','=',$id)->first();
        $update->hovaten=$ten;
        $update->gioitinh=$gioitinh;
        $update->ngaysinh=date("Y-m-d", strtotime($ngaysinh));
        $update->cmnd=$cmnd;
        $update->sdt=$sdt;
        $update->hokhau=$hokhau;
        $update->diachi=$diachi;
        $update->dantoc=$dantoc;
        $update->tongiao=$tongiao;
        if($update->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
