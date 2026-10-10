<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA')
    </title>

    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/img/brand/favicon.png') }}">


    {{-- BOOTSTRAP --}}
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}">


    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/landing.css') }}">

    @stack('styles')

</head>


<body>

    @include('template.navbarlanding')


    @yield('content')


    @include('template.footerlanding')


    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')

</body>

</html>