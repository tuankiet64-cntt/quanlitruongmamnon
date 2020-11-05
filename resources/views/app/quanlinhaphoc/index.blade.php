@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lý đơn nhập học</h4>
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
                                    href="">Quản lí đơn nhập học</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="page-body">
        <div class="card">
            <div class="card-header"></div>
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
    </div>
    @push('script')
        <script src="../js/component/app/quanlinhaphoc/index.js"></script>
    @endpush
@endsection
