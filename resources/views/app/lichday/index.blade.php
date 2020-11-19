@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lí lịch dạy</h4>
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
                                    href="{{route('lichday.lichday.index')}}">Quản lí lịch dạy </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="container">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="sub-title">Danh sách lớp</h4>
                        <input type="text" class="d-none" id="idgv">
                        <input type="text" class="d-none" id="idlichhoc">
                        <input type="text" class="d-none" id="chonlop">
                        <div class="row">
                            <div class="table table-border-style  col-lg-12" style="width: 100%">
                                <table class="table table-border-style " id="tableclass">
                                    <thead>
                                    <th>STT</th>
                                    <th>Tên lớp</th>
                                    <th>Lớp tuổi</th>
                                    <th>Số lượng lịch dạy</th>
                                    <th>Tình trạng</th>
                                    {{--                                    <th>Giáo viên</th>--}}
{{--                                    <th>Lớp</th>--}}
                                    <th>Chức năng</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h4 class="sub-title">Danh sách lịch học của lớp :<span id="class"></span> </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 p-b-10">
                                <button class="btn btn-primary btn-square float-right" onclick="openmodalCreate()">Tạo lịch dạy</button>
                            </div>
                            <div class="table table-border-style  col-lg-12" style="width: 100%">
                                <table class="table table-border-style " id="tablelichday">
                                    <thead>
                                    <th>STT</th>
                                    <th>Tên giáo viên</th>
                                    <th>Ngày dạy</th>
                                    {{--                                    <th>Giáo viên</th>--}}
                                    {{--                                    <th>Lớp</th>--}}
                                    <th>Chức năng</th>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal fade" id="create-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content " id="container-modal">
                                        @include('app.lichday.create');
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content " id="container-modal">
                                        @include('app.lichday.update');
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="add-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content " id="container-modal">
                                        @include('app.lichday.giaovien');
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('script')
        <script src="../js/component/app/lichday/index.js"></script>
        <script src="../js/component/app/lichday/add.js"></script>
        <script src="../js/component/app/lichday/update.js"></script>
        {{--        <scripTsrc="../js/component/app/quanlixeplop/update.js"></script>--}}
    @endpush
@endsection
