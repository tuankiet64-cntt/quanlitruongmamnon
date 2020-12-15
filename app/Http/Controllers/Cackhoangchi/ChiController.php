<?php

namespace App\Http\Controllers\Cackhoangchi;

use App\cackhoangchi;
use App\giaovien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ChiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav = 'cackhoangchi';
        return view('app.cackhoangchi.index', compact('active_nav'));
    }

    public function getdata(Request $request)
    {
        $date = substr($request->get('date'), 0, -5);
        $data = cackhoangchi::whereMonth('created_at', '=', $date)->get();
        if (Auth::user()->level == 4) {
            return DataTables::of($data)
                ->addColumn('sotien', function ($row) {
                    return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
                })
                ->addColumn('ngaytao', function ($row) {
                    return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
                })
                ->addColumn('ghichu', function ($row) {
                    if ($row['ghichu'] != null) {
                        return '<label class="text-center">' . $row['Ghichu'] . '</label>';
                    } else {
                        return '<label class="text-center">Không có ghi chú</label>';
                    }
                })
                ->addColumn('trangthai', function ($row) {
                    if ($row['status'] == 1) {
                        return '<label class="text-center" data-value="1">Đã duyệt</label>';
                    } else if ($row['status'] == 0) {
                        return '<label class="text-center" data-value="0">Không duyệt</label>';
                    } else if ($row['status'] == 2) {
                        return '<label class="text-center" data-value="2">Đang chờ</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="OpenModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

                })
                ->addIndexColumn()
                ->rawColumns(['ngaytao', 'action', 'trangthai', 'sotien', 'ghichu'])
                ->make();
        } else if (Auth::user()->level == 1) {
            return DataTables::of($data)
                ->addColumn('sotien', function ($row) {
                    return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
                })
                ->addColumn('ngaytao', function ($row) {
                    return '<label class="text-center">' . date("d-m-Y", strtotime($row['created_at'])) . '</label>';
                })
                ->addColumn('ghichu', function ($row) {
                    if ($row['ghichu'] != null) {
                        return '<label class="text-center">' . $row['Ghichu'] . '</label>';
                    } else {
                        return '<label class="text-center">Không có ghi chú</label>';
                    }
                })
                ->addColumn('trangthai', function ($row) {
                    if ($row['status'] == 1) {
                        return '<label class="text-center" data-value="1">Đã duyệt</label>';
                    } else if ($row['status'] == 0) {
                        return '<label class="text-center" data-value="0">Không duyệt</label>';
                    } else if ($row['status'] == 2) {
                        return '<label class="text-center" data-value="2">Đang chờ</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if ($row['status'] == 2) {
                        return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="updatestatus(' . $row['id'] . ',1)" data-toggle="modal" data-target="#area_update" title="Duyệt"><span class="fa fa-check"></span></button>
                            <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="updatestatus(' . $row['id'] . ',0)" data-toggle="modal" data-target="#area_update" title="Không duyệt"><span class="icofont icofont-ui-close"></span></button>
                        </div>';
                    } else {
                        return '<label class="text-center" data-value="2">Đã xử lí</label>';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['ngaytao', 'action', 'trangthai', 'sotien', 'ghichu'])
                ->make();
        }

    }

    public function getdatabyid(Request $request)
    {
        $id = $request->get('id');
        $data = cackhoangchi::where('id', '=', $id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        $idacc = Auth::user()->id;
        $idgv = giaovien::where('mataikhoan', '=', $idacc)
            ->select('id')
            ->first();
        $id = $request->get('id');
        $tenkhoangchi = $request->get('ten');
        $sotien = $request->get('sotien');
        $ghichu = $request->get('note');
        $update = cackhoangchi::where('id', '=', $id)->first();
        if ($update['idgv'] == $idgv['id']) {
            $update->tenkhoangchi = $tenkhoangchi;
            $update->sotien = $sotien;
            $update->ghichu = $ghichu;
            if ($update->save()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 'Error';
        }
    }

    public function insert(Request $request)
    {
        $idacc = Auth::user()->id;
        $idgv = giaovien::where('mataikhoan', '=', $idacc)
            ->select('id')
            ->first();
        $tenkhoangchi = $request->get('ten');
        $sotien = $request->get('sotien');
        $ghichu = $request->get('note');
        $insert = new cackhoangchi;
        $insert->tenkhoangchi = $tenkhoangchi;
        $insert->idgv = $idgv['id'];
        $insert->sotien = $sotien;
        $insert->status = 2;
        $insert->ghichu = $ghichu;
        if ($insert->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public
    function updatestatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        $update = cackhoangchi::where('id', '=', $id)->first();
        $update->status = $status;
        if ($update->save()) {
            return 1;
        } else {
            return 0;
        }
    }
}
