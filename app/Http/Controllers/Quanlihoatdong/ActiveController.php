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
            ->select('hoatdong.id','tenhoatdong','ngaygiangday','ghichu','loptuoi','ngayketthuc')
            ->get()->toArray();
        return DataTables::of($data)
//            ->addColumn('sotien', function ($row) {
//                return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
//            })
            ->addColumn('ngayketthuc', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['ngayketthuc'])) . '</label>';
            })
            ->addColumn('lichday', function ($row) {
                if ($row['ngaygiangday']!= null) {
                    $data=explode(',',$row['ngaygiangday']);

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
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="OpenModalupdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action','lichday','ngayketthuc'])
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
    public function insert(Request $request){
        $ten=$request->get('ten');
        $iddm=$request->get('type');
        $datadate=$request->get('ngayday');
        $note=$request->get('note');
        $nametype=$request->get('nametype');
        $dayend=$request->get('dayend');
        $ngayday=implode(',',$datadate);
        try {
            $new=new hoatdong;
            $new->iddm=$iddm;
            $new->tenhoatdong=ucwords($ten);
            $new->ngaygiangday=$ngayday;
            $new->ngaykethuc=date("Y-m-d", strtotime($dayend));
            $new->ghichu=$note;
            $new->save();
            return 1;
        }catch (\Illuminate\Database\QueryException  $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return 'Hoạt động ' . $ten . ' của lớp '.$nametype.' đã tòn tại';
            }
            return $e;
        }

    }
    public function getdatabyid(Request $request){
        $id=$request->get('id');
        $data=hoatdong::where('id','=',$id)->first();
        $data['ngaygiangday']=explode(',',$data['ngaygiangday']);
        $data['ngayketthuc']=date("d-m-Y", strtotime($data['ngayketthuc']));
//        dd($data);
        return $data;
    }
    public function update(Request $request){
        $id=$request->get('id');
        $ten=$request->get('ten');
        $iddm=$request->get('type');
        $datadate=$request->get('ngayday');
        $note=$request->get('note');
        $dayend=$request->get('dayend');
        $nametype=$request->get('nametype');
        $ngayday=implode(',',$datadate);
        try {
            $new=hoatdong::where('id','=',$id)->first();
            $new->iddm=$iddm;
            $new->tenhoatdong=ucwords($ten);
            $new->ngaygiangday=$ngayday;
            $new->ngayketthuc=date("Y-m-d", strtotime($dayend));
            $new->ghichu=$note;
            $new->save();
            return 1;
        }catch (\Illuminate\Database\QueryException  $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return 'Hoạt động ' . $ten . ' của lớp '.$nametype.' đã tòn tại';
            }
            return $e;
        }
    }
}
