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
                            <h4>Quản lý lên lớp</h4>
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
                                    href="{{route('lenlop.lenlop.index')}}">Quản lý lên lớp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                </div>
                <div class="card-body">
                    <table class="table table-border-style col-lg-12" id="lopdangday">
                        <thead>
                        <th>STT</th>
                        <th>Tên lớp</th>
                        <th>Số lượng</th>
{{--                        <th>Số tiền</th>--}}
{{--                        <th>Loại phí</th>--}}
{{--                        <th>Ghi chú</th>--}}
                        {{--                        <th>Số lượng tối đa</th>--}}
                        <th>Chức năng</th>
                        </thead>
                    </table>
                </div>
                <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1"
                     role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content " id="container-modal">
                            @include('app.lenlop.update');
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            <script src="../js/component/app/lenlop/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
