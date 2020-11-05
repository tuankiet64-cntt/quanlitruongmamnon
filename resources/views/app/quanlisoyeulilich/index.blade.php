@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lí sơ yếu lí lịch</h4>
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
                                    href="{{route('quanlisoyeulilich.qlsyll.index')}}">Quản lí sơ yếu lí lịch</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="card-header">Danh sách học sinh đã được duyệt</div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="quanlinhaphocTB">
                        <thead>
                        <th>STT</th>
                        <th>Tên học sinh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Hộ khẩu</th>
                        <th>Sức khỏe hiện tại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Danh sách học sinh đã bổ sung thông tin</div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="quanlithongtinhs">
                        <thead>
                        <th>STT</th>
                        <th>Tên học sinh</th>
                        <th>Lớp</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Sức khỏe hiện tại</th>
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content " id="container-modal">
                        @include('app.quanlisoyeulilich.create');
                </div>
            </div>
        </div>
        <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content " id="container-modal">
                        @include('app.quanlisoyeulilich.edit');
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/quanlisoyeulilich/index.js"></script>
    @endpush
@endsection
