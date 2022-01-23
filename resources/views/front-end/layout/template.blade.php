<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Research Production extension</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('assets/front-end/img/logo.jpg') }}" rel="icon">
    <link href="{{ asset('assets/front-end/img/logo.jpg') }}" rel="apple-touch-icon">

   {{--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  --}}
    <!-- Google Fonts -->
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> 
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- Template Main CSS File -->


    <!-- Jquery Core Js -->

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <link href="{{ asset('assets/front-end/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front-end/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
   
  {{--   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 --}}

    <link href="{{ asset('assets/front-end/css/style.css') }}" rel="stylesheet">
   







</head>

<body>

    <div id="app">
        <section>
            {{-- Navigation Bars --}}
            @include('front-end.partials.navigation');


            @yield('content')

            @include('front-end.partials.footer');

        </section>
    </div>
    {{-- <script src="{{asset('assets/front-end/js/jquery.min.js')}}"></script> --}}
    <script src="{{ asset('assets/front-end/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/front-end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/front-end/vendor/php-email-form/validate.js')}}"></script> --}}
    <script src="{{ asset('assets/front-end/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/front-end/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

    <!-- Template Main JS File -->


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/front-end/js/main.js') }}"></script>
  

</body>

</html>
