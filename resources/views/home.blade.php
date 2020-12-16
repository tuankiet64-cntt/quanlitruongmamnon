@extends('layouts.app')
@section('content')
    <head>
        <link rel="stylesheet" type="text/css"
              href="..\files\assets\pages\advance-elements\css\bootstrap-datetimepicker.css">

    </head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="@if(Auth::user()->level==1) d-none @endif">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body d-flex justify-content-center flex-column align-items-center"
                             style="height: 151px">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (Auth::check())
                                <div>
                                    <input type="text" class="d-none" id="idacc" value="{{Auth::user()->id}}">
                                    Bạn đang đăng nhập với quyền
                                    @if( Auth::user()->level == 0)
                                        {{ "SuperAdmin" }}
                                    @elseif( Auth::user()->level == 1)
                                        {{ "Admin" }}
                                    @elseif( Auth::user()->level == 2)
                                        {{ "giáo viên" }}
                                    @elseif( Auth::user()->level == 3)
                                        {{ "bảo mẫu" }}
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($checkin==0)
                    <div class="card text-center" style="width: 18rem;" id="off">
                        <h5 class="card-header">Chấm công</h5>
                        <div class="card-body">
                            <p class="card-text">Click vào nút checkin để Chấm công.</p>
                            <button class="btn btn-primary" id="checkin" onclick="checkin()">Checkin</button>
                        </div>
                    </div>
                @else
                    <div class="card text-center" style="width: 18rem;">
                        <h5 class="card-header">Chấm công</h5>
                        <div class="card-body">
                            <p class="card-text">Bạn đã check in vào lúc: {{$time}}.</p>
                            <p class="card-text">Số ngày công hiện tại là : {{$total}}.</p>
                            <button class="btn btn-danger" disabled>Checkin</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card card-body @if(Auth::user()->level!=1) d-none @endif">
                <h4 class="sub-title">Thống kê lợi nhuận</h4>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="input-group col-lg-4">
                        <input id="calendar-start" class="form-control  text-center" type="text"
                               placeholder="{{date('m')-1}}" value="{{date('m')-1}}">
                        {{--                                    <button class="input-group-addon float-right" id="btn-calendar"><i--}}
                        {{--                                            class="fa fa-search"></i></button>--}}

                    </div>
                    <div class="d-flex align-items-center">
                        <label for="">Đến</label>
                    </div>
                    <div class="input-group col-lg-4">
                        <input id="calendar-end" class="form-control  text-center" type="text"
                               placeholder="{{date('m')}}" value="{{date('m')}}">
                        {{--                                    <button class="input-group-addon float-right" id="btn-calendar"><i--}}
                        {{--                                            class="fa fa-search"></i></button>--}}

                    </div>
                </div>
                <canvas id="myChart" width="1200" height="600"></canvas>
                <h4 class="sub-title">Bảng thống kê</h4>
                <table class="table table-border-style col-lg-12" id="loinhuantb">
                    <thead>
                    <th>STT</th>
                    <th>Thời gian</th>
                    <th>Thu</th>
                    <th>Chi</th>
                    <th>Lợi nhuận</th>
{{--                    <th>Trạng thái</th>--}}
                    {{--                        <th>Số lượng tối đa</th>--}}
                    <th>Chức năng</th>
                    </thead>
                </table>
                <div class="modal fade" id="detail-modal" data-keyboard="false" data-backdrop="static" tabindex="-1"
                     role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content " id="container-modal">
                            @include('app.chart.detail');
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
        <script src="../js/component/app/checkin/index.js"></script>
        <script src="../js/component/app/chart/index.js"></script>

    @endpush
@endsection
