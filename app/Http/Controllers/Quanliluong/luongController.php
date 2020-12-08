<?php

namespace App\Http\Controllers\Quanliluong;

use App\giaovien;
use App\Http\Controllers\Controller;
use App\luongnv;
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
}
