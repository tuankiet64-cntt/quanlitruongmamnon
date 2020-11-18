<?php

namespace App\Http\Controllers\Lichday;

use App\giaovien;
use App\Http\Controllers\Controller;
use App\lichday;
use App\lophoc;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LichdayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.lichday.index');
    }

    public function getData()
    {
        $data = lophoc::with('lichday','danhmuc')
            ->where('lophoc.id', '<>', 1)
            ->where('lophoc.id', '<>', 28)
//            ->join('danhmuclop as dm','dm.id','lophoc.madanhmuclop')
//            ->leftjoin('lichday as ld','ld.idlophoc','lophoc.id')
//            ->groupBy('lophoc.id')
//            ->select('tenlop','loptuoi','lophoc.id')
            ->get()->toArray();
        return DataTables::of($data)
            ->addColumn('lichday', function ($row) {
                if(count($row['lichday'])!=null){
                    return '<label class="text-center">'.count($row['lichday']).'</label>';
                }else{
                    return '<label class="text-center">Chưa Có lịch dạy</label>';
                }

            })
//            ->addColumn('giaovien', function ($row) {
//                $data=$row['lichday'];
//                $gv=[];
//                if(count($data)!=null){
//                    for($i=0;$i<count($data);$i++){
//                       $gv[$i]=giaovien::where('id','=',$data[$i]['idgv'])
//                           ->select('id')
//                           ->first();
//                    }
//                    return '<label class="text-center">'.count($row['lichday']).'</label>';
//                }else{
//                    return '<label class="text-center">Chưa Có lịch dạy</label>';
//                }
//
//            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="getdatabyid(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-chevron-up"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action','lichday'])
            ->make();
    }
    public function getdatabyid(Request $request){
        $id=$request->get('id');
        $data=lichday::where('idlophoc','=',$id)
            ->join('giaovien as gv','gv.id','idgv')
            ->select('ngayday','hovaten','lichday.id')
            ->get()->toArray();
        return DataTables::of($data)
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
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Createlich(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action','lichday'])
            ->make();
    }
    public function getdatagvbyid(Request $request){
        $id = $request->get('id');
        $data = lichday::where('id', '=', $id)->first();
        if ($data == null) {
            return 0;
        }
        $data['ngayday'] = json_decode($data['ngayday']);
        return $data;
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
    public function updatelichday(Request $request)
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
}
