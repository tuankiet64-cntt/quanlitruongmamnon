<?php

namespace App\Http\Controllers\Quanlilop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lophoc;
use App\hocsinh;
use App\danhmuclophoc;
use Yajra\DataTables\DataTables;

class QuanlixeplopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='quanlilop';
        return view('app.quanlilop.index',compact('active_nav'));
    }

    public function getData()
    {
        $data = lophoc::where('madanhmuclop', '>', '1')
            ->leftjoin('danhmuclop as dm', 'dm.id', 'lophoc.madanhmuclop')
            ->select('lophoc.id', 'madanhmuclop', 'tenlop', 'soluong', 'loptuoi')
            ->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                            <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light ml-1"  title="Xóa" onclick="deletelop(' . $row['id'] . ')"><span class="icofont icofont-ui-close"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function gettypelop()
    {
        $data = danhmuclophoc::where('id', '>', 1)->get()->toArray();
        $res = [];
        for ($i = 0; $i < count($data); $i++) {
            $res[$i] = '<option value="' . $data[$i]['id'] . '">' . $data[$i]['loptuoi'] . '</option>';
        }
        return implode('', $res);
    }

    public function insert(Request $request)
    {
        $tenlop = $request->get('tenlop');
        $loptuoi = $request->get('loptuoi');
        $soluong = $request->get('soluong');
        $lophoc = new lophoc;
        $lophoc->madanhmuclop = $loptuoi;
        $lophoc->tenlop = ucwords($tenlop);
        $lophoc->soluong = $soluong;
        try {
            $lophoc->save();
            return 1;
        } catch (\Illuminate\Database\QueryException  $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return 'Lớp ' . $tenlop . ' đã tòn tại';
            }
            return $e;
        }
    }

    public function update(Request $request)
    {
        $tenlop = $request->get('tenlop');
        $loptuoi = $request->get('loptuoi');
        $soluong = $request->get('soluong');
        $id = $request->get('id');
        $lophoc = lophoc::where('id', '=', $id)->first();
        $lophoc->madanhmuclop = $loptuoi;
        $lophoc->tenlop = ucwords($tenlop);
        $lophoc->soluong = $soluong;
        try {
            $lophoc->save();
            return 1;
        } catch (\Illuminate\Database\QueryException  $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return 'Lớp ' . $tenlop . ' đã tòn tại';
            }
            return $e;
        }
    }

    public function getdataUpdate(Request $request)
    {
        $id = $request->get('id');
        $data = lophoc::where('id', '=', $id)->first();
        return $data;
    }
    public function delete(Request $request){
        $id=$request->get('id');
        try {
            hocsinh::where('malophoc','=',$id)->update(['malophoc'=>1]);
            lophoc::where('id','=',$id)->first()->delete();
            return 1;
        }catch  (\Illuminate\Database\QueryException  $e) {
            return $e;
        }
    }
}
