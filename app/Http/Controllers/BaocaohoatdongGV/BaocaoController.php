<?php

namespace App\Http\Controllers\BaocaohoatdongGV;

use App\giaovien;
use App\hoatdong;
use App\Http\Controllers\Controller;
use App\lichday;
use App\lophoc;
use App\report;
use App\User;
use Illuminate\Http\Request;

class BaocaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.baocaohoatdongGV.index');
    }
    public function getdata(Request $request){
        $idtk=$request->get('id');
        $now = new \DateTime();
        $currentday=date('Y-m-d');
        $day = $now->format('N');
        $idgv=giaovien::where('mataikhoan','=',$idtk)
            ->select('id')
            ->first();
        $idlop=lichday::where('idgv','=',$idgv['id'])
            ->first();
        $loptuoi=lophoc::where('lophoc.id','=',$idlop['idlophoc'])
            ->first();
        $hoatdong=hoatdong::where('iddm','=',$loptuoi['madanhmuclop'])
            ->where('ngaygiangday','like','%'.$day.'%')
            ->where('ngayketthuc','>=',$currentday)
            ->get()
            ->toArray();
//        dd($hoatdong,$currentday);
        $data=[];
//        dd($hoatdong);
        if($hoatdong==[]){
            return '<div class="card"><h4 class="text-center">Hôm nay chưa sắp xếp môn học</h4></div>';
        }
        for($i=0;$i<count($hoatdong);$i++){
            $data[$i]='<div class="card">
                <div class="card-header d-flex justify-content-between">
                    <H4 class="d-flex flex-row">
                        <span class="sub-title">Báo cáo môn:</span>
                        <div class="m-l-2 d-flex flex-row" style="margin: -7px 14px;">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="'.$hoatdong[$i]['id'].'" data-id="" id="status" value="1">
                                        <i class="helper"></i>
                                        <span>Đã dạy</span>

                                    </label>
                                </div>
                            </div>
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="'.$hoatdong[$i]['id'].'" data-id="" id="status" value="0">
                                        <i class="helper"></i>
                                        <span>Chưa dạy</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </H4>
                    <h3 id="name-sb"><span>
                          '.$hoatdong[$i]['tenhoatdong'].'
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <H4 class="sub-title">Nội dung</H4>
                    <form>
            <textarea name="editor1" class="editor1" id="'.$hoatdong[$i]['id'].'" rows="10" cols="80">

            </textarea>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary float-right" title="Lưu lại" id="add-new-area" onclick="report( '.$hoatdong[$i]['id'].')"><i
                            class="fa"></i>Lưu lại
                    </button>
                </div>
            </div><script>

</script>';

        }
        $res=implode(',',$data);
//        dd($hoatdong,$res);
        return $res;
    }
    public function insert(Request $request){
        $idtk=$request->get('idtk');
        $idgv=giaovien::where('mataikhoan','=',$idtk)
            ->select('id')
            ->first();
        $idhd=$request->get('idhd');
        $data=$request->get('data');
        $status=$request->get('status');
        $currentday=date('Y-m-d');
        $check=report::where('idgv','=',$idgv['id'])
            ->where('idhd','=',$idhd)
            ->where('created_at','>=',$currentday)
            ->first();
        if($check!=null){
            $update=report::where('id','=',$check['id'])->first();
            $update->status=$status;
            $update->noidung=$data;
            if($update->save()){
                return 1;
            }else{
                return 0;
            }
        }else{
            $new=new report;
            $new->idgv=$idgv['id'];
            $new->idhd=$idhd;
            $new->status=$status;
            $new->noidung=$data;
            if($new->save()){
                return 1;
            }else{
                return 0;
            }
        }

    }
    public function getdatabyid(Request $request){
        $idtk=$request->get('idtk');
        $currentday=date('Y-m-d');
        $idgv=giaovien::where('mataikhoan','=',$idtk)
            ->select('id')
            ->first();
        $data=report::where('idgv','=',$idgv['id'])
            ->where('created_at','>=',$currentday)
            ->get()->toArray();
        return $data;
    }
}
