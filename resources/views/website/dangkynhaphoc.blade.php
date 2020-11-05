@extends('layouts.index')
@section('index')
    <head>
        <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Vendor CSS-->
        <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="../css/main.css" rel="stylesheet" media="all">
    </head>
    <section class="signup">
        <div class="container">
            <div class="page-wrapper p-t-180 p-b-100 font-poppins">
                <div class="wrapper wrapper--w960">
                    <div class="card card-3">
                        <div class="card-heading"></div>
                        <div class="card-body">
                            <div id="dangkinhaphoc">
                                <h2 class="title">Đăng kí nhập học</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="title-tiny">Thông tin của bé</h4>
                                        <div class="input-group">
                                            <input class="input--style-3" id="ten-hocsinh" type="text"
                                                   placeholder="Họ và tên của bé" name="name">
                                        </div>
                                        <div class="input-group">
                                            <input class="input--style-3 js-datepicker" id="ngay-sinh" type="text"
                                                   placeholder="Ngày sinh"  name="birthday">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                        <div class="input-group">
                                            <select class="form-control" id="gender">
                                                <option disabled="disabled" selected="selected">Giới tính</option>
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <input class="input--style-3" id="ho-khau-thuong-tru"
                                                   placeholder="Hộ khẩu thương trú" ">
                                        </div>
                                        <div class="input-group">
                                            <input class="input--style-3" type="text" id="dia-chi"
                                                   placeholder="Chỗ ở hiện nay" name="phone">
                                        </div>
                                        <div class="input-group">
                                            <input class="input--style-3" type="text" id="suc-khoe"
                                                   placeholder="Tình trạng sức khỏe của bé" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="color: white">
                                        <div class="row">
                                            <label class="col-sm-4 title-tiny">Người thân</label>
                                            <label class="col-sm-8">
                                                <div class="form-radio d-flex flex-row" id="nguoithan">
                                                    <div class="radio radio-inline">
                                                        <label  style="color: white">
                                                            <input type="radio" name="status" checked
                                                                   value="1">
                                                            <i class="helper"></i>Cha mẹ
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <label  style="color: white">
                                                            <input type="radio" name="status"
                                                                   value="2">
                                                            <i class="helper"></i>Người thân
                                                        </label>
                                                    </div>
                                                </div>
                                            </label>

                                        </div>
                                        <div id="chavame" class="row">
                                            <div class="col-lg-12">
                                                <h4 class="title-tiny">Thông tin của bố</h4>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text" id="ho-ten-bo"
                                                           placeholder="Họ và tên bố" name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3 sdt" type="text" id="sdt-bo"
                                                           placeholder="Số điện thoại" name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="email" id="mail-bo"
                                                           placeholder="Địa chỉ email" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h4 class="title-tiny">Thông tin của mẹ</h4>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text" id="ho-ten-me"
                                                           placeholder="Họ và tên mẹ" name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3 sdt" type="text" id="sdt-me"
                                                           placeholder="Số điện thoại" name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text" id="mail-me"
                                                           placeholder="Địa chỉ email" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="phuhuynh" class="row d-none">
                                            <div class="col-lg-12">
                                                <h4 class="title-tiny">Thông tin của người đứng xin</h4>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text" id="ho-ten-ph"
                                                           placeholder="Họ và tên " name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text" id="sdt-ph"
                                                           placeholder="Số điện thoại" name="phone">
                                                </div>
                                                <div class="input-group">
                                                    <input class="input--style-3" type="text"  id="mail-ph"
                                                           placeholder="Địa chỉ email" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="p-t-10">
                                    <button class="btn btn--pill btn--green" id="submit" onclick="create()">Đăng kí</button>
                                </div>
                            </div>
                            <div id="camon" class="d-none" style="color:white;">
                                <h3 class="text-center">Cảm ơn quý phụ huynh</h3>
                                <h4 class="m-t-5">Quý phụ huynh vui lòng kiểm tra mail. Kết quả sớm về việc đăng kí nhập
                                    học sẽ được thông báo sớm nhất</h4>
                                <h4 class="m-t-5 text-center">Trân trọng</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @push('script')
        {{--            <script src="../vendor/jquery/jquery.min.js"></script>--}}
        <!-- Vendor JS-->
            <script src="../vendor/select2/select2.min.js"></script>
            <script src="../vendor/datepicker/moment.min.js"></script>
            <script src="../vendor/datepicker/daterangepicker.js"></script>
            <!-- Main JS-->
            <script src="../js/component/dknhaphoc/index.js"></script>
            <script src="../js/component/dknhaphoc/create.js"></script>
        @endpush
    </section>
@endsection
