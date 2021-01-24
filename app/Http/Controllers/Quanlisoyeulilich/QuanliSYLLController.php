<?php

namespace App\Http\Controllers\Quanlisoyeulilich;

use App\Http\Controllers\Controller;
use App\lophoc;
use App\nknhaphoc;
use App\hocsinh;
use App\phuhuynh;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class QuanliSYLLController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='SYLL';
        return view('app.quanlisoyeulilich.index',compact('active_nav'));
    }

    public function successStudent()
    {
        $data = nknhaphoc::where('trangthai', '=', 1);
        return DataTables::of($data)
            ->addColumn('gioitinh', function ($row) {
                if ($row['gioitinh'] == 1) {
                    return '<label class="text-primary">Nam</label>';
                } else {
                    return '<label class="text-primary">Nữ</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['ngaysinh'])) . '</label>';
            })
            ->addColumn('status', function ($row) {
                if ($row['trangthai'] == 0) {
                    return '<label class="text-primary">Đang chờ</label>';
                } else if ($row['trangthai'] == "1") {
                    return '<label class="text-success">Chấp nhận</label>';
                } else {
                    return '<label class="text-danger">Từ chối</label>';
                }
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="createSYLL(' . $row['id'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="icofont icofont-ui-edit"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh', 'status'])
            ->make();
    }

    public function getData(Request $request)
    {
        $id = $request->get('id');
        $data = nknhaphoc::where('id', '=', $id)->first()->toArray();
        $data['ngaysinh'] = date("d-m-Y", strtotime($data['ngaysinh']));
        return $data;
    }

    public function create(Request $request)
    {
        $idhs=$request->get('idhs');
        $tenhs = $request->get('tenhs');
        $tenthuonggoi = $request->get('tenthuonggoi');
        $ngaysinh_hs = $request->get('ngaysinh_hs');
        $diachi = $request->get('diachi');
        $hokhauthuongtru = $request->get('hokhauthuongtru');
        $hokhautamtru = $request->get('hokhautamtru');
        $dantoc = $request->get('dantoc');
        $suckhoehientai = $request->get('suckhoehientai');
        $hotenac = $request->get('hotenac');
        $sdtac = $request->get('sdtac');
        $tongiao = $request->get('tongiao');
        $hotenme = $request->get('hotenme');
        $ngaysinh_me = $request->get('ngaysinh_me');
        $sdt_me = $request->get('sdt_me');
        $email_me = $request->get('email_me');
        $nghenghiep_me = $request->get('nghenghiep_me');
        $tencongty_me = $request->get('tencongty_me');
        $hotenph = $request->get('hotenph');
        $ngaysinh_ph = $request->get('ngaysinh_ph');
        $sdt_ph = $request->get('sdt_ph');
        $email_ph = $request->get('email_ph');
        $nghenghiep_ph = $request->get('nghenghiep_ph');
        $tencongty_ph = $request->get('tencongty_ph');
        $quanhe = $request->get('quanhe');
        $quanhe_add = $request->get('quanhe_ph');
        $gioitinh = $request->get('gioitinh');
        $ngayvaotruong = $request->get('ngayvaotruong');
        $hs = new hocsinh;
        $hs->hovaten = $tenhs;
        $hs->tenthuonggoi=$tenthuonggoi;
        $hs->ngaysinh = date("Y-m-d", strtotime($ngaysinh_hs));
        $hs->gioitinh = $gioitinh;
        $hs->diachi = $diachi;
        $hs->ngayvaotruong = date("Y-m-d", strtotime($ngayvaotruong));
        $hs->tinhtrangsuckhoe = $suckhoehientai;
        $hs->hokhauthuongtru = $hokhauthuongtru;
        $hs->hokhautamtru = $hokhautamtru;
        $hs->dantoc = $dantoc;
        $hs->tongiao = $tongiao;
        $hs->save();
        if($hotenac!=null){
            $anhchi=new phuhuynh;
            $anhchi->mahs = $hs->id;
            $anhchi->hovaten=$hotenac;
            $anhchi->sdt=$sdtac;
            $anhchi->quanhe='Anh/Chị';
            $anhchi->save();
        }
        if($hotenme!=null&&$ngaysinh_me!=null){
            $ph = new phuhuynh;
            $ph->mahs = $hs->id;
            $ph->hovaten = $hotenph;
            $ph->sdt = $sdt_ph;
            $ph->email = $email_ph;
            $ph->quanhe = $quanhe;
            $ph->ngaysinh = date("Y-m-d", strtotime($ngaysinh_ph));
            $ph->nghenghiep = $nghenghiep_ph;
            $ph->tendonvi = $tencongty_ph;
            $me = new phuhuynh;
            $me->mahs = $hs->id;
            $me->hovaten = $hotenme;
            $me->sdt = $sdt_me;
            $me->email = $email_me;
            $me->quanhe = $quanhe_add;
            $me->ngaysinh = date("Y-m-d", strtotime($ngaysinh_me));
            $me->nghenghiep = $nghenghiep_me;
            $me->tendonvi = $tencongty_me;
            if ($ph->save() && $me->save()) {
                nknhaphoc::where('id', '=', $idhs)->update(['trangthai' => '3']);
                return 1;
            } else {
                return 0;
            }
        }
        $ph = new phuhuynh;
        $ph->mahs = $hs->id;
        $ph->hovaten = $hotenph;
        $ph->sdt = $sdt_ph;
        $ph->email = $email_ph;
        $ph->quanhe = $quanhe;
        $ph->ngaysinh = date("Y-m-d", strtotime($ngaysinh_ph));
        $ph->nghenghiep = $nghenghiep_ph;
        $ph->tendonvi = $tencongty_ph;
        if ($ph->save()) {
            nknhaphoc::where('id', '=', $idhs)->update(['trangthai' => '3']);
            return 1;
        } else {
            return 0;
        }

    }
    public function getDatahs(){
        $data=hocsinh::with('lophoc')->get();
        return DataTables::of($data)
            ->addColumn('gioitinh', function ($row) {
                if ($row['gioitinh'] == 1) {
                    return '<label class="text-primary">Nam</label>';
                } else {
                    return '<label class="text-primary">Nữ</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['ngaysinh'])) . '</label>';
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
            ->addColumn('lop', function ($row) {
                return '<label class="text-center">' .$row['lophoc']['tenlop']. '</label>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="UpdateSYLL(' . $row['id'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="icofont icofont-ui-edit"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh','lop'])
            ->make();
    }
    public function getDatahsUpdate(Request $request){
        $id=$request->get('id');
        $data=hocsinh::with('phuhuynh')->where('id','=',$id)->first();
        $table=DataTables::of($data->phuhuynh)
//            ->addColumn('gioitinh', function ($row) {
//                if ($row['gioitinh'] == 1) {
//                    return '<label class="text-primary">Nam</label>';
//                } else {
//                    return '<label class="text-primary">Nữ</label>';
//                }
//            })
            ->addColumn('quanhe', function ($row) {
                if ($row['quanhe'] == 1) {
                    return '<label class="text-primary">Cha</label>';
                } else if ($row['quanhe'] == 2) {
                    return '<label class="text-primary">Me</label>';
                }else{
                    return '<label class="text-primary">Người thân</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['ngaysinh'])) . '</label>';
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
//            ->addColumn('lop', function ($row) {
//                return '<label class="text-center">' .$row['lophoc']['tenlop']. '</label>';
//            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="getdataphid(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="icofont icofont-ui-edit"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh','lop','quanhe'])
            ->make();
        $data['ngaysinh'] = date("d-m-Y", strtotime($data['ngaysinh']));
        $data['ngayvaotruong'] = date("d-m-Y", strtotime($data['ngaysinh']));
        $lophocdata=lophoc::all();
        for($i=0;$i<count($lophocdata);$i++){
            $lophoc[$i]='<option class="text-center" value="'.$lophocdata[$i]['id'].'">'.$lophocdata[$i]['tenlop'].'</option>';
        }
        $res=[$data,$table,implode("",$lophoc)];
        return $res;
    }
    function update(Request $request){
        $idhs=$request->get('id');
        $tongiao = $request->get('tongiao');
        $ngayvaotruong = $request->get('ngayvaotruong');
        $tenhs = $request->get('tenhs');
        $tenthuonggoi = $request->get('tenthuonggoi');
        $ngaysinh_hs = $request->get('ngaysinh_hs');
        $diachi = $request->get('diachi');
        $hokhauthuongtru = $request->get('hokhauthuongtru');
        $hokhautamtru = $request->get('hokhautamtru');
        $dantoc = $request->get('dantoc');
        $gioitinh = $request->get('gioitinh');
        $suckhoehientai = $request->get('suckhoehientai');
        $lophoc = $request->get('lophoc');
        $hs=hocsinh::where('id','=',$idhs)->first();
        $hs->hovaten = $tenhs;
        $hs->tenthuonggoi=$tenthuonggoi;
        $hs->ngaysinh = date("Y-m-d", strtotime($ngaysinh_hs));
        $hs->gioitinh = $gioitinh;
        $hs->diachi = $diachi;
        $hs->ngayvaotruong = date("Y-m-d", strtotime($ngayvaotruong));
        $hs->tinhtrangsuckhoe = $suckhoehientai;
        $hs->hokhauthuongtru = $hokhauthuongtru;
        $hs->hokhautamtru = $hokhautamtru;
        $hs->dantoc = $dantoc;
        $hs->tongiao = $tongiao;
        $hs->malophoc=$lophoc;
        if($hs->save()){
            return 1;
        }else{
            return 0;
        }
    }
    function getdataphbyid(Request $request){
        $id=$request->get('id');
        $data=phuhuynh::where('id',"=",$id)->first();
        $data['ngaysinh'] = date("d-m-Y", strtotime($data['ngaysinh']));
        return $data;
    }
    function updateph(Request $request){
        $id=$request->get('id');
        $hotenph = $request->get('hotenph');
        $ngaysinh_ph = $request->get('ngaysinh_ph');
        $sdt_ph = $request->get('sdt_ph');
        $email_ph = $request->get('email_ph');
        $nghenghiep_ph = $request->get('nghenghiep_ph');
        $tencongty_ph = $request->get('tencongty_ph');
        $quanhe=$request->get('quanhe');
        $ph=phuhuynh::where('id','=',$id)->first();
        $ph->hovaten = $hotenph;
        $ph->sdt = $sdt_ph;
        $ph->email = $email_ph;
        $ph->quanhe = $quanhe;
        $ph->ngaysinh = date("Y-m-d", strtotime($ngaysinh_ph));
        $ph->nghenghiep = $nghenghiep_ph;
        $ph->tendonvi = $tencongty_ph;
        if($ph->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
