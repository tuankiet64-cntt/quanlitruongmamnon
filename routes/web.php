<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.index');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Registration', 'as' => 'registration.', 'middleware' => []],
    function () {
        Route::resource('nhaphoc', 'RegisterController');
        Route::post('nhaphoc.dangky', 'RegisterController@create');
    }
);
Route::group(
    ['namespace' => 'Mail', 'as' => 'mail.', 'middleware' => []],
    function () {
        Route::post('mail.camon', 'SendMailController@camon');
        Route::post('mail.success', 'SendMailController@successMail');
        Route::post('mail.fail', 'SendMailController@failMail');
    }
);
Route::group(
    ['namespace' => 'Quanlinhaphoc', 'as' => 'quanlinhaphoc.', 'middleware' => []],
    function () {
        Route::resource('qlnhaphoc', 'QuanliNHController');
        Route::get('qlnhaphoc.getdata', 'QuanliNHController@getData');
        Route::post('qlnhaphoc.changestatus', 'QuanliNHController@changeStatus');
    }
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

Auth::routes();
/**
 * WebApp
 */
/**
 * Quản lí thông tin học sinh
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::group(
    ['namespace' => 'Quanlisoyeulilich', 'as' => 'quanlisoyeulilich.', 'middleware' => []],
    function () {
        Route::resource('qlsyll', 'QuanliSYLLController');
        Route::get('qlsyll.successtudent', 'QuanliSYLLController@successStudent');
        Route::get('qlsyll.getdata', 'QuanliSYLLController@getData');
        Route::get('qlsyll.getdatahocsinh', 'QuanliSYLLController@getDatahs');
        Route::post('qlsyll.create', 'QuanliSYLLController@create');
        Route::get('qlsyll.getdatahocsinhupdate', 'QuanliSYLLController@getDatahsUpdate');
        Route::post('qlsyll.update', 'QuanliSYLLController@update');
    }
);
/**
 * Quản lí xếp lớp học sinh
 */
Route::group(
    ['namespace' => 'Quanlixeplop', 'as' => 'quanlixeplop.', 'middleware' => []],
    function () {
        Route::resource('quanlixeplop', 'QuanlixeplopController');
        Route::get('quanlixeplop.getdata', 'QuanlixeplopController@getData');
        Route::get('quanlixeplop.getdata2', 'QuanlixeplopController@getdata2');
        Route::get('quanlixeplop.getlophoc', 'QuanlixeplopController@getLopHoc');
        Route::post('quanlixeplop.xeplop', 'QuanlixeplopController@xeplop');
        Route::post('quanlixeplop.rollback', 'QuanlixeplopController@rollback');
        Route::resource('quanlixeplop-giaovien', 'QuanlixeplopGVController');
        Route::get('quanlixeplop-giaovien.getdatagv', 'QuanlixeplopGVController@getdatagv');
        Route::get('quanlixeplop-giaovien.getlichday', 'QuanlixeplopGVController@getlichday');
        Route::post('quanlixeplop-giaovien.createlichday', 'QuanlixeplopGVController@createlichday');
        Route::post('quanlixeplop-giaovien.checklichday', 'QuanlixeplopGVController@checklichday');
        Route::get('quanlixeplop-giaovien.checklday', 'QuanlixeplopGVController@checkday');
        Route::get('quanlixeplop-giaovien.checklop', 'QuanlixeplopGVController@checklop');
        Route::get('quanlixeplop-giaovien.checkdiemdanh', 'QuanlixeplopGVController@checkdiemdanh');
        Route::post('quanlixeplop-giaovien.chuyenlop', 'QuanlixeplopGVController@chuyenlop');
    }
);
Route::group(
    ['namespace' => 'Quanlitaikhoan', 'as' => 'quanlitaikhoan.', 'middleware' => []],
    function () {
        Route::resource('quanlitaikhoan', 'QuanlitaikhoanController');
        Route::get('quanlitaikhoan.getdatacv', 'QuanlitaikhoanController@getdatacv');
        Route::get('quanlitaikhoan.getdatagv', 'QuanlitaikhoanController@getdatagv');
        Route::get('quanlitaikhoan.getdataupdate', 'QuanlitaikhoanController@getdataupdate');
        Route::post('quanlitaikhoan.create', 'QuanlitaikhoanController@create');
        Route::post('quanlitaikhoan.update', 'QuanlitaikhoanController@update');
        Route::post('quanlitaikhoan.changestatus', 'QuanlitaikhoanController@changeStatus');
    }
);
Route::group(
    ['namespace' => 'Diemdanh', 'as' => 'diemdanh.', 'middleware' => []],
    function () {
        Route::resource('diemdanh', 'DiemdanhController');
        Route::get('diemdanh.getdata', 'DiemdanhController@getData');
        Route::post('diemdanh.insert', 'DiemdanhController@insert');
        Route::post('diemdanh.update', 'DiemdanhController@update');
    }
);

Route::group(
    ['namespace' => 'Quanlilop', 'as' => 'quanlilop.', 'middleware' => []],
    function () {
        Route::resource('quanlilop', 'QuanlixeplopController');
        Route::get('quanlilop.getdata', 'QuanlixeplopController@getData');
        Route::get('quanlilop.getdataupdate', 'QuanlixeplopController@getdataUpdate');
        Route::get('quanlilop.gettypelop', 'QuanlixeplopController@gettypelop');
        Route::post('quanlilop.insert', 'QuanlixeplopController@insert');
        Route::post('quanlilop.update', 'QuanlixeplopController@update');
        Route::post('quanlilop.delete', 'QuanlixeplopController@delete');
    }
);
Route::group(
    ['namespace' => 'Quanlihocphi', 'as' => 'quanlihocphi.', 'middleware' => []],
    function () {
        Route::resource('quanlihocphi', 'HocphiController');
        Route::get('quanlihocphi.getdatalophoc', 'HocphiController@getdatalophoc');
        Route::get('quanlihocphi.getdatahocsinh', 'HocphiController@getdatahocsinh');
        Route::get('quanlihocphi.getdatahocsinhdadongtien', 'HocphiController@getdatahocsinhdadongtien');
        Route::get('quanlihocphi.getdatahocsinhbyid', 'HocphiController@getdatahocsinhbyid');
//        Route::get('quanlihocphi.getdatahocsinhdonebyid', 'HocphiController@getdatahocsinhdonebyid');
        Route::get('quanlihocphi.getdatakhoanphi', 'HocphiController@getdatakhoanphi');
        Route::post('quanlihocphi.insert','HocphiController@insert');
//        Route::post('diemdanh.update','DiemdanhController@update');
    }
);
Route::group(
    ['namespace' => 'Cackhoangphi', 'as' => 'cackhoangphi.', 'middleware' => []],
    function () {
        Route::resource('cackhoangphi', 'FeeController');
        Route::get('cackhoangphi.getdatabymonth', 'FeeController@getdatabymonth');
        Route::post('cackhoangphi.insert', 'FeeController@insert');
        Route::post('cackhoangphi.update', 'FeeController@update');
    }
);
Route::group(
    ['namespace' => 'Lenlop', 'as' => 'lenlop.', 'middleware' => []],
    function () {
        Route::resource('lenlop', 'NextlevelController');
        Route::get('lenlop.getdata', 'NextlevelController@getdata');
        Route::get('lenlop.getdataclass', 'NextlevelController@getdataclass');
        Route::get('lenlop.checktontai', 'NextlevelController@checktontai');
        Route::post('lenlop.update', 'NextlevelController@update');
//        Route::post('cackhoangphi.update', 'FeeController@update');
    }
);
Route::group(
    ['namespace' => 'User', 'as' => 'user.', 'middleware' => []],
    function () {
        Route::resource('user', 'UserController');
        Route::resource('password', 'ChangepasswordController');
        Route::get('user.getdata', 'UserController@getdata');
//        Route::get('lenlop.getdataclass', 'NextlevelController@getdataclass');
//        Route::get('lenlop.checktontai', 'NextlevelController@checktontai');
        Route::post('password.update', 'ChangepasswordController@update');
//        Route::post('cackhoangphi.update', 'FeeController@update');
    }
);
Route::group(
    ['namespace' => 'Quanlihoatdong', 'as' => 'quanlihoatdong.', 'middleware' => []],
    function () {
        Route::resource('quanlihoatdong', 'ActiveController');
        Route::get('quanlihoatdong.getdata', 'ActiveController@getdata');
        Route::get('quanlihoatdong.getdataloptuoi', 'ActiveController@getdataloptuoi');
        Route::post('quanlihoatdong.insert', 'ActiveController@insert');
//        Route::post('cackhoangphi.update', 'FeeController@update');
    }
);
