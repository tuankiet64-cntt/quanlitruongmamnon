@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lý lớp học</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="/"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="">Quản lý lớp học</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div></div>
                    <button class="btn btn-primary btn-square" onclick="openModalCreate()">Tạo lớp học</button>
                </div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="quanlilop">
                        <thead>
                        <th>STT</th>
                        <th>Tên lớp</th>
{{--                        <th>Ngày sinh</th>--}}
{{--                        <th>Giới tính</th>--}}
{{--                        <th>Hộ khẩu</th>--}}
                        <th>Loại lớp</th>
                        <th>Số lượng tối đa</th>
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content " id="container-modal">
                        @include('app.quanlilop.create');
                    </div>
                </div>
            </div>
            <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content " id="container-modal">
                        @include('app.quanlilop.update');
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/quanlilop/index.js"></script>
            <script src="../js/component/app/quanlilop/delete.js"></script>
    @endpush
@endsection
