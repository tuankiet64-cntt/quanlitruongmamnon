<?php

namespace App\Http\Controllers\Quanlixeplop;

use App\diemdanh;
use App\Http\Controllers\Controller;
use App\lichday;
use Illuminate\Http\Request;
use App\giaovien;
use Yajra\DataTables\DataTables;

class QuanlixeplopGVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.quanlixeplop.giaovien.index');
    }

    public function getdatagv()
    {
        $data = giaovien::where('status', '=', '1')
            ->leftJoin('lichday as ld','ld.idgv','giaovien.id')
            ->leftJoin('lophoc as lh','lh.id','=','ld.idlophoc')
            ->select('*','giaovien.id')->get();
//        dd(json_decode($data));
        return DataTables::of($data)
            ->addColumn('gioitinh', function ($row) {
                if ($row['gioitinh'] == 1) {
                    return '<label class="text-primary">Nam</label>';
                } else {
                    return '<label class="text-primary">Nữ</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                list($year, $month, $day) = explode("-", $row['ngaysinh']);

                $year_diff = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff = date("d") - $day;

                // if we are any month before the birthdate: year - 1
                // OR if we are in the month of birth but on a day
                // before the actual birth day: year - 1
                if (($month_diff < 0) || ($month_diff === 0 && $day_diff < 0))
                    $year_diff--;
                return '<label class="text-center">' . $year_diff . ' tuổi </label>';
            })
            ->addColumn('lichday', function ($row) {
                $data=json_decode($row['ngayday']);
                if ($data!= null) {
                    for($i=0;$i<count($data);$i++){
                        $data[$i]='Thứ'.' '.($data[$i]+1);
                    }
                    return '<label class="text-primary">'.implode(',',$data).'</label>';
                }  else {
                    return '<label class="text-danger">Chưa có lịch dạy</label>';
                }
            })
            ->addColumn('lophoc', function ($row) {
                if($row['tenlop']!=null){
                    return '<label class="text-danger">'.$row['tenlop'].'</label>';
                }else{
                    return '<label class="text-danger">Chưa có lớp</label>';
                }

            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Createlich(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-chevron-right"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh','lichday','lophoc'])
            ->make();
    }

    public function getlichday(Request $request)
    {
        $id = $request->get('id');
        $data = lichday::where('idgv', '=', $id)->first();
        if ($data == null) {
            return 0;
        }
        $data['ngayday'] = json_decode($data['ngayday']);
        return $data;
    }

    public function createlichday(Request $request)
    {
        $data = $request->get('data');
        $idlophoc = $request->get('idlophoc');
        $idlichhoc = $request->get('idlichhoc');
        $idgv = $request->get('idgv');
//        dd($idlichhoc);
//        dd($idlichhoc,$idlophoc,$idgv);
        if ($idlichhoc == null) {
            $lichday = new lichday;
            $lichday->idgv = $idgv;
            $lichday->idlophoc = $idlophoc;
            $lichday->ngayday = json_encode($data);
        } else {
            $lichday = lichday::where('id', '=', $idlichhoc)->first();
            $lichday->ngayday = json_encode($data);
        }
        if ($lichday->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checklichday(Request $request)
    {
        $idlophoc = $request->get('idlophoc');
        $daycheck = $request->get('day');
        $data = lichday::where('idlophoc', '=', $idlophoc)->get();
//        $check = '';
        for ($i = 0; $i < count($data); $i++)
        {
            $arrayngayday=json_decode($data[$i]['ngayday']);
            for ($y = 0; $y < count($arrayngayday); $y++)
            {
                if ($arrayngayday[$y]==$daycheck){
                    $check=1;
                    $data=[$check,$data[$i]['idgv']];
                    return $data;
                }
            }
        }
    }
    public function checkday(Request $request){
        $id=$request->get('id');
        $data=lichday::where('idlophoc','=',$id)
            ->select('ngayday')
            ->get();
        return $data;
    }
    public function checklop(Request $request){
        $idlophoc=$request->get('idlophoc');
        $idgv=$request->get('idgv');
        $data=lichday::where('idgv','=',$idgv)
            ->where('idlophoc','=',$idlophoc)->get();
        if($data['ngayday']==null){}
        dd(json_decode($data));
    }
    function checkdiemdanh(Request $request){
        $idlichhoc=$request->get('idlichhoc');
        if($idlichhoc!=null){
            $idloptruocdo=$request->get('lophoctruoc');
            $idgv=$request->get('idgv');
            $data=diemdanh::where('id_lichday','=',$idlichhoc)->get();
            if($data!=null){
                $lichday=lichday::where('idlophoc','=',$idloptruocdo)
                    ->where('idgv','<>',$idgv)
                    ->leftjoin('giaovien as gv','gv.id','lichday.idgv')->get();
                $res=[1,json_decode($lichday)];
                return $res;
            }else{
                return 0;
            }
        }
    }
    function chuyenlop(Request $request){
        $idgvtt=$request->get('idgvtt');
        $idlichhoc=$request->get('idlichhoc');
        $idgv=$request->get('idgv');
        $lichdaytt=lichday::where('idgv','=',$idgvtt)->first();
        $idlichdaytt=$lichdaytt['id'];
        $lichdayold=lichday::where('idgv','=',$idgv)->first();
        $lichday1=json_decode($lichdayold['ngayday']);
        $lichday2=json_decode($lichdaytt['ngayday']);
        $lichdayfinal=array_merge($lichday1,$lichday2);
        try {
            diemdanh::where('id_lichday','=',$idlichhoc)->update(['id_lichday'=>$idlichdaytt]);
            lichday::where('idgv','=',$idgvtt)->update(['ngayday'=>$lichdayfinal]);
            lichday::where('idgv','=',$idgv)->delete();
            return 1;
        }catch (Exception $exception){
            return $exception;
        }
    }

}
