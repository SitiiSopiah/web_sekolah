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
        #sidenav-main {
            transition: transform 0.3s ease;
        }

        /* Sidebar ketika dibuka di layar mobile */
        @media (max-width: 991.98px) {
            #sidenav-main {
                transform: translateX(-100%);
                z-index: 1050;
            }

            #sidenav-main.sidebar-open {
                transform: translateX(0);
            }
        }

        /* Tombol toggle di kiri navbar */
        #sidebarToggle {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            padding: 0;
            margin-right: 15px;
            flex-shrink: 0;
        }

        /* Navbar: toggle kiri, admin kanan */
        #navbar-main .container-fluid {
            display: flex;
            align-items: center;
        }

        #navbar-main .navbar-nav {
            margin-left: auto;
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidenav-main');
            const toggle = document.getElementById('sidebarToggle');

            if (!sidebar || !toggle) return;

            toggle.addEventListener('click', function () {
                sidebar.classList.toggle('sidebar-open');
                document.body.classList.toggle('sidebar-active');
            });

            document.addEventListener('click', function (event) {
                if (
                    window.innerWidth <= 991.98 &&
                    sidebar.classList.contains('sidebar-open') &&
                    !sidebar.contains(event.target) &&
                    !toggle.contains(event.target)
                ) {
                    sidebar.classList.remove('sidebar-open');
                    document.body.classList.remove('sidebar-active');
                }
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 991.98) {
                    sidebar.classList.remove('sidebar-open');
                    document.body.classList.remove('sidebar-active');
                }
            });
        });
    </script>

</body>

</html>