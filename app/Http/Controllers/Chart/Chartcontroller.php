<?php

namespace App\Http\Controllers\Chart;

use App\cackhoangchi;
use App\dongtien;
use App\Http\Controllers\Controller;
use App\recordluong;
use Illuminate\Http\Request;

class Chartcontroller extends Controller
{
    public function getdata(Request $request)
    {
        $datestart = $request->get('datestart');
        $monthstart = substr($datestart, 0, -5);
        $yearstart = substr($datestart, 3);
        $dateend = $request->get('dateend');
        $monthend = substr($dateend, 0, -5);
        $loinhuan = [];
        $chi = [];
        $month = [];
        $thu = [];
        $backgroundChi=[];
        $backgroundCThu=[];
        $backgroundCloinhuan=[];
        $backgroundhoverChi=[];
        $backgroundhoverThu=[];
        $backgroundhoverLoinhuan=[];
        for ($i = $monthstart; $i <= $monthend; $i++) {
            array_push($backgroundChi, 'rgba(95, 190, 170, 0.99)');
            array_push($backgroundCThu, 'rgba(93, 156, 236, 0.93)');
            array_push($backgroundCloinhuan, 'rgba(241, 90, 34, 1)');
            array_push($backgroundhoverChi, 'rgba(26, 188, 156, 0.88)');
            array_push($backgroundhoverThu, 'rgba(103, 162, 237, 0.82)');
            array_push($backgroundhoverLoinhuan, 'rgba(241, 90, 34, 1)');
            $chiphi = cackhoangchi::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->sum('sotien');
            $luonggiaovien = recordluong::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->sum('tongtien');
            $data = $chiphi + $luonggiaovien;
            array_push($chi, $data);
            array_push($month, 'Tháng '.$i.'');
            $hocphi = dongtien::whereMonth('created_at', '=', $i)
                ->whereYear('created_at', '=', $yearstart)
                ->sum('tongtien');
            array_push($thu, $hocphi);
            array_push($loinhuan, $hocphi-$data);
        }
        $chartchi = (object)array('label' => 'Chi', 'backgroundColor' => $backgroundChi, 'hoverBackgroundColor' => $backgroundhoverChi, 'data' => $chi);
        $chartthu = (object)array('label' => 'Thu', 'backgroundColor' => $backgroundCThu, 'hoverBackgroundColor' => $backgroundhoverThu, 'data' => $thu);
        $chartLoinhuan = (object)array('label' => 'Lợi nhuận', 'backgroundColor' => $backgroundCloinhuan, 'hoverBackgroundColor' => $backgroundhoverLoinhuan, 'data' => $loinhuan);
        $chart=[$chartthu, $chartchi,$chartLoinhuan];
        $res = [$chart,$month];
        return $res;
    }
}
