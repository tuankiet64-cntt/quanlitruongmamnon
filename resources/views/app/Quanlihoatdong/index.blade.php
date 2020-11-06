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
                            <h4>Quản lí hoạt động</h4>
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
                                    href="{{route('quanlihoatdong.quanlihoatdong.index')}}">Quản lí hoạt động</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card container">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="sub-title">Danh sách hoạt động</h4>
                    <button class="btn btn-primary btn-square float-right" onclick="OpenModalCreate()">Tạo hoạt động</button>
                </div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="quanlihoatdong">
                        <thead>
                        <th>STT</th>
                        <th>Tên Hoạt động</th>
                        {{--                        <th>Ngày sinh</th>--}}
                        {{--                        <th>Giới tính</th>--}}
                        {{--                        <th>Hộ khẩu</th>--}}
                        <th>Loại lớp</th>
                        <th>Ngày trong tuần</th>
                        <th>Ghi chú</th>
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
                <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content " id="container-modal">
                            @include('app.quanlihoatdong.create');
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content " id="container-modal">
                            @include('app.quanlihoatdong.update');
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/quanlihoatdong/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
