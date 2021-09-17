<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Research Production extension</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/front-end/img/logo.jpg')}}" rel="icon">
  <link href="{{ asset('assets/front-end/img/logo.jpg')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/front-end/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/front-end/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/front-end/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.3.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <section>
    {{-- Navigation Bars --}}
    @include('front-end.partials.navigation');


    @yield('content')

    @include('front-end.partials.footer');
  
</section>

<script src="{{ asset('assets/front-end/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/front-end/vendor/php-email-form/validate.js')}}"></script>
<script src="{{ asset('assets/front-end/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{ asset('assets/front-end/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/front-end/js/main.js')}}"></script>

</body>

</html>
