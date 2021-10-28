<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Research Production extension</title>
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
    <link href="{{asset('assets/admin/plugins/sweetalert/sweetalert.css')}} rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/admin/css/themes/all-themes.css')}}" rel="stylesheet" />

</head>

<body class="theme-red">
  
    <section>
        {{-- Navigation Bars --}}
        @include('back-end.partials.nav-top');
        @include('back-end.partials.nav-left');
        @include('back-end.partials.nav-right');
    </section>
    
    {{-- Render Content --}}
    @yield('content')

    {{-- Footer Scripts --}}

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>

    @yield('page-script')

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
     <script src="{{ asset('assets/admin/js/pages/examples/sign-in.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/examples/sign-up.js') }}"></script>
     <script src="{{ asset('assets/admin/js/pages/examples/profile.js')}}"></script>
     <script src="{{ asset('assets/admin/js/pages/ui/tooltips-popovers.js')}}"></script>
    <!-- Demo Js -->
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>

</body>

</html>
