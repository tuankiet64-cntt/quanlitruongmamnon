@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lý học phí</h4>
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
                                    href="{{route('quanlihocphi.quanlihocphi.index')}}">Quản lý học phí</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <h4 class="sub-title">Học sinh chưa đóng tiền</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="col-lg-8"></div>
                    <select class="form-control col-lg-4" id="lop">
                    </select>
                </div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="hocsinhtb">
                        <thead>
                        <th>STT</th>
                        <th>Tên học sinh</th>
                                                <th>Ngày sinh</th>
                                                <th>Giới tính</th>
                        {{--                        <th>Hộ khẩu</th>--}}
                        <th>Lớp</th>
{{--                        <th>Số lượng tối đa</th>--}}
                        <th>Chức năng</th>
                        </thead>
                    </table>
                    <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content " id="container-modal">
                                @include('app.quanlihocphi.create');
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="done-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content " id="container-modal">
                                @include('app.quanlihocphi.done');
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="sub-title">Học sinh đã đóng tiền</h4>
            <div class="card">
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="hocsinhdtdone">
                        <thead>
                        <th>STT</th>
                        <th>Tên học sinh</th>
                                                <th>Ngày sinh</th>
                                                <th>Giới tính</th>
                        {{--                        <th>Hộ khẩu</th>--}}
                        <th>Lớp</th>
{{--                        <th>Số lượng tối đa</th>--}}
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/quanlihocphi/index.js"></script>
{{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}
    @endpush
@endsection
