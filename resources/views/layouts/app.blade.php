<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.crumina.net/html-olympus/01-LandingPage.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jan 2019 07:39:27 GMT -->

<head>

    <title>Landing Page</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Main Font -->
    <script src="{{ url('/frontEnd/js/webfontloader.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>    
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/Bootstrap/dist/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/Bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/Bootstrap/dist/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}" type="text/css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/frontend/css/main.min.css') }}">




</head>

<body class="landing-page">

<div class="content-bg-wrap"></div>


<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="header--standard-wrap">

            <a href="#" class="logo">
                <div class="img-wrap">
                    <img src="{{ url('/frontEnd/img/logo.png') }}" alt="Olympus">
                    <img src="{{ url('/frontEnd/img/logo-colored-small.png') }}" alt="Olympus" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">olympus</h6>
                    <div class="sub-title">شبکه اجتماعی</div>
                </div>
            </a>

            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                </svg>
            </a>

        </div>
    </div>
</div>

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>

@yield('content')



<!-- JS Scripts -->
<script src="{{ url('/frontEnd/js/jquery-3.2.1.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.appear.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.mousewheel.js') }}"></script>
<script src="{{ url('/frontEnd/js/perfect-scrollbar.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.matchHeight.js') }}"></script>
<script src="{{ url('/frontEnd/js/svgxuse.js') }}"></script>
<script src="{{ url('/frontEnd/js/imagesloaded.pkgd.js') }}"></script>
<script src="{{ url('/frontEnd/js/Headroom.js') }}"></script>
<script src="{{ url('/frontEnd/js/velocity.js') }}"></script>
<script src="{{ url('/frontEnd/js/ScrollMagic.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.waypoints.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.countTo.js') }}"></script>
<script src="{{ url('/frontEnd/js/popper.min.js') }}"></script>
<script src="{{ url('/frontEnd/js/material.min.js') }}"></script>
<script src="{{ url('/frontEnd/js/bootstrap-select.js') }}"></script>
<script src="{{ url('/frontEnd/js/smooth-scroll.js') }}"></script>
<script src="{{ url('/frontEnd/js/selectize.js') }}"></script>
<script src="{{ url('/frontEnd/js/swiper.jquery.js') }}"></script>
<script src="{{ url('/frontEnd/js/moment.js') }}"></script>
<script src="{{ url('/frontEnd/js/daterangepicker.js') }}"></script>
<script src="{{ url('/frontEnd/js/simplecalendar.js') }}"></script>
<script src="{{ url('/frontEnd/js/fullcalendar.js') }}"></script>
<script src="{{ url('/frontEnd/js/isotope.pkgd.js') }}"></script>
<script src="{{ url('/frontEnd/js/ajax-pagination.js') }}"></script>
<script src="{{ url('/frontEnd/js/Chart.js') }}"></script>
<script src="{{ url('/frontEnd/js/chartjs-plugin-deferred.js') }}"></script>
<script src="{{ url('/frontEnd/js/circle-progress.js') }}"></script>
<script src="{{ url('/frontEnd/js/loader.js') }}"></script>
<script src="{{ url('/frontEnd/js/run-chart.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ url('/frontEnd/js/jquery.gifplayer.js') }}"></script>
<script src="{{ url('/frontEnd/js/mediaelement-and-player.js') }}"></script>
<script src="{{ url('/frontEnd/js/mediaelement-playlist-plugin.min.js') }}"></script>
<script src="{{ url('/frontEnd/js/ha-solardate.min.js') }}"></script>
<script src="{{ url('/frontEnd/js/ha-datetimepicker.min.js') }}"></script>

<script src="{{ url('/frontEnd/js/base-init.js') }}"></script>
<script defer src="{{ url('/frontEnd/fonts/fontawesome-all.js') }}"></script>

<script src="{{ url('/frontEnd/Bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
<!-- Include this after the sweet alert js file -->
<script src="{{ url('js/sweetalert2.min.js') }}"></script>
@include('sweet::alert')
</body>

<!-- Mirrored from html.crumina.net/html-olympus/01-LandingPage.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Jan 2019 07:39:27 GMT -->

</html>
