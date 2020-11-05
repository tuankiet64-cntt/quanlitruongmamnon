@extends('layouts.index')
@section('index')
<section id="sliderbar">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid w-100" src="..\images\1.jpg" style="height: 800px" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="..\images\2.jpg" style="height: 800px" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="..\images\3.jpg" style="height: 800px" alt="Third slide">
                </div>
                {{--                    <div class="carousel-item">--}}
                {{--                        <img class="d-block img-fluid w-100" src="..\files\assets\images\slider\slide4.jpg" alt="Third slide">--}}
                {{--                    </div>--}}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<section id="bodypage">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <img src="..\images\logo\logo 1.png" alt="">
                <div class="h4" style="color:#009066">Cá nhân hóa kế hoạch phát triển</div>
                <div>Chúng tôi tôn trọng sự khác biệt cá nhân và có những kế hoạch giáo dục riêng để trẻ có thể phát triển tối ưu toàn diện trong một môi trường chất lượng cao.</div>
            </div>
            <div class="col-lg-4 text-center">
                <img src="..\images\logo\logo 2.png" alt="">
                <div class="h4" style="color:#f99f38;padding-top: 14px">Khỏe mạnh và an toàn</div>
                <div>Sức khỏe và sự an toàn của con bạn là điều vô cùng quan trọng với chúng tôi. Chúng tôi áp dụng những tiêu chuẩn quốc tế tốt nhất về sức khỏe và an toàn trong mọi hoạt động</div>
            </div>
            <div class="col-lg-4 text-center">
                <img src="..\images\logo\logo 3.png" alt="">
                <div class="h4" style="color:#523c32;padding-top: 5px;
}">Cộng đồng Cha Mẹ gắn kết</div>
                <div>Chúng tôi luôn theo sát và hợp tác chặt chẽ với gia đình để cùng tạo nên một môi trường xuyên suốt và thống nhất cho sự phát triển của con bạn.</div>
            </div>
        </div>
    </div>
</section>
@endsection
