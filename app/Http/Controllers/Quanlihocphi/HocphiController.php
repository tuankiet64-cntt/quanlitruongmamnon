<?php

namespace App\Http\Controllers\Quanlihocphi;

use App\cackhoangphi;
use App\dongtien;
use App\hocsinh;
use App\Http\Controllers\Controller;
use App\phuhuynh;
use Illuminate\Http\Request;
use App\lophoc;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class HocphiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.quanlihocphi.index');
    }

    public function getdatalophoc()
    {
        $data = lophoc::where('id', '>', 1)->get()->toArray();
        $option = [];
        for ($i = 0; $i < count($data); $i++) {
            $option[$i] = '<option class="text-center" value="' . $data[$i]['id'] . '">' . $data[$i]['tenlop'] . '</option>';
        }
        return implode('', $option);
    }

    public function getdatahocsinh(Request $request)
    {
        $month = date('m');
        $id = $request->get('id');
        $data = hocsinh::where('malophoc', '=', $id)
            ->join('lophoc as lh', 'lh.id', 'hocsinh.malophoc')
//            ->leftjoin('dongtien as dt','dt.idhs','hocsinh.id')
            ->wherenotExists(function ($query) {
                $query->select(['*'])
                    ->from('dongtien')
//                    ->from('dongtien','dt')
//                    ->join('dongtien as dt','dt.idhs','=','hocsinh.id')
                    ->whereRaw('hocsinh.id = dongtien.idhs')
                    ->whereMonth('dongtien.created_at', '=', date('m'));
            })
//            ->where('dt.idhs','=',null)
            ->select('hocsinh.id', 'ngaysinh', 'gioitinh', 'tenlop', 'hovaten')
            ->get()->toArray();
//        $data = hocsinh::query()
//            ->select(['*'])
//            ->leftJoin('dongtien','hocsinh.id','dongtien.idhs')
//            ->where('dongtien.created_at')
//            ->get()->toArray();
        return DataTables::of($data)
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
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="Modalhocphi(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'ngaysinh', 'gioitinh'])
            ->make();
    }

    public function getdatahocsinhbyid(Request $request)
    {
        $idhp=$request->get('idhp');
        $id = $request->get('id');
        $month = date('m');
        $checkhocsinh = hocsinh::where('hocsinh.id', '=', $id)
            ->join('diemdanh as dm', 'dm.idhs', 'hocsinh.id')
            ->whereMonth('dm.created_at', '=', $month - 1)
            ->first();
        if ($checkhocsinh == null) {
            return 3;
        }
        $datastart = hocsinh::where('hocsinh.id', '=', $id)
            ->join('diemdanh as dm', 'dm.idhs', 'hocsinh.id')
            ->whereMonth('dm.created_at', '=', $month - 1)
            ->select('dm.created_at')
            ->first()
            ->toArray();
        $formatdatestart = date("d-m-Y", strtotime($datastart['created_at']));
        $dataend = hocsinh::where('hocsinh.id', '=', $id)
            ->join('diemdanh as dm', 'dm.idhs', 'hocsinh.id')
            ->whereMonth('dm.created_at', '=', $month - 1)
            ->select('dm.created_at')
            ->get()->last()->toArray();
        $formatdateend = date("d-m-Y", strtotime($dataend['created_at']));
        $dataon = hocsinh::where('hocsinh.id', '=', $id)
            ->join('diemdanh as dm', 'dm.idhs', 'hocsinh.id')
            ->whereMonth('dm.created_at', '=', $month - 1)
            ->where('status', '=', 1)
            ->count();
        $dataoff = hocsinh::where('hocsinh.id', '=', $id)
            ->join('diemdanh as dm', 'dm.idhs', 'hocsinh.id')
            ->whereMonth('dm.created_at', '=', $month - 1)
            ->where('status', '=', 0)
            ->count();
        $dataphuhuynh = phuhuynh::where('mahs', '=', $id)->get();
        $table = DataTables::of($dataphuhuynh)
            ->addColumn('ngaysinh', function ($row) {
                return '<label class="text-center">' . date("d/m/Y", strtotime($row['ngaysinh'])) . '</label>';
            })
            ->addIndexColumn()
            ->rawColumns(['ngaysinh'])
            ->make();
        $datahp=dongtien::where('id','=',$idhp)
            ->whereMonth('created_at','=',$month)
            ->select('idphi')
            ->first();
        $hp=json_decode($datahp);
        $res = [$formatdatestart, $formatdateend, $dataon, $dataoff, $table,$hp];
        return $res;
    }

    public function getdatakhoanphi()
    {
        $month = date('m');
        $data = cackhoangphi::whereMonth('thangapdung', '=', $month - 1)->get();
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                return '<div class="checkbox-fade fade-in-primary">
                        <label>
                            <input id="checkfee" type="checkbox" value="' . $row['sotien'] . '" data-id="' . $row['id'] . '">
                            <span class="cr">
                                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                        </span>

                        </label>
                    </div>';
            })
            ->addColumn('sotien', function ($row) {
                return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
            })
            ->addColumn('thangapdung', function ($row) {
                return '<label class="text-center">' . date("m-Y", strtotime($row['thangapdung'])) . '</label>';
            })
            ->addColumn('loaiphi', function ($row) {
                if ($row['loaiphi'] == 1) {
                    return '<label class="text-center" data-value="1">Phí ngày</label>';
                } else if ($row['loaiphi'] == 2) {
                    return '<label class="text-center" data-value="2">Phí tháng</label>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['thangapdung', 'checkbox', 'loaiphi', 'sotien'])
            ->make();
    }

    public function getdatahocsinhdadongtien(Request $request)
    {
        $idlophoc = $request->get('id');
        $month = date('m');
        $data = dongtien::whereMonth('dongtien.created_at', '=', $month)
            ->join('hocsinh as hs', 'hs.id', 'dongtien.idhs')
            ->where('hs.malophoc', '=', $idlophoc)
            ->join('lophoc as lh', 'lh.id', 'hs.malophoc')
            ->select('hovaten','dongtien.id','ngaysinh','gioitinh','tenlop','dongtien.idhs','dongtien.tongtien')
            ->get();
        return DataTables::of($data)
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
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                        <button class="btn btn-danger btn-outline-danger btn-icon" onclick="modaldone(' . $row['id'] . ',$(this),' . $row['idhs'] . ',' . $row['tongtien'] . ')"><i class="icofont icofont-eye-alt"></i></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'ngaysinh', 'gioitinh'])
            ->make();
    }

    public function insert(Request $request)
    {
        $id = $request->get('id');
        $idcanbo = $request->get('idcanbo');
        $cackhoanphi = $request->get('cackhoanphi');
        $tongtien = $request->get('tongtien');
        $new = new dongtien;
        $new->idhs = $id;
        $new->idcanbo = $idcanbo;
        $new->tongtien = $tongtien;
        $new->idphi = json_encode($cackhoanphi);
        if ($new->save()) {
            return 1;
        } else {
            return 0;
        }
    }
}
