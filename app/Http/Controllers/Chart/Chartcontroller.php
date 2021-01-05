<?php

namespace App\Http\Controllers\Chart;

use App\cackhoangchi;
use App\dongtien;
use App\Http\Controllers\Controller;
use App\recordluong;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Chartcontroller extends Controller
{
    public function getdata(Request $request)
    {
        $datestart = $request->get('datestart');
        $dateend = $request->get('dateend');
        $yearstart = substr($dateend, 3);
        $monthend = substr($dateend, 0, -5);
        $loinhuan = [];
        $monthstart=$monthend;
        if($datestart!=""){
            $monthstart = substr($datestart, 0, -5);
        }
        $chi = [];
        $month = [];
        $thu = [];
        $backgroundChi = [];
        $backgroundCThu = [];
        $backgroundCloinhuan = [];
        $backgroundhoverChi = [];
        $backgroundhoverThu = [];
        $backgroundhoverLoinhuan = [];
        $table = [];
        $y = 0;
        for ($i = $monthstart; $i <= $monthend; $i++) {
            array_push($backgroundChi, 'rgba(95, 190, 170, 0.99)');
            array_push($backgroundCThu, 'rgba(93, 156, 236, 0.93)');
            array_push($backgroundCloinhuan, 'rgba(241, 90, 34, 1)');
            array_push($backgroundhoverChi, 'rgba(26, 188, 156, 0.88)');
            array_push($backgroundhoverThu, 'rgba(103, 162, 237, 0.82)');
            array_push($backgroundhoverLoinhuan, 'rgba(241, 90, 34, 1)');
            $chiphi = cackhoangchi::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->where('status', '=', 1)
                ->sum('sotien');
            $luonggiaovien = recordluong::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->sum('tongtien');
            $data = $chiphi + $luonggiaovien;
            array_push($chi, $data);
            array_push($month, 'Tháng ' . $i . '');
            $hocphi = dongtien::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->sum('tongtien');
            array_push($thu, $hocphi);
            array_push($loinhuan, $hocphi - $data);
            $table[$y] = (object)[
                'thang' => $i,
                'thu' => $hocphi,
                'chi' => $data,
                'loinhuan' => $hocphi - $data,
            ];
            $y++;
        }
        $chartchi = (object)array('label' => 'Chi', 'backgroundColor' => $backgroundChi, 'hoverBackgroundColor' => $backgroundhoverChi, 'data' => $chi);
        $chartthu = (object)array('label' => 'Thu', 'backgroundColor' => $backgroundCThu, 'hoverBackgroundColor' => $backgroundhoverThu, 'data' => $thu);
        $chartLoinhuan = (object)array('label' => 'Lợi nhuận', 'backgroundColor' => $backgroundCloinhuan, 'hoverBackgroundColor' => $backgroundhoverLoinhuan, 'data' => $loinhuan);
        $chart = [$chartthu, $chartchi, $chartLoinhuan];
        $loadtable = $this->loadtable($table);
        $res = [$chart, $month, $loadtable];
        return $res;
    }

    public function loadtable(array $data)
    {
        return DataTables::of($data)
            ->addColumn('thang', function ($row) {
                return '<label class="text-center">Tháng ' . $row->thang . ' </label>';
            })
            ->addColumn('thu', function ($row) {
                return '<label class="text-center">' . number_format($row->thu) . ' VND</label>';
            })
            ->addColumn('chi', function ($row) {
                return '<label class="text-center">' . number_format($row->chi) . ' VND</label>';
            })
            ->addColumn('ngay', function ($row) {
                return '<label class="text-center">' . number_format($row->chi) . ' VND</label>';
            })
            ->addColumn('loinhuan', function ($row) {
                return '<label class="text-center">' . number_format($row->loinhuan) . ' VND</label>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="OpenModalDetail(' . $row->thang . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['thang', 'action', 'thu', 'chi', 'ngay', 'loinhuan'])
            ->make();
    }

    public function getdatadetail(Request $request)
    {
        $month = $request->get('month');
        $yearstart = date('Y');
        $chi = cackhoangchi::whereMonth('created_at', '=', $month)
            ->where('status', '=', 1)
            ->whereYear('created_at', '=', $yearstart)->get();
        $luonggiaovien = recordluong::with('luonggv')
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $yearstart)
            ->get()->toArray();
        $hocphi = dongtien::whereMonth('dongtien.created_at', '=', $month)
            ->whereYear('dongtien.created_at', '=', $yearstart)
            ->join('hocsinh as hs', 'hs.id', 'dongtien.idhs')
            ->join('lophoc as lh', 'lh.id', 'hs.malophoc')
            ->select('hovaten', 'dongtien.id', 'ngaysinh', 'gioitinh', 'tenlop', 'dongtien.idhs', 'dongtien.tongtien','dongtien.created_at')
            ->get();
        $tablechi = DataTables::of($chi)
            ->addColumn('sotien', function ($row) {
                return '<label class="text-center"> ' . number_format($row->sotien) . ' VNĐ</label>';
            })
            ->addColumn('ngay', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
            })
            ->addIndexColumn()
            ->rawColumns(['sotien', 'ngay'])
            ->make();
        $tableluong = DataTables::of($luonggiaovien)
            ->addColumn('tongtien', function ($row) {
                return '<label class="text-center"> ' . number_format($row['tongtien']) . '  VNĐ</label>';
            })
            ->addColumn('tengv', function ($row) {
                return '<label class="text-center">' . $row['luonggv']['hovaten'] . ' </label>';
            })
            ->addColumn('ngay', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
            })
            ->addIndexColumn()
            ->rawColumns(['tongtien', 'ngay', 'tengv'])
            ->make();
        $tablehocphi = DataTables::of($hocphi)
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
            ->addColumn('ngay', function ($row) {
                return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
            })
            ->addColumn('tongtien', function ($row) {
                return '<label class="text-center"> ' . number_format($row['tongtien']) . '  VNĐ</label>';
            })
            ->addIndexColumn()
            ->rawColumns(['tongtien','ngay', 'ngaysinh', 'gioitinh'])
            ->make();
        $res=[$tablechi,$tableluong,$tablehocphi];
        return $res;
    }
}
