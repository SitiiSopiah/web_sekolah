<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">

    <div class="container">
        <a href="{{ url('/') }}"
           class="navbar-brand d-flex align-items-center py-2">

            @if(isset($profil) && $profil && $profil->logo)

                <img src="{{ asset('storage/' . $profil->logo) }}"
                     alt="Logo Sekolah"
                     class="mr-3"
                     style="
                        width:48px;
                        height:48px;
                        object-fit:contain;
                     ">

            @else

                <img src="{{ asset('assets/img/brand/favicon.png') }}"
                     alt="Logo Sekolah"
                     class="mr-3"
                     style="
                        width:48px;
                        height:48px;
                        object-fit:contain;
                     ">

            @endif
            
            <div class="d-flex flex-column justify-content-center">

                <span style="
                    color:#173d2d;
                    font-size:17px;
                    font-weight:700;
                    line-height:1.2;
                    white-space:nowrap;
                ">
                    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                </span>
                <small style="
                    color:#4e9a72;
                    font-size:9px;
                    letter-spacing:1.5px;
                    margin-top:5px;
                    white-space:nowrap;
                ">
                    SISTEM INFORMASI SEKOLAH
                </small>
            </div>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSekolah"
                aria-controls="navbarSekolah"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbarSekolah">
            <ul class="navbar-nav ml-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                    href="{{ url('/#beranda') }}">
                        BERANDA
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.profil_sekolah') ? 'active' : '' }}"
                    href="{{ route('public.profil_sekolah') }}">
                        TENTANG
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.guru') ? 'active' : '' }}"
                    href="{{ route('public.guru') }}">
                        GURU &amp; STAFF
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.galeri') ? 'active' : '' }}"
                    href="{{ route('public.galeri') }}">
                        GALERI
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.prestasi', 'public.ekstrakurikuler') ? 'active' : '' }}"
                    href="#"
                    id="PojokSiswaDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                        POJOK SISWA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="PojokSiswaDropdown">
                        <a class="dropdown-item {{ request()->routeIs('public.prestasi') ? 'active' : '' }}"
                        href="{{ route('public.prestasi') }}">
                            <i class="fas fa-trophy mr-2"></i> Prestasi
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('public.ekstrakurikuler') ? 'active' : '' }}"
                        href="{{ route('public.ekstrakurikuler') }}">
                            <i class="fas fa-running mr-2"></i> Ekstrakurikuler
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.berita', 'public.pengumuman') ? 'active' : '' }}"
                    href="#"
                    id="informasiDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                        INFORMASI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="informasiDropdown">
                        <a class="dropdown-item {{ request()->routeIs('public.berita') ? 'active' : '' }}"
                        href="{{ route('public.berita') }}">
                            <i class="fas fa-newspaper mr-2"></i> Berita
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('public.pengumuman') ? 'active' : '' }}"
                        href="{{ route('public.pengumuman') }}">
                            <i class="fas fa-bullhorn mr-2"></i> Pengumuman
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.ujikom') ? 'active' : '' }}"
                    href="{{ route('public.ujikom') }}">
                        UJIKOM
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="pe-5">
        <a href="{{ route('login') }}"
            class="btn btn-green">
            <i class="fas fa-user"></i>
            Login
        </a>
    </div>
</nav>