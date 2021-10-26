<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Lonestar || Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('storage/img/favicon.ico')}} " type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets/admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">


    <!-- Sweet Alert Css -->
    <link href="{{asset('assets/admin/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/admin/css/themes/all-themes.css')}}" rel="stylesheet" />
 

    <!-- CSRF Token -->
    

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
   {{--  <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 --}}
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
 --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    {{-- Footer Scripts --}}

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('assets/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('assets/admin/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/admin/plugins/node-waves/waves.js')}}"></script>
  <!-- Jquery Validation Plugin Css -->
  <script src="{{ asset('assets/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>

  <!-- JQuery Steps Plugin Js -->
  <script src="{{ asset('assets/admin/plugins/jquery-steps/jquery.steps.js')}}"></script>
<!-- Ckeditor -->
<script src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>

  <!-- Sweet Alert Plugin Js -->
  <script src="{{ asset('assets/admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('assets/admin/js/admin.js')}}"></script>
    <script src="{{ asset('assets/admin/js/pages/forms/form-wizard.js')}}"></script>
    <script src="{{ asset('assets/admin/js/pages/forms/editors.js')}}"></script>
    <script src="{{ asset('assets/admin/js/pages/widgets/infobox/infobox-2.js')}}"></script>
    <script src="{{ asset('assets/admin/js/pages/forms/advanced-form-elements.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/examples/sign-in.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/examples/sign-up.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>
</body>
</html>
