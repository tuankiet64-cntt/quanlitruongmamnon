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
                            <h4>Báo cáo hoạt động</h4>
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
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <H4 class="d-flex flex-row">
                        <span class="sub-title">Báo cáo môn:</span>
                        <div class="m-l-2 d-flex flex-row" style="margin: -7px 14px;">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="check" data-id="" id="status" value="1">
                                        <i class="helper"></i>
                                        <span>Đã dạy</span>

                                    </label>
                                </div>
                            </div>
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="check" data-id="" id="status" value="1">
                                        <i class="helper"></i>
                                        <span>Chưa dạy</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </H4>
                    <h3 id="name-sb"><span>
                            Âm nhạc
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <H4 class="sub-title">Nội dung</H4>
                    <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
            </textarea>
                    </form>
                </div>
            </div>
        </div>
        @push('script')
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
            <script type="text/javascript"
                    src="..\files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
            <script src="../js/component/app/quanlihoatdongGV/index.js"></script>
    {{--            <script src="../js/component/app/quanlilop/delete.js"></script>--}}

    @endpush
@endsection
