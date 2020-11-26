<?php

namespace App\Http\Controllers\Tintuc;

use App\Http\Controllers\Controller;
use App\tintuc;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TintucController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app.tintuc.index');
    }
    public function getdata(){
        $data=tintuc::orderBy('id', 'DESC')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '<div class="btn-group btn-group-sm">
                            <button type="button" class="tabledit-edit-button btn btn-warning waves-effect waves-light modal-ajax-edit" id="modal-ajax-edit" onclick="openModalUpdate(' . $row['id'] . ',$(this))" data-toggle="modal" data-target="#area_update" title="Chỉnh sửa"><span class="fa fa-chevron-up"></span></button>
                        </div>';

            })->addColumn('ngaytao', function ($row) {
                return '<div>
                           <label class="text-center">'.date("d-m-Y", strtotime($row['created_at'])).'</label>
                        </div>';

            })
            ->addColumn('avatar', function ($row) {
                if($row['image_path']!=null){
                    return '<img src="'.$row['image_path'].'" class="img-thumbnail">';
                }else{
                    return '<img src="images/noimage.png" class="img-thumbnail">';
                }

            })
            ->addIndexColumn()
            ->rawColumns(['action','avatar','ngaytao'])
            ->make();
    }
    public function insert(Request $request){
        $title=$_POST['title'];
//        $avatar=$_FILES['file'];
        $description=$_POST['description'];
        $content=$_POST['content'];
        if($_FILES!=null){

            /* Getting file name */
            $filename = $_FILES['file']['name'];

            /* Location */
            $location = "images/".time().$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                    $response = $location;
                }
            }
            $new= new tintuc;
            $new->title=$title;
            $new->description=$description;
            $new->content=$content;
            $new->image_path=$response;
            if($new->save()){
                return 1;
            }else{
                return 0;
            }
        }
        else{
            $new= new tintuc;
            $new->title=$title;
            $new->description=$description;
            $new->content=$content;
            $new->image_path="";
            if($new->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }
    public function getdatabyid(Request $request){
        $id=$request->get('id');
        $data=tintuc::where('id','=',$id)->first();
        return $data;

    }
    public function update(Request $request){
        $title=$_POST['title'];
        $id=$_POST['id'];
//        $avatar=$_FILES['file'];
        $description=$_POST['description'];
        $content=$_POST['content'];
        if($_FILES!=null){
            /* Getting file name */
            $filename = $_FILES['file']['name'];

            /* Location */
            $location = "images/".time().$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
                /* Upload file */
                if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                    $response = $location;
                }
            }
            $new= tintuc::where('id','=',$id)->first();
            $new->title=$title;
            $new->description=$description;
            $new->content=$content;
            $new->image_path=$response;
            if($new->save()){
                return 1;
            }else{
                return 0;
            }
        }
        else{
            $new= tintuc::where('id','=',$id)->first();
            $new->title=$title;
            $new->description=$description;
            $new->content=$content;
            $new->image_path="";
            if($new->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

}
