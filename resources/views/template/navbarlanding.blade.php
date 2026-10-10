<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">

    <div class="container">

        {{-- LOGO + NAMA --}}
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


        {{-- TOGGLER --}}
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSekolah"
                aria-controls="navbarSekolah"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU --}}
        <div class="collapse navbar-collapse"
             id="navbarSekolah">

            <ul class="navbar-nav ml-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/#beranda') ? 'active' : '' }}" 
                       href="{{ url('/#beranda') }}">
                        BERANDA
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/#profil') ? 'active' : '' }}" 
                        href="{{ route('public.profil_sekolah') }}">
                        TENTANG
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/#guru') ? 'active' : '' }}" 
                       href="{{ route('public.guru') }}">
                        GURU & STAFF
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/#galeri') ? 'active' : '' }}" 
                       href="{{ route('public.galeri') }}">
                        GALERI
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="PojokSiswaDropdown"
                       role="button"
                       data-toggle="dropdown">

                        POJOK SISWA

                    </a>

                    <div class="dropdown-menu">

                        <a class="dropdown-item {{ request()->is('/#prestasi') ? 'active' : '' }}"
                            href="{{ route('public.prestasi') }}">

                            <i class="fas fa-trophy"></i>
                            Prestasi
                        </a>

                        <a class="dropdown-item {{ request()->is('/#ekstrakurikuler') ? 'active' : '' }}"
                            href="{{ route('public.ekstrakurikuler') }}">

                            <i class="fas fa-running"></i>
                            Ekstrakurikuler
                        </a>

                    </div>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="informasiDropdown"
                       role="button"
                       data-toggle="dropdown">

                        INFORMASI

                    </a>

                    <div class="dropdown-menu">

                        <a class="dropdown-item {{ request()->is('/#berita') ? 'active' : '' }}"
                           href="{{ route('public.berita') }}">

                            <i class="fas fa-newspaper mr-2"></i>
                            Berita

                        </a>

                        <a class="dropdown-item {{ request()->is('/#pengumuman') ? 'active' : '' }}"
                           href="{{ route('public.pengumuman') }}">

                            <i class="fas fa-bullhorn mr-2"></i>
                            Pengumuman

                        </a>

                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>