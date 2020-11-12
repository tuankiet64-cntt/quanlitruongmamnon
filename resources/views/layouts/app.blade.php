<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Trường mầm non vũ trụ</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
          content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="..\files\bower_components\select2\css\select2.min.css">
    <!-- Style.css -->

    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"
          href="..\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\pages\data-table\css\buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="..\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="..\files\assets\pages\data-table\extensions\responsive\css\responsive.dataTables.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\datetimepicker\jquery.datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\ckeditor\plugins\cloudservices\plugin.js">
    <link rel="stylesheet" type="text/css"
          href="..\files\bower_components\ckeditor\samples\toolbarconfigurator\lib\codemirror\neo.css">

{{--    datetimepicker--}}
<!-- Sweetalert.css -->
    <link rel="stylesheet" type="text/css"
          href="..\files\bower_components\sweetalert\css\sweetalert.css">
    <link rel="stylesheet" type="text/css"
          href="..\files\bower_components\sweetalert\css\sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
</head>
<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="/home">
                        <img class="img-fluid" src="..\files\assets\images\logo.png" alt="Theme-Logo">
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i
                                            class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <span class="badge bg-c-pink">5</span>
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
                                    data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                 src="..\files\assets\images\avatar-4.jpg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                 src="..\files\assets\images\avatar-3.jpg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                 src="..\files\assets\images\avatar-4.jpg"
                                                 alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <span class="badge bg-c-green">3</span>
                                </div>
                            </div>
                        </li>
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="..\files\assets\images\avatar-4.jpg" class="img-radius"
                                         alt="User-Profile-Image">
                                    <span>{{Auth::user()->name}}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu"
                                    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#!">--}}
                                    {{--                                            <i class="feather icon-settings"></i> Settings--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    <li>
                                        <a href="{{route('user.user.index')}}">
                                            <i class="feather icon-user"></i> Thông tin cá nhân
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.password.index')}}">
                                            <i class="feather icon-settings"></i> Đổi mật khẩu
                                        </a>
                                    </li>
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="auth-lock-screen.htm">--}}
                                    {{--                                            <i class="feather icon-lock"></i> Lock Screen--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    <li>
                                        <a href="{{route('logout')}}">
                                            <i class="feather icon-log-out"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend"
                                           id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                            <div class="media userlist-box" data-id="1" data-status="online"
                                 data-username="Josephin Doe" data-toggle="tooltip" data-placement="left"
                                 title="Josephin Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius img-radius"
                                         src="..\files\assets\images\avatar-3.jpg" alt="Generic placeholder image ">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Josephin Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe"
                                 data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg"
                                         alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Lary Doe</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice"
                                 data-toggle="tooltip" data-placement="left" title="Alice">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-4.jpg"
                                         alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alice</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia"
                                 data-toggle="tooltip" data-placement="left" title="Alia">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-3.jpg"
                                         alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Alia</div>
                                </div>
                            </div>
                            <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen"
                                 data-toggle="tooltip" data-placement="left" title="Suzen">
                                <a class="media-left" href="#!">
                                    <img class="media-object img-radius" src="..\files\assets\images\avatar-2.jpg"
                                         alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header">Suzen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat start-->
        <div class="showChat_inner">
            <div class="media chat-inner-header">
                <a class="back_chatBox">
                    <i class="feather icon-chevron-left"></i> Josephin Doe
                </a>
            </div>
            <div class="media chat-messages">
                <a class="media-left photo-table" href="#!">
                    <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-3.jpg"
                         alt="Generic placeholder image">
                </a>
                <div class="media-body chat-menu-content">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
            </div>
            <div class="media chat-messages">
                <div class="media-body chat-menu-reply">
                    <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                    </div>
                </div>
                <div class="media-right photo-table">
                    <a href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="..\files\assets\images\avatar-4.jpg"
                             alt="Generic placeholder image">
                    </a>
                </div>
            </div>
            <div class="chat-reply-box p-b-20">
                <div class="right-icon-control">
                    <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                    <div class="form-icon">
                        <i class="feather icon-navigation"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <input type="text" class="d-none" value="{{Auth::user()->id}}" id="idtaikhoan">
                        @if( Auth::user()->level == 2 && Auth::user()->status ==1)
                            <div class="pcoded-navigatio-lavel">Menu Chính</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{route('diemdanh.diemdanh.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>
                                        <span class="pcoded-mtext">Điểm danh học sinh</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-cog"></i></span>
                                        <span class="pcoded-mtext">Hoạt động</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('baocaohoatdongGV.baocaohoatdongGV.index')}}">
                                                <span class="pcoded-mtext">Báo cáo hoạt động lớp</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('baocaohoatdongGV.checkhoatdongGV.index')}}">
                                                <span class="pcoded-mtext">Nhận xét</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @elseif( Auth::user()->level == 4 && Auth::user()->status ==1)
                            <div class="pcoded-navigatio-lavel">Menu Chính</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{route('quanlinhaphoc.qlnhaphoc.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-plus-square-o"></i></span>
                                        <span class="pcoded-mtext">Quản lí nhập học</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlisoyeulilich.qlsyll.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-child"></i></span>
                                        <span class="pcoded-mtext">Quản lí sơ yếu lí lịch</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-cog"></i></span>
                                        <span class="pcoded-mtext">Quản lí lớp học</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('quanlilop.quanlilop.index')}}">
                                                <span class="pcoded-mtext">Tạo và chỉnh sửa lớp</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('lenlop.lenlop.index')}}">
                                                <span class="pcoded-mtext">Lên lớp</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlihoatdong.quanlihoatdong.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>
                                        <span class="pcoded-mtext">Quản lí hoạt động lớp</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Quản lí xếp lớp</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('quanlixeplop.quanlixeplop.index')}}">
                                                <span class="pcoded-mtext">Học sinh</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('quanlixeplop.quanlixeplop-giaovien.index')}}">
                                                <span class="pcoded-mtext">Giáo viên</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlitaikhoan.quanlitaikhoan.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
                                        <span class="pcoded-mtext">Quản lí tài khoản</span>
                                    </a>
                                </li>
                            </ul>
                        @elseif( Auth::user()->level == 2 && Auth::user()->status ==1)
                            {{ "Thành viên" }}
                        @elseif( Auth::user()->level == 1 && Auth::user()->status ==1)
                            <div class="pcoded-navigatio-lavel">Menu Chính</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{route('quanlinhaphoc.qlnhaphoc.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-plus-square-o"></i></span>
                                        <span class="pcoded-mtext">Quản lí nhập học</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlisoyeulilich.qlsyll.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-child"></i></span>
                                        <span class="pcoded-mtext">Quản lí sơ yếu lí lịch</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="fa fa-cog"></i></span>
                                        <span class="pcoded-mtext">Quản lí lớp học</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('quanlilop.quanlilop.index')}}">
                                                <span class="pcoded-mtext">Tạo và chỉnh sửa lớp</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('lenlop.lenlop.index')}}">
                                                <span class="pcoded-mtext">Lên lớp</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Quản lí xếp lớp</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('quanlixeplop.quanlixeplop.index')}}">
                                                <span class="pcoded-mtext">Học sinh</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{route('quanlixeplop.quanlixeplop-giaovien.index')}}">
                                                <span class="pcoded-mtext">Giáo viên</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlihoatdong.quanlihoatdong.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>
                                        <span class="pcoded-mtext">Quản lí hoạt động lớp</span>
                                    </a>
                                </li>
{{--                                <li class="">--}}
{{--                                    <a href="{{route('baocaohoatdongGV.baocaohoatdongGV.index')}}">--}}
{{--                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>--}}
{{--                                        <span class="pcoded-mtext">Báo cáo hoạt động lớp</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="">
                                    <a href="{{route('baocaohoatdongHT.baocaohoatdongHT.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>
                                        <span class="pcoded-mtext">Báo cáo hoạt động lớp</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlitaikhoan.quanlitaikhoan.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
                                        <span class="pcoded-mtext">Quản lí tài khoản</span>
                                    </a>
                                </li>
                                {{--                                <li class="">--}}
                                {{--                                    <a href="{{route('diemdanh.diemdanh.index')}}">--}}
                                {{--                                        <span class="pcoded-micon"><i class="fa fa-check-square-o"></i></span>--}}
                                {{--                                        <span class="pcoded-mtext">Điểm danh học sinh</span>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                <li class="">
                                    <a href="{{route('cackhoangphi.cackhoangphi.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                                        <span class="pcoded-mtext">Quản lí các khoản phí</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('quanlihocphi.quanlihocphi.index')}}">
                                        <span class="pcoded-micon"><i class="fa fa-money"></i></span>
                                        <span class="pcoded-mtext">Quản lí học phí</span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <main class="container">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main-body end -->
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- Accordion js -->
    <script type="text/javascript" src="..\files\assets\pages\accordion\accordion.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript"
            src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
            src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    {{--    datatable--}}
    <script src="..\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="..\files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    {{--    <script src="..\files\assets\pages\data-table\js\jszip.min.js"></script>--}}
    {{--    <script src="..\files\assets\pages\data-table\js\pdfmake.min.js"></script>--}}
    {{--    <script src="..\files\bower_components\vfs_fonts\vfs_fonts.js"></script>--}}
    {{--    <script src="..\files\assets\pages\data-table\js\vfs_fonts.js"></script>--}}
    <script src="..\files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="..\files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="..\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    {{--    <script src="..\files\swal\dist\sweetalert2.min.js"></script>--}}
    <script type="text/javascript" src="..\files\bower_components\sweetalert\js\sweetalert2@9.js"></script>
    <!--alertify css-->
    <link rel="stylesheet" type="text/css" href="..\files\AlertifyJS\build\css\alertify.css">
    <script src="..\files\AlertifyJS\build\alertify.js"></script>
    <script type="text/javascript" src="..\js\shared.js"></script>
    <script type="text/javascript" src="..\js\validate.js"></script>
    {{--    <script src="..\files\bower_components\datetimepicker\jquery.js"></script>--}}
    <script src="..\files\bower_components\datetimepicker\build\jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\select2\js\select2.full.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\multiselect\js\jquery.multi-select.js"></script>
    <script type="text/javascript" src="..\files\bower_components\ckeditor\ckeditor.js"></script>
    <script type="text/javascript" src="..\files\bower_components\ckeditor\adapters\jquery.js"></script>
    <script type="text/javascript" src="..\files\bower_components\ckeditor\samples\js\sample.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\advance-elements\select2-custom.js"></script>
    @stack('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>

