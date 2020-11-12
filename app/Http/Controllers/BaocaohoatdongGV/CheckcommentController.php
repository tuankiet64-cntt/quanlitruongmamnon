<?php

namespace App\Http\Controllers\BaocaohoatdongGV;

use App\giaovien;
use App\hoatdong;
use App\Http\Controllers\Controller;
use App\lichday;
use App\lophoc;
use App\report;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CheckcommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.baocaohoatdongGV.checkcomment.index');
    }

    public function getdata(Request $request)
    {
        $idtk = $request->get('id');
//        $now = new \DateTime();
//        $currentday=date('Y-m-d');
//        $day = $now->format('N');
        $idgv = giaovien::where('mataikhoan', '=', $idtk)
            ->select('id')
            ->first();
        $report = report::where('idgv', '=', $idgv['id'])
            ->join('hoatdong as hd','hd.id','idhd')
            ->where('nhanxet','<>','')
            ->select('report.status','report.id','tenhoatdong','report.created_at')
            ->get();
        return DataTables::of($report)
            ->addColumn('status', function ($row) {
                if($row['status']==1){
                    return '<label class="text-center">Đã dạy</label>';
                }
                else{
                    return '<label class="text-center">Chưa dạy</label>';
                }
            })
            ->addColumn('created', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
            })

            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalInfo(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-eye"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['status','action','created'])
            ->make();
    }
}
