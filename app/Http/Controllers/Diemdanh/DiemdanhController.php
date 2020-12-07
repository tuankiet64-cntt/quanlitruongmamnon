<?php

namespace App\Http\Controllers\Diemdanh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\hocsinh;
use App\lophoc;
use App\User;
use App\lichday;
use App\diemdanh;
use Matrix\Exception;
use Yajra\DataTables\DataTables;

class DiemdanhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='diemdanh';
        return view('app.diemdanh.index',compact('active_nav'));
    }

    public function getData(Request $request)
    {
        $now = new \DateTime();
        $currentday = $now->format('Y-m-d');
        $day = $now->format('N');
        $id = $request->get('id');
        $idget = User::with('giaovien')
            ->where('id', '=', $id)->first();
        $idgv = $idget['giaovien']['id'];
        $datalichday = lichday::where('idgv', '=', $idgv)->first();
        $datadd = diemdanh::with('hocsinh')
            ->where('created_at', '>=', $currentday)
            ->get();
//        dd(json_decode($data));
        $checkngayday='';
//        dd(json_decode($datalichday['ngayday']));
        $datangay=json_decode($datalichday['ngayday']);
        if($datangay!=null){
            for($i=0;$i<count($datangay);$i++){
                if($datangay[$i]==$day){
                    $checkngayday=1;
                }
            }
        }
        if ($checkngayday==1) {
            if($datadd!=null && count($datadd)!=0){
                $idlophoc = $datalichday['idlophoc'];
                $data = lophoc::with('hocsinh')
                    ->where('id', '=', $idlophoc)->first();
//       return $data;
                $table= DataTables::of($data['hocsinh'])
                    ->addColumn('gioitinh', function ($row) {
                        if ($row['gioitinh'] == 1) {
                            return '<label class="text-primary">Nam</label>';
                        } else {
                            return '<label class="text-primary">Nữ</label>';
                        }
                    })
                    ->addColumn('ngaysinh', function ($row) {
                        return '<label class="text-center">' . date("d/m/Y", strtotime($row['ngaysinh'])) . '</label>';
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
                    ->addColumn('comat', function ($row) {
                        return '<div class="form-radio"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="' . $row['id'] . '" data-id="' . $row['id'] . '" id="status" value="1">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div></div>';
                    })
                    ->addColumn('vang', function ($row) {
                        return '<div class="form-radio"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="' . $row['id'] . '" data-id="' . $row['id'] . '" id="status"  value="0">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div></div>';
                    })
                    ->addColumn('ghichu', function ($row) {
                        return '<input class="form-control">';

                    })
                    ->addColumn('action', function ($row) {
                        return '<div class="btn-group btn-group-sm" style="padding: 0px 0px;">
                                                     <button class="btn btn-danger btn-outline-danger btn-icon" onclick="info('.$row['id'].')"><i class="icofont icofont-eye-alt"></i></button>
                        </div>';

                    })
                    ->addIndexColumn()
                    ->rawColumns(['gioitinh', 'comat','action', 'vang', 'ngaysinh', 'ghichu'])
                    ->make();
                $res=[$table,$datadd];
                return $res;
            }
            else {
                $idlophoc = $datalichday['idlophoc'];
                $data = lophoc::with('hocsinh')
                    ->where('id', '=', $idlophoc)->first();
//       return $data;
                return DataTables::of($data['hocsinh'])
                    ->addColumn('gioitinh', function ($row) {
                        if ($row['gioitinh'] == 1) {
                            return '<label class="text-primary">Nam</label>';
                        } else {
                            return '<label class="text-primary">Nữ</label>';
                        }
                    })
                    ->addColumn('ngaysinh', function ($row) {
                        return '<label class="text-center">' . date("d/m/Y", strtotime($row['ngaysinh'])) . '</label>';
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
                    ->addColumn('comat', function ($row) {
                        return '<div class="form-radio"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="' . $row['id'] . '" data-id="' . $row['id'] . '" id="status" value="1">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div></div>';
                    })
                    ->addColumn('vang', function ($row) {
                        return '<div class="form-radio"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="' . $row['id'] . '" data-id="' . $row['id'] . '" id="status"  value="0">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div></div>';
                    })
                    ->addColumn('ghichu', function ($row) {
                        return '<input class="form-control">';

                    })
                    ->addColumn('action', function ($row) {
                        return '<div class="btn-group btn-group-sm" style="padding: 0px 0px;">
                            <button class="btn btn-danger btn-outline-danger btn-icon" onclick="info('.$row['id'].')"><i class="icofont icofont-eye-alt"></i></button>
                        </div>';

                    })
                    ->addIndexColumn()
                    ->rawColumns(['gioitinh', 'comat', 'vang', 'ngaysinh', 'ghichu','action'])
                    ->make();
            }
        } else {
            return [];
        }
    }

    public function insert(Request $request)
    {
        $idgv = $request->get('idgv');
        $idget = User::with('giaovien')
            ->where('id', '=', $idgv)->first();
        $idgv = $idget['giaovien']['id'];
        $datalichday = lichday::where('idgv', '=', $idgv)->first();
        $idlichday = $datalichday['id'];
        $datadiemdanh = $request->get('diemdanh');
//        dd($datadiemdanh);
        try {
            for ($i = 0; $i < count($datadiemdanh); $i++) {
                $diemdanh = new diemdanh;
                $diemdanh->idhs = $datadiemdanh[$i]['id'];
                $diemdanh->id_lichday = $idlichday;
                $diemdanh->status = $datadiemdanh[$i]['value'];
                $diemdanh->chuthich = $datadiemdanh[$i]['ghichu'];
                $diemdanh->save();
            }
            return 1;
        } catch (Exception $e) {
            return $e;
        }

    }
    public function update(Request $request){
        $now = new \DateTime();
        $currentday = $now->format('Y-m-d');
        $idgv = $request->get('idgv');
        $idget = User::with('giaovien')
            ->where('id', '=', $idgv)->first();
        $idgv = $idget['giaovien']['id'];
        $datalichday = lichday::where('idgv', '=', $idgv)->first();
        $idlichday = $datalichday['id'];
        $datadiemdanh = $request->get('diemdanh');

        try {
            for ($i = 0; $i < count($datadiemdanh); $i++) {
                $diemdanh = diemdanh::where('created_at','>=',$currentday)
                    ->where('id_lichday','=',$idlichday)
                    ->where('idhs','=',$datadiemdanh[$i]['id'])->first();
                $diemdanh->status = $datadiemdanh[$i]['value'];
                $diemdanh->chuthich = $datadiemdanh[$i]['ghichu'];
                $diemdanh->save();
            }
            return 1;
        } catch (Exception $e) {
            return $e;
        }
    }

}
