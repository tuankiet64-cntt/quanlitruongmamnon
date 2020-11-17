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
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="getdatabyid(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-chevron-up"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action','lichday'])
            ->make();
    }
}
