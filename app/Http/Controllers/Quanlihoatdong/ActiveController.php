<?php

namespace App\Http\Controllers\Quanlihoatdong;

use App\danhmuclophoc;
use App\hoatdong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.quanlihoatdong.index');
    }

    public function getdata()
    {
        $data=hoatdong::join('danhmuclop as dm','dm.id','iddm')
            ->get()->toArray();
        return DataTables::of($data)
//            ->addColumn('sotien', function ($row) {
//                return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
//            })
//            ->addColumn('thangapdung', function ($row) {
//                return '<label class="text-center">' . date("m-Y", strtotime($row['thangapdung'])) . '</label>';
//            })
            ->addColumn('lichday', function ($row) {
                $data=explode(',',$row['ngaygiangday']);
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
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action','lichday'])
            ->make();
    }
    public function getdataloptuoi(){
        $data=danhmuclophoc::where('id','<>',1)
            ->where('id','<>',5)
            ->get()->toArray();
        $res=[];
        for($i=0;$i<count($data);$i++){
            $res[$i]='<option value="'.$data[$i]['id'].'">'.$data[$i]['loptuoi'].'</option>';
        }
        return implode(',',$res);
    }
}
