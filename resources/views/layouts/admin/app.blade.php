<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/html/light/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Mar 2021 13:41:07 GMT -->
<head>
    <title>KBCPLUS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/admin/images/favicon.ico')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/morrisjs/morris.min.css')}}" />

    {{--  data table css and js  --}}

    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/sweetalert/sweetalert.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/select2/select2.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/color_skins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/background-gradient.css') }}">

 

    {{--  Extendable css  --}}

    <style>
        .preloader {
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 9999;
            background:#ffffffc2  url('{{asset('assets/admin/images/Spinner-5.gif')}}');
            background-repeat: no-repeat;
            background-position: center;
            display:none;

            }
    </style>
    @stack('css')
</head>
<body class="theme-cyan">

 <!-- Page Loader -->
 <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="https://www.wrraptheme.com/templates/lucid/html/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>


<div class="preloader"></div>
<!-- Overlay For Sidebars -->

<div id="wrapper">
    @include('layouts.admin.pertials.header')
    @include('layouts.admin.pertials.sidebar')
    @yield('content')
</div>
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>
<!-- Javascript -->
<script src="{{ asset('assets/admin/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('assets/admin/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/admin/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assets/admin/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob-->

<script src="{{ asset('assets/admin/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/js/index8.js') }}"></script>


{{-- datatable script  --}}

<script src="{{ asset('assets/admin/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{ asset('assets/admin/vendor/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->
<script src="{{ asset('assets/admin/js/pages/ui/dialogs.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{--<script src="{{ asset('assets/admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script> <!-- Bootstrap Colorpicker Js -->--}}
{{--<script src="{{ asset('assets/admin/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js -->--}}
{{--<script src="{{ asset('assets/admin/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/admin/vendor/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->--}}
{{--<script src="{{ asset('assets/admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>--}}
{{--<script src="{{ asset('assets/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->--}}
{{--<script src="{{ asset('assets/admin/vendor/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->--}}

{{--<script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}"></script> <!-- Select2 Js -->--}}
{{--<script src="{{asset('assets/admin/js/pages/forms/advanced-form-elements.js')}}"></script>--}}


{{--<script src="{{ asset('assets/admin/bundles/mainscripts.bundle.js')}}"></script>--}}
@stack('js')
@include('sweetalert::alert')


</body>
<!-- Mirrored from www.wrraptheme.com/templates/lucid/html/light/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Mar 2021 13:41:08 GMT -->
</html>
