@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lí xếp lớp</h4>
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
                                    href="{{route('quanlixeplop.quanlixeplop.index')}}">Quản lí xếp lớp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="card">
                <div class="container">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12  form-group ">
                                <div class="float-right d-flex flex-row">
                                    <label style="margin: 7px 9px">Lớp:</label>
                                    <select id="chonlop" class="form-control js-example-basic-single">
                                        <option value="" class="text-center" selected  disabled>Chọn lớp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table table-border-style  col-lg-5">
                                <div class="d-flex justify-content-between">
                                    <h4 class="sub-title">Học sinh chưa có lớp 	&nbsp<label class="badge badge-lg bg-warning" id="checked"></label></h4>
                                    <h4 class="sub-title">Số lượng còn lại &nbsp<label class="badge badge-lg bg-warning" id="Cothethem"></label></h4>
                                </div>
                                <table class="table table-border-style" id="tbchuacolop">
                                    <thead>
                                    <th>
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr">
                                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                        </span>

                                            </label>
                                        </div>
                                    </th>
                                    <th>Tên</th>
                                    <th>Tuổi</th>
                                    <th>Giới tính</th>
                                    <th>Sức khỏe</th>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-lg-1 d-flex justify-content-center flex-column">
                                <button class="btn btn-primary" onclick="getid()"><i class="icofont icofont-exchange"></i></button>
                            </div>
                            <div class="table table-border-style  col-lg-6">
                                <div class="d-flex justify-content-between">
                                    <h4 class="sub-title">Học sinh đã có lớp &nbsp<label class="badge badge-lg bg-warning" id="dacolop"></label></h4>
                                    <h4 class="sub-title">Độ tuổi &nbsp<label class="badge badge-lg bg-warning" id="dotuoi"></label></h4>
                                    <h4 class="sub-title">Số lượng tối đa &nbsp<label class="badge badge-lg bg-warning" id="toida"></label></h4>
                                </div>
                                <table class="table table-border-style" id="tbdacolop">
                                    <thead>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Tuổi</th>
                                    <th>Giới tính</th>
                                    <th>Chức năng</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('script')
        <script src="../js/component/app/quanlixeplop/index.js"></script>
        <script src="../js/component/app/quanlixeplop/update.js"></script>
    @endpush
@endsection
