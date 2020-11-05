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
                            <h4>Quản lý tài khoản</h4>
                        </div>
                        <input type="text" class="d-none" id="idUser" value="{{Auth::user()->id}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('user.user.index')}}">Quản lý tài khoản</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between" style="    margin-bottom: -45px;">
                    <h4 class="sub-title">Thông tin giáo viên</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group d-flex justify-content-between">
                                <span>Họ và tên</span>
                                <span id="ten">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Giới tính</span>
                                <span id="gioitinh">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Ngày sinh</span>
                                <span id="ngaysinh">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Chứng minh nhân dân/Hộ chiếu</span>
                                <span id="CMND">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Hộ khẩu</span>
                                <span id="hokhau">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Địa chỉ</span>
                                <span id="diachi">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Chức vụ</span>
                                <span id="chucvu">Đang xử lí</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group d-flex justify-content-between">
                                <span>Email</span>
                                <span id="Email">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Số điện thoại</span>
                                <span id="sdt">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Dân tộc</span>
                                <span id="dantoc">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Tôn giáo</span>
                                <span id="tongiao">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Ngày vào trường</span>
                                <span id="ngayvaotruong">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Lớp đang dạy</span>
                                <span id="lopdangday">Đang xử lí</span>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <span>Ngày dạy</span>
                                <span id="ngayday">Đang xử lí</span>
                            </div>
                        </div>

                    </div>
                </div>
                {{--                <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1"--}}
                {{--                     role="dialog"--}}
                {{--                     aria-hidden="true">--}}
                {{--                    <div class="modal-dialog modal-lg" role="document">--}}
                {{--                        <div class="modal-content " id="container-modal">--}}
                {{--                            @include('app.lenlop.update');--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/user/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
