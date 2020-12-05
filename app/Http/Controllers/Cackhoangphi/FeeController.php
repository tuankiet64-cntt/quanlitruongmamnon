<?php

namespace App\Http\Controllers\Cackhoangphi;

use App\cackhoangphi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $active_nav='quanlicackhoanphi';
        return view('app.cackhoangphi.index',compact('active_nav'));
    }
    public function getdatabymonth(Request $request){
        $date=$request->get('date');
        $month=date("m",strtotime($date));
        $data=cackhoangphi::whereMonth('thangapdung','=',$month)->get();
        return DataTables::of($data)
            ->addColumn('sotien', function ($row) {
                return '<label class="text-center">' . number_format($row['sotien']) . '</label>';
            })
            ->addColumn('thangapdung', function ($row) {
                return '<label class="text-center">' . date("m-Y", strtotime($row['thangapdung'])) . '</label>';
            })

            ->addColumn('loaiphi', function ($row) {
                if($row['loaiphi']==1){
                    return '<label class="text-center" data-value="1">Phí ngày</label>';
                }
                else if($row['loaiphi']==2){
                    return '<label class="text-center" data-value="2">Phí tháng</label>';
                }
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-pencil"></span></button>
                        </div>';

            })
            ->addIndexColumn()
            ->rawColumns(['thangapdung','action','loaiphi','sotien'])
            ->make();
    }
    public function insert(Request $request){
        $tenphi=$request->get('tenphi');
        $thangapdung=$request->get('thangapdung');
        $sotien=$request->get('sotien');
        $loaiphi=$request->get('loaiphi');
        $note=$request->get('note');
        $new= new cackhoangphi;
        $new->tenkhoangphi=$tenphi;
        $new->loaiphi=$loaiphi;
        $new->sotien=$sotien;
        $new->thangapdung=date("Y-m-d", strtotime($thangapdung));
        $new->ghichu=$note;
        if($new->save()){
            return 1;
        }else{
            return 0;
        };

    }
    public function update(Request $request){
        $id=$request->get('id');
        $tenphi=$request->get('tenphi');
        $thangapdung=$request->get('thangapdung');
        $sotien=$request->get('sotien');
        $loaiphi=$request->get('loaiphi');
        $note=$request->get('note');
        $update= cackhoangphi::where('id','=',$id)->first();
        $update->tenkhoangphi=$tenphi;
        $update->loaiphi=$loaiphi;
        $update->sotien=$sotien;
        $update->thangapdung=date("Y-m-d", strtotime($thangapdung));
        $update->ghichu=$note;
        if($update->save()){
            return 1;
        }else{
            return 0;
        };

    }
}
