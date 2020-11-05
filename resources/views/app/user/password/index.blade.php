@extends('layouts.app')
@section('content')
    <head>
        <link rel="stylesheet" type="text/css"
              href="..\files\assets\pages\advance-elements\css\bootstrap-datetimepicker.css">

    </head>
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Đổi mật khẩu</h4>
                        </div>
                        <input type="text" class="d-none" id="emailUser" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('user.user.index')}}">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card container" style="width: 690px;">
                <div class="card-header d-flex justify-content-between" style="    margin-bottom: -45px;">
                    <h4 class="sub-title">Đổi mật khẩu</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div class="col-6">
                            <form action="" autocomplete="off">
                                <div class="d-flex justify-content-between">
                                    <span>Mật khẩu cũ</span>
                                    <input type="password" id="oldpass" class="form-control col-7" >
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Mật khẩu mới</span>
                                    <input type="password" id="newpass" class="form-control col-7">
                                </div>
                                <div class="d-flex justify-content-between ">
                                    <span>Nhập lại mật khẩu mới</span>
                                    <input type="password" id="renew" class="form-control col-7">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-square float-right" onclick="changpassword()">Lưu lại</button>
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/user/password/update.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
