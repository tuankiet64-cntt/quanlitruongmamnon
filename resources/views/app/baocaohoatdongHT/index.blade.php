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
                            <h4>Báo cáo hoạt động của giáo viên</h4>
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
                                    href="{{route('cackhoangphi.cackhoangphi.index')}}">Báo cáo hoạt động</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <input type="text" class="d-none" id="idgv" value="{{auth()->id()}}">
            <div class="container" id="content">
                <div class="card card-body">
                    <table class="table table-border-style col-lg-12" id="reporttb">
                        <thead>
                        <th>STT</th>
                        <th>Tên hoạt động</th>
                        <th>Giáo viên</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        {{--                    <th>Ghi chú</th>--}}
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
                            @include('app.baocaohoatdongHT.update');
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
            <script src="../js/component/app/quanlihoatdongHT/index.js"></script>

    @endpush
@endsection
