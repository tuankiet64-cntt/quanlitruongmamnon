<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mầm non vũ trụ xanh </title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\owl.carousel\css\owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\owl.carousel\css\owl.theme.default.css">
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\swiper\css\swiper.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\newstyle.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="..\files\AlertifyJS\build\css\alertify.css">
</head>
<body>
<section class="header-fixed" style="background-color:deeppink;color: white;position: sticky;top: 0px;z-index: 999999">
    <div class="container ">
        <div class="navheader" style="clear: both">
            <div class="col-auto">
                <a href="/"><img src="..\images\logo\logo.png" style="height: 40px;width: 40px;border-radius: 20px"></a>
            </div>
            <div class="col-auto">
                <nav>
                    <ul class="navmenu li">
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="{{route('registration.nhaphoc.index')}}">
                                Đăng ký nhập học
                            </a></li>
                        <li><a href="{{route('tintuc.tintuc.index')}}">Tin tức</a></li>
                        <li><a href="{{route('contact.contact.index')}}">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="main-body" style="background-color: white">
    @yield('index')
</div>
<div class="footer-custome" style="">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <H4 class="sub-title" style="color: white;margin-bottom: 10px">Đăng ký tham quan</H4>
                    Hãy để con bạn đến thăm và trải nghiệm miễn phí môi trường giáo dục hữu cơ để phát triển tốt nhất tại Vũ trụ
                    <br>
                    <a class="btn btn-success btn-round" href="{{route('registration.nhaphoc.index')}}" style="margin-top: 33px">Đăng ký ngay</a>
                </div>
                <div class="col-5">
                    <H4 class="sub-title" style="color: white;margin-bottom: 10px">Thông tin trường mầm non vũ trụ</H4>
                    <ul class="navmenu flex-column" style="margin: 0 0px;">
                        <li>SĐT:02854263673</li>
                        <li>Địa chỉ: 123 Âu cơ P.Tây thạnh Q. Tân phú</li>
                        <li>Email:Mamnonvutru@gmail.com</li>
                        <li>Fax:022364787</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>

<!-- owl carousel 2 js -->
<script type="text/javascript" src="..\files\bower_components\owl.carousel\js\owl.carousel.min.js"></script>
<script type="text/javascript" src="..\files\assets\js\owl-custom.js"></script>
<!-- swiper js -->
<script type="text/javascript" src="..\files\bower_components\swiper\js\swiper.min.js"></script>
<script type="text/javascript" src="..\files\assets\js\swiper-custom.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript"
        src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<script src="..\files\assets\js\pcoded.min.js"></script>
<script src="..\files\assets\js\vartical-layout.min.js"></script>
<script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="..\files\assets\js\script.js"></script>
<script type="text/javascript" src="..\js\shared.js"></script>
<script type="text/javascript" src="..\js\validate.js"></script>
<script src="..\files\AlertifyJS\build\alertify.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('script')
<footer>
    <div class="container-fluid text-center" style="background-color: black;color: white;padding: 20px 0">Copyright Mầm
        non thiên hà
    </div>
</footer>
</html>
