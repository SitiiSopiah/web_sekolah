<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
    </title>

    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/img/brand/favicon.png') }}">


    {{-- ARGON / FONT --}}
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/argon.css?v=1.0.0') }}">


    {{-- CSS TAMBAHAN --}}
    @stack('css')
    <style>
        .btn-green {
            background-color: #006b3c;
            border-color: #006b3c;
            color: #fff !important;
            font-weight: 600;
        }

        .btn-green:hover {
            background-color: #00552f;
            border-color: #00552f;
            color: #fff !important;
        }
    </style>

</head>


<body>

    @auth
        @include('layouts.navbars.sidebar')
    @endauth

    <main class="main-content">

        @auth
            @include('layouts.navbars.navbar')
        @endauth


        @yield('content')

    </main>

    @auth

        <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display: none;">

            @csrf

        </form>

    @endauth


    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>


    @stack('js')

</body>

</html>