<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <style>
            /* Menu utama yang aktif */
            .sidenav .navbar-nav > .nav-item > .nav-link.active {
                background-color: #f6f9fc;
                border-radius: 0.375rem;
                color: #5e72e4;
            }

            /* Submenu yang aktif */
            .sidenav .navbar-nav .nav-sm .nav-link.active {
                background-color: #f6f9fc;
                border-radius: 0.375rem;
                color: #5e72e4;
            }
        </style>
    </head>
    <body class="{{ $class ?? '' }}">
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
        
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>
        
        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>
    </body>
</html>