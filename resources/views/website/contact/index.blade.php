@extends('layouts.index')
@section('index')
    <head>
        <title>Add Map</title>
        <script  defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWBt3QuLOZHZCyyTGmFEKp0MzrK81W77k&callback=initMap"
                type="text/javascript">

        </script>
        <!-- jsFiddle will insert css and js -->
        <style>
            /* Set the size of the div element that contains the map */
            #map {
                height: 400px;
                /* The height is 400 pixels */
                width: 100%;
                /* The width is the width of the web page */
            }
            .lienhe {
                height: 110px;
                background-image: url("./images/background chu.jpg");
                font-size: 30px;
                margin-bottom: 20px;
            }
            .style>div {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    <!--The div element for the map -->
    <div class="container-fluid d-flex justify-content-center align-items-center lienhe">
        <label>Liên hệ </label>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 style">
                <div class="sub-title">Trường mầm non vũ trụ xanh</div>
                <div style="font-size: 30px"><i class="fa fa-mobile-phone"></i>&nbspHãy liên hệ với chúng tôi</div>
                <div>Số điện thoại:028 3842 8858</div>
                <div>Email:vutruxanh@gmail.com</div>
            </div>
            <div class="col-lg-6">
                <div id="map"></div>
            </div>
        </div>
    </div>
    </body>
    <script>
        function initMap() {
            // The location of Uluru
            const local = {lat: 10.791556155170037, lng: 106.64058259882296};
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: local,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: local,
                map: map,
            });
        }
    </script>
@endsection
