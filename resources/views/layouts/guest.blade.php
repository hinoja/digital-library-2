<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> @yield('title') | {{ config('app.name', 'DigitalLibrary') }}</title>

    <!--[if lt IE 9]>
         <script src="assets/js/html5shiv.min.js"></script>
         <script src="assets/js/respond.min.js"></script>
         <![endif]-->
</head>

<body>

    <div class="inner-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm grow">
                    <div class="login-left">
                        <a href="{{ route('welcome') }}"><img class="img-fluid"
                                src="{{ asset('assets/img/BERTOUA.png') }}" width="200px" height="74px"
                                alt="Logo">
                        </a>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


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
</body>

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:04 GMT -->

</html>
