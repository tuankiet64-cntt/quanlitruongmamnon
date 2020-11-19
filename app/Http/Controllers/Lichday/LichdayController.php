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
        $data = lophoc::with('lichday', 'danhmuc')
            ->where('lophoc.id', '<>', 1)
            ->where('lophoc.id', '<>', 28)
//            ->join('danhmuclop as dm','dm.id','lophoc.madanhmuclop')
//            ->leftjoin('lichday as ld','ld.idlophoc','lophoc.id')
//            ->groupBy('lophoc.id')
//            ->select('tenlop','loptuoi','lophoc.id')
            ->get()->toArray();
        return DataTables::of($data)
            ->addColumn('status', function ($row) {
                $all=$row['lichday'];
                if($all!=null){
                    $y=0;
                    $n=0;
                    for($i=0;$i<count($all);$i++){
                        if ($all[$i]['idgv'] != null) {
                            $y++;
                        } else {
                            $n++;
                        }
                    }
                    return '<label class="text-center">Lịch dạy có giáo viên: '.$y.'  <br> Lịch dạy không có giáo viên: '.$n.'  </label>';
                }
            })
            ->addColumn('lichday', function ($row) {
                if (count($row['lichday']) != null) {
                    return '<label class="text-center">' . count($row['lichday']) . '</label>';
                } else {
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
            ->rawColumns(['action', 'lichday','status'])
            ->make();
    }

    public function getdatabyid(Request $request)
    {
        $id = $request->get('id');
        $data = lichday::where('idlophoc', '=', $id)
            ->leftjoin('giaovien as gv', 'gv.id', 'idgv')
            ->select('ngayday', 'hovaten', 'lichday.id','lichday.idgv')
            ->get()->toArray();
        return DataTables::of($data)
            ->addColumn('lichday', function ($row) {
                $data = json_decode($row['ngayday']);
                if ($data != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        $data[$i] = 'Thứ' . ' ' . ($data[$i] + 1);
                    }
                    return '<label class="text-primary">' . implode(',', $data) . '</label>';
                } else {
                    return '<label class="text-danger">Chưa có lịch dạy</label>';
                }
            })
            ->addColumn('hovaten', function ($row) {
                if ($row['hovaten'] != null) {
                    return '<label class="text-center">' . $row['hovaten'] . '</label>';
                } else {
                    return '<label class="text-center">Chưa có giáo viên</label>';
                }

            })

            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Createlich(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                            <button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModaladd(' . $row['idgv'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Giáo viên"><span class="fa fa-user-plus"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'lichday', 'hovaten'])
            ->make();
    }

    public function getdatagvbyid(Request $request)
    {
        $id = $request->get('id');
        $data = lichday::where('id', '=', $id)->first();
        if ($data == null) {
            return 0;
        }
        $data['ngayday'] = json_decode($data['ngayday']);
        return $data;
    }

    public function checklichday(Request $request)
    {
        $idlophoc = $request->get('idlophoc');
        $daycheck = $request->get('day');
        $data = lichday::where('idlophoc', '=', $idlophoc)->get();
//        $check = '';
//        dd($data);
        for ($i = 0; $i < count($data); $i++) {
            $arrayngayday = json_decode($data[$i]['ngayday']);
            for ($y = 0; $y < count($arrayngayday); $y++) {
                if ($arrayngayday[$y] == $daycheck) {
                    $check = 1;
                    $data = [$check, $data[$i]['idgv']];
                    return $data;
                }
            }
        }
    }

    public function updatelichday(Request $request)
    {
        $data = $request->get('data');
        $idlophoc = $request->get('idlophoc');
        $idlichhoc = $request->get('idlichhoc');
        $idgv = $request->get('idgv');
//        dd($idlichhoc);
//        dd($idlichhoc,$idlophoc,$idgv);
//        dd($data,$idlophoc,$idgv,$idlichhoc);
        if ($idgv == null) {
            $lichday = new lichday;
            $lichday->idgv = $idgv;
            $lichday->idlophoc = $idlophoc;
            $lichday->ngayday = json_encode($data);

        } else {
            $lichday = lichday::where('id', '=', $idlichhoc)->first();
            $lichday->ngayday = json_encode($data);
        }
        if ($lichday->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getlichday(Request $request)
    {
        $id = $request->get('id');
        $data = lichday::where('idgv', '=', $id)->first();
        if ($data == null) {
            return 0;
        }
        $data['ngayday'] = json_decode($data['ngayday']);
        return $data;
    }

    public function delete(Request $request)
    {
        $id = $request->get('idlichhoc');
        $delete = lichday::where('id', '=', $id)->first();
        if ($delete->delete()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkday(Request $request)
    {
        $id = $request->get('id');
        $data = lichday::where('idlophoc', '=', $id)
            ->select('ngayday')
            ->get();
        return $data;
    }

    public function getdatagv(Request $request)
    {
        $idgv=$request->get('idgv');
        $data = giaovien::where('status', '=', '1')
            ->where('giaovien.id','<>',$idgv)
            ->leftJoin('lichday as ld', 'ld.idgv', 'giaovien.id')
            ->leftJoin('lophoc as lh', 'lh.id', '=', 'ld.idlophoc')
            ->select('*', 'giaovien.id')
            ->get();
//        dd(json_decode($data));
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

                $year_diff = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff = date("d") - $day;

                // if we are any month before the birthdate: year - 1
                // OR if we are in the month of birth but on a day
                // before the actual birth day: year - 1
                if (($month_diff < 0) || ($month_diff === 0 && $day_diff < 0))
                    $year_diff--;
                return '<label class="text-center">' . $year_diff . ' tuổi </label>';
            })
            ->addColumn('lichday', function ($row) {
                $data = json_decode($row['ngayday']);
                if ($data != null) {
                    for ($i = 0; $i < count($data); $i++) {
                        $data[$i] = 'Thứ' . ' ' . ($data[$i] + 1);
                    }
                    return '<label class="text-primary">' . implode(',', $data) . '</label>';
                } else {
                    return '<label class="text-danger">Chưa có lịch dạy</label>';
                }
            })
            ->addColumn('lophoc', function ($row) {
                if ($row['tenlop'] != null) {
                    return '<label class="text-danger">' . $row['tenlop'] . '</label>';
                } else {
                    return '<label class="text-danger">Chưa có lớp</label>';
                }

            })
            ->addColumn('action', function ($row) {
                return '<div class="form-radio" style="    margin-top: -12px;"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="check" data-id="' . $row['id'] . '" data-soluong="' . $row['soluong'] . '" id="status" value="1">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div>
                                                                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh', 'lichday', 'lophoc'])
            ->make();
    }
    public function checklichdaycuagv(Request $request){
        $id=$request->get('id');
        $idlichhoc=$request->get('idlichhoc');
        $update=lichday::where('id','=',$idlichhoc)->first();
        $update->idgv=$id;
        try {
            $update->save();
            return 1;
        } catch (\Illuminate\Database\QueryException  $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return 0;
            }
            return $e;
        }

    }
    public function checklichdaycuagv2(Request $request){
        $idgv=$request->get('id');
        $idlich=$request->get('idlichhoc');
        $update=lichday::where('idgv','=',$idgv)->first();
        $update->idgv=null;
        $new=lichday::where('id','=',$idlich)->first();
        $new->idgv=$idgv;
        if($update->save() && $new->save()){
            return 1;
        }else{
            return 0;
        }
    }

}
