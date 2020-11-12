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
                            <h4>Xem Nhận xét</h4>
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
                                    href="{{route('baocaohoatdongGV.checkhoatdongGV.index')}}">Xem nhận xét</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <input type="text" class="d-none" id="idgv" value="{{auth()->id()}}">
            <div class="container" id="content">

            </div>
        </div>
        @push('script')
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
            <script src="../js/component/app/quanlihoatdongGV/checkcomment/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
