<?php

namespace App\Http\Controllers\Quanlixeplop;

use App\Http\Controllers\Controller;
use App\lophoc;
use Illuminate\Http\Request;
use App\hocsinh;
use mysql_xdevapi\Exception;
use Yajra\DataTables\DataTables;

class QuanlixeplopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $active_nav='quanlixeplop';
        return view('app.quanlixeplop.index',compact('active_nav'));
    }
    public function getData(){
        $data=hocsinh::where('malophoc','=',1)->get();
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

                $year_diff  = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff   = date("d") - $day;

                // if we are any month before the birthdate: year - 1
                // OR if we are in the month of birth but on a day
                // before the actual birth day: year - 1
                if ( ($month_diff < 0 ) || ($month_diff === 0 && $day_diff < 0)){
                    $year_diff--;
                    $month_diff=12-$month+date("m");
                }
                return '<label class="text-center" data-dotuoi="'.$year_diff.'">' . $year_diff . ' tuổi '.$month_diff.' tháng</label>';
            })
//            ->addColumn('status', function ($row) {
//                if ($row['trangthai'] == 0) {
//                    return '<label class="text-primary">Đang chờ</label>';
//                } else if ($row['trangthai'] == "1") {
//                    return '<label class="text-success">Chấp nhận</label>';
//                } else {
//                    return '<label class="text-danger">Từ chối</label>';
//                }
//            })
            ->addColumn('checkbox', function ($row) {
                return '<div class="checkbox-zoom zoom-primary">
                                <label>
                                    <input type="checkbox" value="'.$row['id'].'" id="status-update">
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                </label>
                            </div>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="UpdateSYLL(' . $row['id'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="icofont icofont-ui-edit"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh','checkbox'])
            ->make();
    }
    public function getdata2(Request $request){
        $id=$request->get('id');
        $data=hocsinh::where('malophoc','=',$id)->get();
        $birthdate='2020-2-7';


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

                $year_diff  = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff   = date("d") - $day;

                // if we are any month before the birthdate: year - 1
                // OR if we are in the month of birth but on a day
                // before the actual birth day: year - 1
                if ( ($month_diff < 0 ) || ($month_diff === 0 && $day_diff < 0)){
                    $year_diff--;
                    $month_diff=12-$month+date("m");
                }
                return '<label class="text-center">' . $year_diff . ' tuổi '.$month_diff.' tháng</label>';

            })
//            ->addColumn('status', function ($row) {
//                if ($row['trangthai'] == 0) {
//                    return '<label class="text-primary">Đang chờ</label>';
//                } else if ($row['trangthai'] == "1") {
//                    return '<label class="text-success">Chấp nhận</label>';
//                } else {
//                    return '<label class="text-danger">Từ chối</label>';
//                }
//            })
//            ->addColumn('checkbox', function ($row) {
//                return '<div class="checkbox-zoom zoom-primary">
//                                <label>
//                                    <input type="checkbox" id="status-create">
//                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i>
//                                                </span>
//                                </label>
//                            </div>';
//            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                        <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light ml-1 val-'.$row['id'].'"  title="Từ chối" onclick="back('.$row['id'].')"><span class="icofont icofont-ui-close"></span></button>

                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh'])
            ->make();
    }
    public function xeplop(Request $request){
        $id=$request->check;
        $lop=$request->lop;
        try {
            for($i=0;$i<count($id);$i++){
                hocsinh::where('id','=',$id[$i])->update(['malophoc'=>$lop]);
            }
            return 1;
        }catch (Exception $error){
            return $error;
        }
    }
    public function getLopHoc(){
        $data=lophoc::join('danhmuclop as dm','dm.id','lophoc.madanhmuclop')
            ->select('lophoc.id','dm.dotuoi','lophoc.soluong','lophoc.tenlop')
            ->get();
        $loop=[];
        for ($i=0;$i<count($data);$i++){
            if($data[$i]['id']!=1){
                $loop[$i]='<option class="text-center" data-dotuoi="'.$data[$i]['dotuoi'].'" value="'.$data[$i]['id'].'" data-soluong="'.$data[$i]['soluong'].'">'.$data[$i]['tenlop'].'</option>';
            }
        }
        $res=implode('',$loop);
        return $res ;
    }
    public function rollback(Request $request){
        $id=$request->get('id');
        $data=hocsinh::where('id','=',$id)
        ->update(['malophoc'=>'1']);
        if($data){
            return 1;
        }else{
            return 0;
        }
    }
}
