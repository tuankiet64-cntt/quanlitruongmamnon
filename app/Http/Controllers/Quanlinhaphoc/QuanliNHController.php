<?php

namespace App\Http\Controllers\Quanlinhaphoc;

use App\Http\Controllers\Controller;
use App\lophoc;
use Illuminate\Http\Request;
use App\nknhaphoc;
use Yajra\DataTables\DataTables;

class QuanliNHController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('app.quanlinhaphoc.index');
    }

    public function getData(){
        $data=nknhaphoc::where('trangthai','<',3);
        return DataTables::of($data)
            ->addColumn('gioitinh', function ($row) {
                if($row['gioitinh']==1){
                    return '<label class="text-primary">Nam</label>';
                }else{
                    return '<label class="text-primary">Nữ</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                    return '<label class="text-center">'.date("d-m-Y", strtotime($row['ngaysinh'])).'</label>';
            })
            ->addColumn('status', function ($row) {
                if($row['trangthai']==0){
                    return '<label class="text-primary">Đang chờ</label>';
                }else if($row['trangthai']=="1"){
                    return '<label class="text-success">Chấp nhận</label>';
                }else{
                    return '<label class="text-danger">Từ chối</label>';
                }
            })
            ->addColumn('action', function ($row) {
                $emailbo=$row['emailbo'];
                $emailme=$row['emailme'];
                $emailph=$row['emailph'];
                if ($row['trangthai'] == 1) {
                    $button = '<button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light ml-1 val-'.$row['id'].'"  title="Từ chối" onclick="status(2,'.$row['id'].')"><span class="icofont icofont-ui-close"></span></button>';
                } else if($row['trangthai'] == 2) {
                    $button = '<button type="button" class="tabledit-edit-button btn btn-success waves-effect waves-light ml-1 val-'.$row['id'].'" title="Chấp nhận" onclick="status(1,'.$row['id'].')"><span class="icofont icofont-ui-check"></span></button>';
                }else{
                    $button = '<button type="button" class="tabledit-edit-button btn btn-success waves-effect waves-light ml-1 val-'.$row['id'].' "  title="Chấp nhận" onclick="status(1,'.$row['id'].')"><span class="icofont icofont-ui-check"></span></button>
                               <button type="button" class="tabledit-edit-button btn btn-danger waves-effect waves-light ml-1 val-'.$row['id'].'"  title="Từ chối" onclick="status(2,'.$row['id'].')"><span class="icofont icofont-ui-close"></span></button>
                               ';
                }
                return '<div class="btn-group btn-group-sm">
                            ' . $button . '
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action','ngaysinh','status'])
            ->make();
    }
    public function changeStatus(Request $request){
        $id=$request->get('id');
        $status=$request->get('status');
        $update = nknhaphoc::where('id', '=', $id)->update(['trangthai' => $status]);
        if($update){
            return 1;
        }else{
            return 0;
        }
    }
}
