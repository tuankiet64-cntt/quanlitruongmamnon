<?php

namespace App\Http\Controllers\Quanlichamcong;

use App\checkin;
use App\giaovien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChamcongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav = 'quanlichamcong';
        return view('app.quanlichamcong.index', compact('active_nav'));
    }

    public function getdata(Request $request)
    {
        $month = $request->get('month');
        $data = giaovien::with(['chamcong' => function ($query) use ($month) {
            $query->whereMonth('checkin.created_at', '=', $month);
        }])->get()->toArray();
//        $array_search=array_search('4', array_column($data[0]['chamcong'], 'id'));
//        dd($data[0]['chamcong']);
        return DataTables::of($data)
            ->addColumn('songaylam', function ($row) {
                $ngaylam = 0;
                $data = $row['chamcong'];
                if ($row['chamcong'] != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        if ($data[$i]['trangthai'] == 1) {
                            $ngaylam++;
                        }
                    }
                    return '<label class="text-center">' . $ngaylam . ' Ngày</label>';
                } else {
                    return '<label class="text-center">Giáo viên chưa điểm danh</label>';
                }
            })
            ->addColumn('songaynghi', function ($row) {
                $ngaylam = 0;
                $data = $row['chamcong'];
                if ($row['chamcong'] != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        if ($data[$i]['trangthai'] == 0) {
                            $ngaylam++;
                        }
                    }
                    return '<label class="text-center">' . $ngaylam . ' Ngày</label>';
                } else {
                    return '<label class="text-center">Giáo viên chưa điểm danh</label>';
                }
            })
//            ->addColumn('thangapdung', function ($row) {
//                return '<label class="text-center">' . date("m-Y", strtotime($row['thangapdung'])) . '</label>';
//            })
//
//            ->addColumn('loaiphi', function ($row) {
//                if($row['loaiphi']==1){
//                    return '<label class="text-center" data-value="1">Phí ngày</label>';
//                }
//                else if($row['loaiphi']==2){
//                    return '<label class="text-center" data-value="2">Phí tháng</label>';
//                }
//            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalCreate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'songaylam', 'songaynghi'])
            ->make();
    }

    public function getdatabyid(Request $request)
    {
        $month = $request->get('month');
        $id = $request->get('id');
        $data = giaovien::with(['chamcong' => function ($query) use ($month) {
            $query->whereMonth('checkin.created_at', '=', $month);
        }])
            ->where('giaovien.id','=',$id)
            ->first();
//        $data = checkin::where('idgv', '=', $id)->get()->toArray();
        $table= DataTables::of($data['chamcong'])
            ->addColumn('status', function ($row) {
                if ($row['trangthai'] == 1) {
                    return '<label class="text-center">Có</label>';
                } else {
                    return '<label class="text-center">Không</label>';
                }
            })
            ->addColumn('ngaylamviec', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
            })
//
//            ->addColumn('loaiphi', function ($row) {
//                if($row['loaiphi']==1){
//                    return '<label class="text-center" data-value="1">Phí ngày</label>';
//                }
//                else if($row['loaiphi']==2){
//                    return '<label class="text-center" data-value="2">Phí tháng</label>';
//                }
//            })
            ->addColumn('action', function ($row) {
                if ($row['trangthai'] == 1) {
                    $button = '<button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light ml-1 val-'.$row['id'].'"  title="Có" onclick="changeStatus(0,'.$row['id'].')"><span class="icofont icofont-ui-close"></span></button>';
                } else if($row['trangthai'] == 0) {
                    $button = '<button type="button" class="tabledit-edit-button btn btn-success waves-effect waves-light ml-1 val-'.$row['id'].'" title="Không" onclick="changeStatus(1,'.$row['id'].')"><span class="icofont icofont-ui-check"></span></button>';
                }
                return '<div class="btn-group btn-group-sm">
                            ' . $button . '
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status', 'ngaylamviec'])
            ->make();
        $res=[$data,$table];
        return $res;
    }
    public function insert(Request $request){
        $id=$request->get('id');
        $status=$request->get('status');
        $date=$request->get('date');
        $currentdate=date('d-m-Y');
        if($date>$currentdate){
            return 'date';
        }
        $formatdate=date("Y-m-d", strtotime($date));
        $check=checkin::whereDate('created_at','=',$formatdate)->get()->toArray();
        if($check!=null){
            return 'dd';
        }
        $new= new checkin;
        $new->idgv=$id;
        $new->trangthai=$status;
        $new->created_at=$date;
        if($new->save()){
            return 1;
        }else{
            return 0;
        }

    }
    public function updatestatus(Request $request){
        $id=$request->get('id');
        $status=$request->get('status');
        $update=checkin::where('id','=',$id)->first();
        $update->trangthai=$status;
        if($update->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
