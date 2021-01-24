<?php

namespace App\Http\Controllers\Lenlop;

use App\danhmuclophoc;
use App\hocsinh;
use App\Http\Controllers\Controller;
use App\lichday;
use App\lophoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Exception;
use Yajra\DataTables\DataTables;

class NextlevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='lenlop';
        return view('app.lenlop.index',compact('active_nav'));
    }

    public function getdata()
    {
        $data = hocsinh::where('malophoc', '<>', 1)
            ->join('lophoc as lh', 'lh.id', 'malophoc')
            ->join('danhmuclop as dm','dm.id','lh.madanhmuclop')
            ->select('lh.tenlop','dm.loptuoi','dm.id', DB::raw('COUNT(hocsinh.id) as soluong'), 'malophoc','dm.stt')
            ->groupBy('lh.tenlop', 'malophoc','dm.loptuoi','dm.id','dm.stt')
            ->get()->toArray();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',' . $row['malophoc'] . ',$(this),' . $row['stt'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-chevron-up"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function getdataclass(Request $request)
    {
        $idclassold = $request->get('id');
        $data = danhmuclophoc::where('id', '<>', $idclassold)
            ->where('id', '<>', 1)->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '<div class="form-radio"><div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="check" data-id="' . $row['id'] . '" data-stt="' . $row['stt'] . '" id="status" value="1">
                                                                                <i class="helper"></i>
                                                                            </label>
                                                                        </div></div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function checktontai(Request $request)
    {
        $id = $request->get('id');
        $data = hocsinh::where('malophoc', '=', $id)->count();
        if ($data != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $idOldClass = $request->get('oldClass');
        try {
            lophoc::where('id', '=', $idOldClass)->update(['madanhmuclop' => $id]);
            lichday::where('idlophoc','=',$idOldClass)->update(['idgv'=>null]);
            return 1;
        } catch (Exception $e) {
            return $e;
        }
    }
}
