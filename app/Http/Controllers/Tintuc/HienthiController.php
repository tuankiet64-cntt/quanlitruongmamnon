<?php

namespace App\Http\Controllers\Tintuc;

use App\Http\Controllers\Controller;
use App\tintuc;
use Illuminate\Http\Request;

class HienthiController extends Controller
{
    public function index()
    {
        return view('website.tintuc.index');
    }
    public function getdata(){
        $data=tintuc::orderBy('id', 'DESC')->get();
        $phantrang=[];
        $soluongtoida=ceil(count($data)/4);
        $phantrang[0]=' <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous" id="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>';
        for($i=1;$i<=$soluongtoida;$i++){
            $phantrang[$i]='<li class="page-item"><a class="page-link" href="javascript:void(0)" id="pani" value="'.$i.'">'.$i.'</a></li>';
        }
        $phantrang[$soluongtoida+1]=' <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Next" id="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>';
        $res=[$data,implode('',$phantrang),$soluongtoida];
        return $res;
    }

    public function viewDetail(Request $request){
        $id=$request->get('id');
        $data=tintuc::where('id','=',$id)->first()->toArray();
        return view('website.tintuc.detail',compact('data'));
    }
}
