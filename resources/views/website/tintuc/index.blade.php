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
    <section class="tintuc">
        <div class="container" style="margin-top: 44px">
            <div id="tintuc" class="row">

            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example" >
                    <ul class="pagination justify-content-center" id="phantrang">
                    </ul>
                </nav>
            </div>
        </div>
    @push('script')
        {{--            <script src="../vendor/jquery/jquery.min.js"></script>--}}
        <!-- Vendor JS-->
            <script src="../vendor/select2/select2.min.js"></script>
            <script src="../vendor/datepicker/moment.min.js"></script>
            <script src="../vendor/datepicker/daterangepicker.js"></script>
            <!-- Main JS-->

            <script src="../js/component/tintuc/index.js"></script>
{{--            <script src="../js/component/dknhaphoc/create.js"></script>--}}
        @endpush
    </section>
@endsection
