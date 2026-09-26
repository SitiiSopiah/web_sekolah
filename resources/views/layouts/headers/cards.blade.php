<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    <div class="container-fluid">

        <div class="header-body">

            <div class="row">

                {{-- GURU --}}
                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Guru
                                    </h5>

                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $jumlahGuru ?? 0 }}
                                    </span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">

                                        <i class="fas fa-chalkboard-teacher"></i>

                                    </div>

                                </div>

                            </div>

                            <p class="mt-3 mb-0 text-muted text-sm">

                                <span class="text-nowrap">
                                    Data guru sekolah
                                </span>

                            </p>

                        </div>

                    </div>

                </div>


                {{-- SISWA --}}
                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Siswa
                                    </h5>

                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $jumlahSiswa ?? 0 }}
                                    </span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">

                                        <i class="fas fa-user-graduate"></i>

                                    </div>

                                </div>

                            </div>

                            <p class="mt-3 mb-0 text-muted text-sm">

                                <span class="text-nowrap">
                                    Data siswa terdaftar
                                </span>

                            </p>

                        </div>

                    </div>

                </div>


                {{-- BERITA --}}
                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Berita
                                    </h5>

                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $jumlahBerita ?? 0 }}
                                    </span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">

                                        <i class="fas fa-newspaper"></i>

                                    </div>

                                </div>

                            </div>

                            <p class="mt-3 mb-0 text-muted text-sm">

                                <span class="text-nowrap">
                                    Berita sekolah
                                </span>

                            </p>

                        </div>

                    </div>

                </div>


                {{-- EKSTRAKURIKULER --}}
                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">
                                        Ekstrakurikuler
                                    </h5>

                                    <span class="h2 font-weight-bold mb-0">
                                        {{ $jumlahEkstrakurikuler ?? 0 }}
                                    </span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">

                                        <i class="fas fa-trophy"></i>

                                    </div>

                                </div>

                            </div>

                            <p class="mt-3 mb-0 text-muted text-sm">

                                <span class="text-nowrap">
                                    Kegiatan sekolah
                                </span>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>