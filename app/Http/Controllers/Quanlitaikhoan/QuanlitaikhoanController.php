<?php

namespace App\Http\Controllers\Quanlitaikhoan;

use App\giaovien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\chucvu;
use App\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class QuanlitaikhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.quanlitaikhoan.index');
    }

    public function getdatacv()
    {
        $data = chucvu::where('id', '>', 1)->get();
        $option = [];
        for ($i = 0; $i < count($data); $i++) {
            $option[$i] = '<option class="text-center" value="' . $data[$i]['id'] . '">' . $data[$i]['tenchucvu'] . '</option>';
        }
//        dd(implode('',$option));
        return implode('', $option);
    }

    public function getdatagv()
    {
        $data = giaovien::with('roles')
//            ->join('chucvu', 'users.level', '=', 'chucvu.id')
            ->get();
        return DataTables::of($data)
            ->addColumn('gioitinh', function ($row) {
                if ($row['gioitinh'] == 1) {
                    return '<label class="text-primary">Thầy</label>';
                } else {
                    return '<label class="text-primary">Cô</label>';
                }
            })
            ->addColumn('ngaysinh', function ($row) {
                return '<label class="text-center">' . date("d/m/Y", strtotime($row['ngaysinh'])) . '</label>';
            })
            ->addColumn('ngayvaotruong', function ($row) {
                return '<label class="text-center">' . date("d/m/Y", strtotime($row['ngayvaotruong'])) . '</label>';
            })
            ->addColumn('chucvu', function ($row) {
                $data = '';
                for ($i = 0; $i < count($row['roles']); $i++) {
                    $data = $row['roles'][$i]['tenchucvu'];
                }
                return '<label class="text-center">' . $data . '</label>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="getdataUpdate(' . $row['id'] . ')" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="icofont icofont-ui-edit"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['gioitinh', 'action', 'ngaysinh', 'ngayvaotruong', 'chucvu'])
            ->make();
    }

    public function getdataupdate(Request $request)
    {
        $id = $request->get('id');
        $data = giaovien::with('roles')->where('id', '=', $id)->first();
        $data['ngaysinh'] = date("d-m-Y", strtotime($data['ngaysinh']));
        $data['ngayvaotruong'] = date("d-m-Y", strtotime($data['ngayvaotruong']));
        return $data;
    }

    public function create(Request $request)
    {
        $tengv = $request->get('tengv');
        $gioitinh = $request->get('gioitinh');
        $email = $request->get('email');
        $sdt = $request->get('sdt');
        $bangcap = $request->get('bangcap');
        $chucvu = $request->get('chucvu');
        $cmnd = $request->get('cmnd');
        $ngayvaotruong = $request->get('ngayvaotruong');
        $diachi = $request->get('diachi');
        $hokhau = $request->get('hokhau');
        $tongiao = $request->get('tongiao');
        $password = $request->get('password');
        $dantoc = $request->get('dantoc');
        $ngaysinh = $request->get('ngaysinh');
        $checkuser = User::where('email', '=', $email)->get();
        if (count($checkuser) >= 1) {
            return 2;
        }
        $taikhoan = new User;
        $taikhoan->name = $tengv;
        $taikhoan->email = $email;
        $taikhoan->level = $chucvu;
        $taikhoan->password = Hash::make($password);
        $checktaikhoan = $taikhoan->save();
        $gv = new giaovien;
        $gv->hovaten = $tengv;
        $gv->mataikhoan = $taikhoan->id;
        $gv->gioitinh = $gioitinh;
        $gv->ngaysinh = date("Y-m-d", strtotime($ngaysinh));
        $gv->cmnd = $cmnd;
        $gv->email = $email;
        $gv->sdt = $sdt;
        $gv->bangcap = $bangcap;
        $gv->diachi = $diachi;
        $gv->dantoc = $dantoc;
        $gv->tongiao = $tongiao;
        $gv->ngayvaotruong = date("Y-m-d", strtotime($ngayvaotruong));
        $gv->hokhau = $hokhau;
        if ($gv->save() && $checktaikhoan) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $tengv = $request->get('tengv');
        $gioitinh = $request->get('gioitinh');
        $email = $request->get('email');
        $sdt = $request->get('sdt');
        $bangcap = $request->get('bangcap');
        $cmnd = $request->get('cmnd');
        $ngayvaotruong = $request->get('ngayvaotruong');
        $diachi = $request->get('diachi');
        $hokhau = $request->get('hokhau');
        $tongiao = $request->get('tongiao');
        $dantoc = $request->get('dantoc');
        $ngaysinh = $request->get('ngaysinh');
        $chucvu = $request->get('chucvu');
        $mataikhoan = $request->get('mataikhoan');
        $cv = User::where('id', '=', $mataikhoan)->first();
        $cv->level = $chucvu;
        $gv = giaovien::where('id', '=', $id)->first();
        $gv->hovaten = $tengv;
        $gv->gioitinh = $gioitinh;
        $gv->ngaysinh = date("Y-m-d", strtotime($ngaysinh));
        $gv->cmnd = $cmnd;
        $gv->email = $email;
        $gv->sdt = $sdt;
        $gv->bangcap = $bangcap;
        $gv->diachi = $diachi;
        $gv->dantoc = $dantoc;
        $gv->tongiao = $tongiao;
        $gv->ngayvaotruong = date("Y-m-d", strtotime($ngayvaotruong));
        $gv->hokhau = $hokhau;
        if ($gv->save() && $cv->save()) {
            return 1;
        } else {
            return 0;
        }
    }
    public function changeStatus(Request $request){
        $id=$request->get('id');
        $status=User::where('id','=',$id)->first();
        $status->status=0;
        if($status->save()){
            return 1;
        }else{
            return 0;
        }
    }
}
