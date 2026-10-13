<nav class="navbar navbar-top navbar-expand-md navbar-light" id="navbar-main">
    <div class="container-fluid d-flex align-items-center">

        <!-- Toggle Sidebar di sebelah kiri -->
        <button type="button"
                id="sidebarToggle"
                class="btn btn-link text-dark p-0 sidebar-toggle-btn">
            <i class="fas fa-bars"></i>
        </button>

        <!-- User Admin di sebelah kanan -->
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown">

                <a class="nav-link pr-0"
                   href="#"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">

                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Foto Admin"
                                 src="{{ asset('assets/img/user.jfif') }}">
                        </span>

                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">
                                {{ auth()->user()->username }}
                            </span>
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>

                    <a href="{{ route('admin.profil.index') }}"
                       class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Profil Saya</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('logout') }}"
                       class="dropdown-item"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

    </div>
</nav>

<style>
    /* Tombol toggle di sisi kiri navbar */
    .sidebar-toggle-btn {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        font-size: 22px;
        flex-shrink: 0;
        margin-right: 15px;
        text-decoration: none !important;
    }

    .sidebar-toggle-btn:hover {
        color: #006b3c !important;
    }

    #navbar-main .navbar-nav {
        margin-left: auto;
    }
</style>