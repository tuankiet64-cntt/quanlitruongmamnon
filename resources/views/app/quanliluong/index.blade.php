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
                            <h4>Quản lý lương nhân viên</h4>
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
                                    href="{{route('cackhoangphi.cackhoangphi.index')}}">Quản lý lương nhân viên</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="col-lg-8">
                        <h4 class="sub-title col-lg-4">Bảng lương nhân viên</h4>
                        {{--                        <button class=" btn btn-primary btn-square col-lg-4" onclick="openModalCreate()">Chấm công--}}
                        {{--                        </button>--}}
                        <div class="col-lg-8"></div>
                    </div>
                    {{--                    <div class="input-group col-lg-4">--}}
                    {{--                        <input id="calendar-month" class="form-control  text-center" type="text"--}}
                    {{--                               placeholder="{{date('m')}}" value="{{date('m')}}">--}}
                    {{--                        --}}{{--                                    <button class="input-group-addon float-right" id="btn-calendar"><i--}}
                    {{--                        --}}{{--                                            class="fa fa-search"></i></button>--}}

                    {{--                    </div>--}}

                </div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="luongtb">
                        <thead>
                        <th>STT</th>
                        <th>Tên giáo viên</th>
                        <th>Só ngày làm viên</th>
                        <th>Số tiền hằng ngày</th>
                        <th>Tổng tiền</th>
                        {{--                        <th>Ghi chú</th>--}}
                        {{--                        <th>Số lượng tối đa</th>--}}
                        <th>Chức năng</th>
                        </thead>
                    </table>
                    <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1"
                         role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content " id="container-modal">
                                @include('app.quanliluong.update');
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1"
                         role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content " id="container-modal">
                                @include('app.quanliluong.create');
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
            <script src="../js/component/app/quanliluong/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
