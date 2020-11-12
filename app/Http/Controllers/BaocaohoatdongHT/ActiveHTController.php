<?php

namespace App\Http\Controllers\BaocaohoatdongHT;

use App\hoatdong;
use App\Http\Controllers\Controller;
use App\report;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
    public function getdata(){
        $data=report::join('hoatdong as hd','hd.id','report.idhd')
            ->join('giaovien as gv','gv.id','report.idgv')
            ->select('report.status','report.id','tenhoatdong','hovaten','report.created_at')
            ->get();
        return DataTables::of($data)
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
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['status','action','created'])
            ->make();
    }
    public function getdatabyid(Request $request){
        $id=$request->get('id');
        $data=report::where('id','=',$id)->first();
        return $data;
    }
    public function update(Request $request){
        $id=$request->get('id');
        $nhanxet=$request->get('nhanxet');
        $update=report::where('id','=',$id)->first();
        $update->nhanxet=$nhanxet;
        if($update->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
