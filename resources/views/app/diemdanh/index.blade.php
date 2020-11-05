@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Điểm danh học sinh</h4>
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
                                    href="">Điểm danh học sinh</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="container">
                    <div class="card-header d-flex p-b-0  justify-content-between">
                        <H4 class="sub-title">Danh sách học sinh</H4>
                    </div>
                    <div class="card-body">
                        <table class="table" id="diemdanhtable" style="width: 100%">
                            <thead>
                            <th class="text-center">STT</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Giới tính</th>
                            <th class="text-center">Ngày sinh</th>
                            <th class="text-center">Có mặt</th>
{{--                            <th class="text-center">Vắng không phép</th>--}}
                            <th class="text-center">Vắng</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Chức năng</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-sm-between">
                        <div></div>
                        <button class="btn btn-primary" onclick="diemdanh()">Điểm danh</button>
                    </div>
                    <div class="modal fade" id="info-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content " id="container-modal">
                                @include('app.diemdanh.info');
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="../js/component/app/diemdanh/index.js"></script>
    @endpush
@endsection
