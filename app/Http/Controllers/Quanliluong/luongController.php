<?php

namespace App\Http\Controllers\Quanliluong;

use App\giaovien;
use App\Http\Controllers\Controller;
use App\luongnv;
use App\recordluong;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class luongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='quanliluong';
        return view('app.quanliluong.index',compact('active_nav'));
    }
    public function getdata(){
        $data=giaovien::with('luonggv')->get()->toArray();
        return DataTables::of($data)
            ->addColumn('ngaylamviec', function ($row) {
                if($row['luonggv']['songaylamviec']!=null){
                    return '<label class="text-center">'.$row['luonggv']['songaylamviec'].' ngày</label>';
                }else{
                    return '<label class="text-danger">Chưa thỏa thuận</label>';
                }
            })
            ->addColumn('sotienhangngay', function ($row) {
                if($row['luonggv']['sotienhangngay']!=null){
                    return '<label class="text-center">'.number_format($row['luonggv']['sotienhangngay']).' VNĐ</label>';
                }else{
                    return '<label class="text-danger">Chưa thỏa thuận </label>';
                }
            })
            ->addColumn('tongtien', function ($row) {
                if($row['luonggv']['tongtien']!=null){
                    return '<label class="text-center">'.number_format($row['luonggv']['tongtien']).' VNĐ</label>';
                }else{
                    return '<label class="text-danger">Chưa thỏa thuận </label>';
                }
            })
            ->addColumn('action', function ($row) {
                if($row['luonggv']['id']!=null){
                    return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openupdate(' . $row['luonggv']['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';
                }else{
                    return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="create(' . $row['id'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-plus-square"></span></button>
                        </div>';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'sotienhangngay', 'ngaylamviec','tongtien'])
            ->make();
    }
    public function getdata2(Request $request){
        $month = $request->get('month');
//        dd($month);
//        $month='12';
        $data=giaovien::with(['luonggv','recordluong'=> function ($query) use ($month) {
            $query->whereMonth('recordluong.created_at', '=', $month);
        },'chamcong'=> function ($query) use ($month) {
            $query->whereMonth('checkin.created_at', '=', $month);
        }])->get()->toArray();
        return DataTables::of($data)
            ->addColumn('ngaylamviec', function ($row) {
                $ngaylam = 0;
                $data = $row['chamcong'];
                if ($row['chamcong'] != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        if ($data[$i]['trangthai'] == 1) {
                            $ngaylam++;
                        }
                    }
                    return '<label class="text-center" data-ngay="'.$ngaylam.'">' . $ngaylam . ' Ngày</label>';
                } else {
                    return '<label class="text-center" data-ngay="">Giáo viên chưa chấm công</label>';
                }
            })
            ->addColumn('sotienhangngay', function ($row) {
                if($row['luonggv']['sotienhangngay']!=null){
                    return '<label class="text-center" data-luongngay="'.$row['luonggv']['sotienhangngay'].'" >'.number_format($row['luonggv']['sotienhangngay']).' VNĐ</label>';
                }else{
                    return '<label class="text-danger" data-luongngay="">Chưa thỏa thuận </label>';
                }
            })
            ->addColumn('tongtien', function ($row) {
                if($row['luonggv']['songaylamviec']==count($row['chamcong'])){
                    return '<label class="text-center" data-tongtien="'.$row['luonggv']['tongtien'].'">'.number_format($row['luonggv']['tongtien']).' VNĐ</label>';
                }
                if($row['luonggv']['tongtien']==null){
                    return '<label class="text-danger" data-tongtien="">Chưa thỏa thuận </label>';
                }
                if($row['chamcong'] ==null){
                    return '<label class="text-danger" data-tongtien="">Giáo viên chưa chấm công </label>';
                }
                else{
                    $luong=count($row['chamcong'])*$row['luonggv']['sotienhangngay'];
                    return '<label class="text-center" data-tongtien="'.$luong.'">'.number_format($luong).' VNĐ</label>';
                }
            })

            ->addColumn('action', function ($row) {
                if($row['recordluong']!=null){
                    return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="OpenModalDone(' . $row['recordluong']['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';
                }else{
                    return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="done(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-plus-square"></span></button>
                        </div>';
                }
            })
            ->addColumn('trangthai', function ($row) {
                if($row['recordluong']!=null){
                    return '<label class="text-center" >Đã trả lương</label>';

                }else{
                    return '<label class="text-center" >Chưa trả lương</label>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'sotienhangngay', 'ngaylamviec','tongtien','trangthai'])
            ->make();
    }
    public function insert(Request $request){
        $ngaylamviec= $request->get('ngaylamviec');
        $idgv= $request->get('idgv');
        $luong= $request->get('luong');
        $sotienhangngay=$request->get('sotienhangngay');
        $new=new luongnv;
        $new->idgv=$idgv;
        $new->songaylamviec=$ngaylamviec;
        $new->sotienhangngay=$sotienhangngay;
        $new->tongtien=$luong;
        if($new->save()){
            return 1;
        }else{
            return 0;
        }
    }
    public function getdatabyid(Request $request){
        $id=$request->get('id');
        $data=luongnv::where('id','=',$id)->first();
        return $data;
    }
    public function update(Request $request){
        $ngaylamviec= $request->get('ngaylamviec');
        $id= $request->get('id');
        $luong= $request->get('luong');
        $sotienhangngay=$request->get('sotienhangngay');
        $new=luongnv::where('id','=',$id)->first();
        $new->songaylamviec=$ngaylamviec;
        $new->sotienhangngay=$sotienhangngay;
        $new->tongtien=$luong;
        if($new->save()){
            return 1;
        }else{
            return 0;
        }
    }
    public function insert2(Request $request){
        $idgv=$request->get('idgv');
        $songaylam=$request->get('songaylam');
        $luongngay=$request->get('luongngay');
        $tongtien=$request->get('tongtien');
        $new=new recordluong;
        $new->idgv=$idgv;
        $new->ngaylamviec=$songaylam;
        $new->luongngay=$luongngay;
        $new->tongtien=$tongtien;
        if($new->save()){
            return 1;
        }else{
            return 0;
        }
    }
    public function getdatabyiddone(Request $request){
        $id=$request->get('id');
        $data=recordluong::where('id','=',$id)->first();
        $data['ngaytraluong']=date("d-m-Y", strtotime($data['created_at']));
        return $data;
    }
}
