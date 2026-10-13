<nav id="sidenav-main" class="school-sidebar">

    {{-- HEADER --}}
    <div class="school-sidebar-header">

        <a href="{{ route('dashboard.index') }}" class="school-brand">
            @if($profil && $profil->logo)

                <img
                    src="{{ asset('storage/' . $profil->logo) }}"
                    class="school-logo"
                    alt="Logo Sekolah">

            @else

                <img
                    src="{{ asset('assets/img/brand/favicon.png') }}"
                    class="school-logo"
                    alt="Logo Sekolah">

            @endif
            <div class="school-brand-text">
                <strong>SMPN 2</strong>
                <span>MANGUNREJA</span>
            </div>

        </a>

    </div>


    {{-- MENU --}}
    <div class="school-sidebar-body">

        <ul class="school-menu">

            {{-- DASHBOARD --}}
            <li class="school-menu-item">

                <a href="{{ route('dashboard.index') }}"
                   class="school-menu-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-home"></i>
                    </span>

                    <span class="school-menu-text">
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- DATA SEKOLAH --}}
            <li class="school-menu-item">
                <a href="#menuDataSekolah"
                   data-toggle="collapse"
                   class="school-menu-link school-menu-parent
                   {{ request()->routeIs('guru.*') || request()->routeIs('siswa.*') ? '' : 'collapsed' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-school"></i>
                    </span>

                    <span class="school-menu-text">
                        Data Sekolah
                    </span>

                    <span class="school-menu-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </span>

                </a>

                <div id="menuDataSekolah"
                     class="collapse
                     {{ request()->routeIs('guru.*') || request()->routeIs('siswa.*') ? 'show' : '' }}">

                    <ul class="school-submenu">

                        <li>

                            <a href="{{ route('siswa.index') }}"
                            class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">

                                <span class="school-menu-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </span>

                                <span class="school-menu-text">
                                    Siswa
                                </span>

                            </a>

                        </li>


                        <li>

                            <a href="{{ route('guru.index') }}"
                                class="{{ request()->routeIs('guru.*') ? 'active' : '' }}">

                                <span class="school-menu-icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </span>

                                <span class="school-menu-text">
                                    Guru
                                </span>

                            </a>

                        </li>

                    </ul>

                </div>
            </li>

            {{-- KESISWAAN --}}
            <li class="school-menu-item">

                <a href="#menuKesiswaan"
                   data-toggle="collapse"
                   class="school-menu-link school-menu-parent
                   {{ request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') ? '' : 'collapsed' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-users"></i>
                    </span>

                    <span class="school-menu-text">
                        Kesiswaan
                    </span>

                    <span class="school-menu-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </span>

                </a>


                <div id="menuKesiswaan"
                     class="collapse
                     {{ request()->routeIs('ekstrakurikuler.*') || request()->routeIs('prestasi.*') ? 'show' : '' }}">

                    <ul class="school-submenu">

                        <li>
                            <a href="{{ route('ekstrakurikuler.index') }}"
                               class="{{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}">

                                <i class="fas fa-running"></i>
                                Ekstrakurikuler

                            </a>
                        </li>


                        <li>
                            <a href="{{ route('prestasi.index') }}"
                               class="{{ request()->routeIs('prestasi.*') ? 'active' : '' }}">

                                <i class="fas fa-trophy"></i>
                                Prestasi

                            </a>
                        </li>

                    </ul>

                </div>

            </li>

            <li class="school-menu-item">

                <a href="#menuInformasi"
                   data-toggle="collapse"
                   class="school-menu-link school-menu-parent
                   {{ request()->routeIs('berita.*') || request()->routeIs('pengumuman.*') || request()->routeIs('galeri.*') ? '' : 'collapsed' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-info-circle"></i>
                    </span>

                    <span class="school-menu-text">
                        Informasi
                    </span>

                    <span class="school-menu-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </span>

                </a>


                <div id="menuInformasi"
                     class="collapse
                     {{ request()->routeIs('berita.*') || request()->routeIs('pengumuman.*') || request()->routeIs('galeri.*') ? 'show' : '' }}">

                    <ul class="school-submenu">

                        <li>
                            <a href="{{ route('berita.index') }}"
                               class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">

                                <i class="fas fa-newspaper"></i>
                                Berita

                            </a>
                        </li>


                        <li>
                            <a href="{{ route('pengumuman.index') }}"
                               class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">

                                <i class="fas fa-bullhorn"></i>
                                Pengumuman

                            </a>
                        </li>

                        <li>
                            <a href="{{ route('galeri.index') }}"
                               class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">

                                <i class="fas fa-images"></i>
                                Galeri

                            </a>

                    </ul>

                </div>

            </li>

            {{-- PENGATURAN --}}
            <li class="school-section-title">
                PENGATURAN
            </li>


            {{-- PROFIL SEKOLAH --}}
            <li class="school-menu-item">

                <a href="{{ route('profil_sekolah.index') }}"
                   class="school-menu-link {{ request()->routeIs('profil_sekolah.*') ? 'active' : '' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-school"></i>
                    </span>

                    <span class="school-menu-text">
                        Profil Sekolah
                    </span>

                </a>

            </li>


            {{-- USERS --}}
            <li class="school-menu-item">

                <a href="{{ route('users.index') }}"
                   class="school-menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

                    <span class="school-menu-icon">
                        <i class="fas fa-user-cog"></i>
                    </span>

                    <span class="school-menu-text">
                        Manajemen Pengguna
                    </span>

                </a>

            </li>
            
            {{-- LIHAT WEBSITE --}}
            <div style="padding: 10px 12px;">
                <a href="{{ url('/') }}"
                target="_blank"
                rel="noopener noreferrer"
                style="
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    padding: 12px 15px;
                    color: #ffffff;
                    border: 1px solid rgba(255,255,255,0.7);
                    border-radius: 8px;
                    text-decoration: none;
                    font-size: 14px;
                    transition: all 0.3s ease;
                "
                onmouseover="this.style.backgroundColor='rgba(255,255,255,0.12)'"
                onmouseout="this.style.backgroundColor='transparent'">

                    <i class="fas fa-external-link-alt"
                    style="color: #ffffff;"></i>

                    <span style="color: #ffffff;">Lihat Website</span>
                </a>
            </div>



        </ul>

    </div>

</nav>


<style>

    /* =========================================================
       SIDEBAR UTAMA
    ========================================================= */

    .school-sidebar {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;

        width: 250px !important;
        height: 100vh !important;

        background: #006b3c !important;

        z-index: 99999 !important;

        overflow-y: auto;

        box-shadow: 3px 0 15px rgba(0, 0, 0, 0.08);
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .school-sidebar-header {
        height: 90px;

        display: flex;
        align-items: center;

        padding: 15px 20px;

        border-bottom: 1px solid rgba(255,255,255,.12);
    }


    .school-brand {
        display: flex;

        align-items: center;

        width: 100%;

        text-decoration: none !important;

        /* color: white !important; */
    }


    .school-logo {
        width: 45px;
        height: 45px;

        border-radius: 10px;

        background: white;

        color: #006b3c;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 21px;

        margin-right: 12px;

        flex-shrink: 0;
    }


    .school-brand-text {
        display: flex;
        flex-direction: column;

        line-height: 1.2;
    }


    .school-brand-text strong {
        font-size: 16px;

        color: white;
    }


    .school-brand-text span {
        font-size: 13px;

        color: rgba(255,255,255,.85);

        margin-top: 3px;
    }


    /* =========================================================
       BODY
    ========================================================= */

    .school-sidebar-body {
        padding: 15px 12px 30px;
    }


    .school-menu {
        list-style: none;

        padding: 0;
        margin: 0;
    }


    .school-menu-item {
        list-style: none;

        margin-bottom: 5px;
    }


    /* =========================================================
       SECTION TITLE
    ========================================================= */

    .school-section-title {
        list-style: none;

        color: rgba(255,255,255,.55);

        font-size: 10px;

        font-weight: 700;

        letter-spacing: 1px;

        padding: 18px 13px 8px;
    }


    /* =========================================================
       MENU LINK
    ========================================================= */

    .school-menu-link {
        position: relative;

        display: flex;

        align-items: center;

        width: 100%;

        min-height: 45px;

        padding: 10px 13px;

        border-radius: 8px;

        color: rgba(255,255,255,.85) !important;

        text-decoration: none !important;

        transition: all .2s ease;
    }


    .school-menu-link:hover {
        background: rgba(255,255,255,.10);

        color: white !important;
    }


    /* =========================================================
       ACTIVE
    ========================================================= */

    .school-menu-link.active {
        background: white !important;

        color: #006b3c !important;

        box-shadow: 0 3px 8px rgba(0,0,0,.08);
    }


    .school-menu-link.active .school-menu-icon {
        color: #006b3c !important;
    }


    /* =========================================================
       ICON
    ========================================================= */

    .school-menu-icon {
        width: 32px;

        min-width: 32px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 15px;

        color: rgba(255,255,255,.8);
    }


    .school-menu-text {
        font-size: 14px;

        font-weight: 500;
    }


    /* =========================================================
       ARROW
    ========================================================= */

    .school-menu-arrow {
        margin-left: auto;

        font-size: 10px;

        transition: transform .2s ease;
    }


    .school-menu-parent:not(.collapsed) .school-menu-arrow {
        transform: rotate(180deg);
    }


    /* =========================================================
       SUBMENU
    ========================================================= */

    .school-submenu {
        list-style: none;

        padding: 5px 0 5px 45px;

        margin: 0;
    }


    .school-submenu li {
        list-style: none;

        margin: 2px 0;
    }


    .school-submenu a {
        display: flex;

        align-items: center;

        gap: 8px;

        padding: 8px 10px;

        border-radius: 6px;

        color: rgba(255,255,255,.75) !important;

        font-size: 13px;

        text-decoration: none !important;
    }


    .school-submenu a:hover {
        background: rgba(255,255,255,.08);

        color: white !important;
    }


    .school-submenu a.active {
        background: rgba(255,255,255,.15);

        color: white !important;
    }


    .school-submenu a i {
        width: 16px;

        text-align: center;
    }


    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .main-content {
        margin-left: 250px !important;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 991.98px) {
        .school-sidebar {
            transform: translateX(-100%);
            transition: transform .25s ease;
        }

        .school-sidebar.sidebar-open {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0 !important;
        }

        body.sidebar-active::after {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 99998;
        }
    }

</style>