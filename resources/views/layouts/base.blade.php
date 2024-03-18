<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:01 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js'"></script>

    <title> @yield('title') | {{ config('app.name', 'MindCad') }} </title>

    @yield('style')
 @livewireStyles()
    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    {{-- @include('sweetalert::alert') --}}
    <div class="inner-wrapper">

        {{-- <div id="loader-wrapper">
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div> --}}

        {{-- Start Header  --}}
        @include('include.header')

        {{-- End Header --}}
        .
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    {{-- start navbar --}}
                    @include('include.navbar')
                    @yield('navbar')
                    {{-- End Navbar --}}
                    <div class="col-xl-9 col-lg-8  col-md-12">
                        {{-- @include('include.breadcard') --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="sidebar-overlay" id="sidebar_overlay"></div>
    @yield('script')
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/script.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="647b56e7c0d4cdeba6be909f-|49" defer></script>
@livewireScripts()
    </body>

</html>
