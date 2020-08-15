<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forum Komunikasi Puspa Jawa Barat</title>
    <!-- <link rel="icon" href="img/favicon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('front/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('front/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('front/css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('front/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ url('front/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('front/css/style.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    @yield('style')
</head>

<body>
    <!--::header part start::-->
    @yield('header')
    <!-- Header part end-->

    <!-- banner part start-->
    @yield('banner')
    <!-- banner part start-->

    <!-- learning part start-->
    @yield('content')
    <!--::blog_part end::-->
    
    <!-- footer part start-->
    @include('partials._footer')
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ url('front/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('front/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('front/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ url('front/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('front/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('front/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ url('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('front/js/jquery.nice-select.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('front/js/slick.min.js') }}"></script>
    <script src="{{ url('front/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('front/js/waypoints.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('front/js/custom.js') }}"></script>

    @yield('script')
</body>

</html>