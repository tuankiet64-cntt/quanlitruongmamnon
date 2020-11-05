@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Quản lí xếp lớp cho giáo viên</h4>
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
                                    href="{{route('quanlixeplop.quanlixeplop-giaovien.index')}}">Quản lí xếp lớp cho giáo viên</a>
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
                        <input type="text" class="d-none" id="idgv">
                        <input type="text" class="d-none" id="idlichhoc">
                        <div class="row">
                            <div class="table table-border-style  col-lg-12" style="width: 100%">
                                <table class="table table-border-style " id="tablegv">
                                    <thead>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Tuổi</th>
                                    <th>Giới tính</th>
                                    <th>Lịch dạy</th>
                                    <th>Lớp</th>
                                    <th>Chức năng</th>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal fade" id="update-modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content " id="container-modal">
                                        @include('app.quanlixeplop.giaovien.update');
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
        <script src="../js/component/app/quanlixeplop/giaovien/index.js"></script>
        {{--        <scripTsrc="../js/component/app/quanlixeplop/update.js"></script>--}}
    @endpush
@endsection
