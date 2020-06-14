<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furniture Store</title>
    <base href="{{asset('')}}">
    <link rel="icon" type="image/png" href="images/icon/favicon.png">
    <!-- CSS -->
    @yield('head')
    <!-- Plugin -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/dist/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/slick/slick.css">
    <link rel="stylesheet" href="vendor/animate/animate.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">

    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="vendor/revolution/css/settings.css">
    <link rel="stylesheet" href="vendor/revolution/css/layers.css">
    <link rel="stylesheet" href="vendor/revolution/css/navigation.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="vendor/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-face.min.css">

    <!-- Customize -->
    <link rel="stylesheet" href="css/theme.min.css">

</head>

<body>


<!-- Header -->
@include('layout/header')
<!-- End Heder -->

@yield('content')

<!-- Footer -->
@include('layout/footer')
<!-- End Footer -->
<!-- __________JS__________ -->

<!-- Plugin -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery-ui.min.js"></script>
<script src="vendor/easing/jquery.easing.min.js"></script>
<script src="vendor/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="vendor/isotope/isotope.js"></script>
<script src="vendor/slick/slick.js"></script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/lightcase/lightcase.js"></script>

<!-- Slider Revolution core JavaScript files -->
<script src="vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- CountDown -->
<script src="vendor/countdowntime/moment.min.js"></script>
<script src="vendor/countdowntime/moment-timezone.min.js"></script>
<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<!-- Customize -->
<script src="js/config-slider.min.js"></script>
<script src="js/config-owl-carousel.min.js"></script>
<script src="js/config-grid.min.js"></script>
<script src="js/config-slick.min.js"></script>
<script src="js/config-countdown.min.js"></script>
<script src="js/config-wow.min.js"></script>
<script src="js/config-lightcase.min.js"></script>
<script src="js/theme.min.js"></script>

@yield('javascript')
</body>

</html>
