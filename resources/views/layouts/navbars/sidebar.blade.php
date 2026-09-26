<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white"
     id="sidenav-main">

    <div class="scrollbar-inner">

        {{-- HEADER --}}
        <div class="sidenav-header d-flex align-items-center">

            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <span class="navbar-brand-img">

                    <span style="
                        font-size: 18px;
                        font-weight: 700;
                        color: #5e72e4;
                        line-height: 1.2;
                        display: block;
                    ">
                        SMPN 2
                    </span>

                    <span style="
                        font-size: 12px;
                        font-weight: 600;
                        color: #8898aa;
                        line-height: 1.2;
                        display: block;
                    ">
                        MANGUNREJA
                    </span>

                </span>
            </a>

            {{-- TOMBOL SIDEBAR --}}
            <div class="ml-auto">

                <div class="sidenav-toggler d-none d-xl-block"
                     data-action="sidenav-unpin"
                     data-target="#sidenav-main">

                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- MENU --}}
        <div class="navbar-inner">

            <div class="collapse navbar-collapse"
                 id="sidenav-collapse-main">

                <ul class="navbar-nav">


                    {{-- ================================================= --}}
                    {{-- DASHBOARD --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.index') }}">

                            <i class="ni ni-tv-2 text-primary"></i>

                            <span class="nav-link-text">
                                Dashboard
                            </span>

                        </a>

                    </li>


                    {{-- ================================================= --}}
                    {{-- MASTER DATA --}}
                    {{-- ================================================= --}}

                    <li class="nav-item mt-3">

                        <a class="nav-link"
                           href="#masterData"
                           data-toggle="collapse"
                           role="button"
                           aria-expanded="{{ request()->routeIs('guru.*') || request()->routeIs('siswa.*') ? 'true' : 'false' }}"
                           aria-controls="masterData">

                            <i class="ni ni-collection text-primary"></i>

                            <span class="nav-link-text">
                                Master Data
                            </span>

                        </a>


                        <div class="collapse {{ request()->routeIs('guru.*') || request()->routeIs('siswa.*') ? 'show' : '' }}"
                             id="masterData">

                            <ul class="nav nav-sm flex-column">

                                {{-- GURU --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                                       href="{{ route('guru.index') }}">

                                        <i class="ni ni-single-02 text-primary"></i>

                                        <span class="nav-link-text">
                                            Guru
                                        </span>

                                    </a>

                                </li>


                                {{-- SISWA --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}"
                                       href="{{ route('siswa.index') }}">

                                        <i class="ni ni-badge text-success"></i>

                                        <span class="nav-link-text">
                                            Siswa
                                        </span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </li>


                    {{-- ================================================= --}}
                    {{-- KESISWAAN --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a class="nav-link"
                        href="#kesiswaan"
                        data-toggle="collapse"
                        role="button"
                        aria-expanded="{{ request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') ? 'true' : 'false' }}"
                        aria-controls="kesiswaan">

                            <i class="ni ni-hat-3 text-warning"></i>

                            <span class="nav-link-text">
                                Kesiswaan
                            </span>

                        </a>

                        <div class="collapse {{ request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') ? 'show' : '' }}"
                            id="kesiswaan">

                            <ul class="nav nav-sm flex-column">

                                {{-- EKSTRAKURIKULER --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}"
                                    href="{{ route('ekstrakurikuler.index') }}">

                                        <i class="fas fa-bullseye text-warning"></i>

                                        <span class="nav-link-text">
                                            Ekstrakurikuler
                                        </span>

                                    </a>

                                </li>

                                {{-- PRESTASI --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('prestasi.*') ? 'active' : '' }}"
                                    href="{{ route('prestasi.index') }}">

                                        <i class="ni ni-trophy text-info"></i>

                                        <span class="nav-link-text">
                                            Prestasi
                                        </span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </li>


                    {{-- ================================================= --}}
                    {{-- PUBLIKASI --}}
                    {{-- ================================================= --}}

                    <li class="nav-item">

                        <a class="nav-link"
                           href="#publikasi"
                           data-toggle="collapse"
                           role="button"
                           aria-expanded="{{ request()->routeIs('galeri.*') || request()->routeIs('berita.*') || request()->routeIs('pengumuman.*') ? 'true' : 'false' }}"
                           aria-controls="publikasi">

                            <i class="ni ni-world text-success"></i>

                            <span class="nav-link-text">
                                Publikasi
                            </span>

                        </a>


                        <div class="collapse {{ request()->routeIs('galeri.*') || request()->routeIs('berita.*') || request()->routeIs('pengumuman.*') ? 'show' : '' }}"
                             id="publikasi">

                            <ul class="nav nav-sm flex-column">


                                {{-- GALERI --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}"
                                       href="{{ route('galeri.index') }}">

                                        <i class="ni ni-image text-primary"></i>

                                        <span class="nav-link-text">
                                            Galeri
                                        </span>

                                    </a>

                                </li>


                                {{-- BERITA --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                                       href="{{ route('berita.index') }}">

                                        <i class="ni ni-paper-diploma text-warning"></i>

                                        <span class="nav-link-text">
                                            Berita
                                        </span>

                                    </a>

                                </li>


                                {{-- PENGUMUMAN --}}
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}"
                                       href="{{ route('pengumuman.index') }}">

                                        <i class="ni ni-bell-55 text-danger"></i>

                                        <span class="nav-link-text">
                                            Pengumuman
                                        </span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </li>

                    {{-- ================================================= --}}
                    {{-- PENGATURAN --}}
                    {{-- ================================================= --}}

                    <li class="nav-item mt-3">

                        <div class="px-3">
                            <h6 class="navbar-heading text-muted">
                                <span class="docs-normal">
                                    PENGATURAN
                                </span>
                            </h6>
                        </div>

                    </li>


                    {{-- PROFIL SEKOLAH --}}
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('profil_sekolah.*') ? 'active' : '' }}"
                        href="{{ route('profil_sekolah.index') }}">

                            <i class="ni ni-building text-orange"></i>

                            <span class="nav-link-text">
                                Profil Sekolah
                            </span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">

                            <i class="ni ni-single-02 text-primary"></i>

                            <span class="nav-link-text">
                                Manajemen Pengguna
                            </span>

                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</nav>