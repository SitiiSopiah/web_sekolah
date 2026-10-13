@extends('template.landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')
<body class="bg-white">
    <section id="beranda"
            class="d-flex align-items-center text-center text-white"
            style="
                min-height:100vh;
                padding-top:80px;
                background:
                    linear-gradient(rgba(3,43,29,.83),rgba(3,43,29,.83)),
                    url('{{ $profil && $profil->foto
                        ? asset('storage/foto1.jpeg')
                        : asset('assets/img/theme/profile-cover.jpg') }}');
                background-size:cover;
                background-position:center;
            ">
        <div class="container">
            <div class="mb-4">
                <span class="badge badge-pill px-3 py-2 mr-2"
                    style="background:rgba(244,189,54,.12);
                            color:#f4bd36;
                            border:1px solid rgba(244,189,54,.5);">
                    <i class="fas fa-school mr-1"></i>
                    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                </span>
                <span class="badge badge-pill px-3 py-2"
                    style="background:rgba(72,190,126,.10);
                            color:#64d49a;
                            border:1px solid rgba(72,190,126,.3);">
                    SISTEM INFORMASI SEKOLAH
                </span>
            </div>
            <h1 class="display-4 font-weight-light mb-2">
                Selamat Datang di Website
            </h1>
            <h2 class="display-3 mb-4"
                style="color:#f4bd36;">
                {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
            </h2>
            <div class="d-flex justify-content-center flex-wrap">
                <a href="{{ route('public.profil_sekolah') }}"
                class="btn btn-school-primary mr-2 mb-2">
                    <span>Tentang Sekolah</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="{{ route('public.prestasi') }}"
                class="btn btn-school-secondary mb-2">
                    <i class="fas fa-newspaper mr-2"></i>
                    <span>Lihat Prestasi</span>
                </a>
            </div>
        </div>
    </section>

    <section class="position-relative"
            style="margin-top:-55px;z-index:10;">
        <div class="container">
            <div class="row no-gutters school-stat shadow overflow-hidden text-white">
                <div class="col-lg col-md-4 col-6">
                    <div class="stat-item text-center py-4 px-2">
                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahSiswa ?? 0 }}
                        </h2>
                        <small>
                            Siswa
                        </small>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-6">
                    <div class="stat-item text-center py-4 px-2">
                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahGuru ?? 0 }}
                        </h2>
                        <small>
                            Guru & Staff
                        </small>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-6">
                    <div class="stat-item text-center py-4 px-2">
                        <h2 class="font-weight-bold mb-1">
                            {{ $jumlahEkstrakurikuler ?? 0 }}
                        </h2>
                        <small>
                            Ekstrakurikuler
                        </small>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    <section id="profil"
            class="py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    @if($profil && $profil->foto)
                        <img src="{{ asset('storage/' . $profil->foto) }}"
                            class="img-fluid rounded shadow-sm w-100"
                            style="height:335px;object-fit:cover;"
                            alt="Kepala Sekolah">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="height:335px;">
                            <i class="fas fa-user-tie fa-5x text-success"></i>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <small class="section-label">
                        KOMITMEN KAMI UNTUK PENDIDIKAN
                    </small>
                    <h2 class="section-title mt-2 mb-4">
                        Sambutan Kepala Sekolah
                    </h2>
                    <p class="text-dark"
                    style="line-height:1.8;">
                        Puji syukur ke hadirat Tuhan YME atas segala rahmat
                        dan karunia-Nya. Selamat datang di website resmi
                        {{ $profil->nama_sekolah }}.
                        Website ini kami hadirkan sebagai sarana informasi
                        dan komunikasi antara sekolah dengan orang tua,
                        peserta didik, serta masyarakat luas.
                    </p>
                    <p class="text-dark"
                    style="line-height:1.8;">
                        Melalui media ini, kami berharap seluruh informasi
                        mengenai kegiatan, prestasi, serta program pendidikan
                        dapat tersampaikan secara transparan, cepat, dan akurat.
                    </p>
                    <hr>
                    <h4 class="font-weight-bold mb-1">
                        {{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}
                    </h4>
                    <p class="text-muted mb-0">
                        Kepala Sekolah
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="guru"
            class="py-5"
            style="background:#f5f8f6;">
        <div class="container py-4">
            <div class="text-center mb-5">
                <small class="section-label">
                    TENAGA PENDIDIK
                </small>
                <h2 class="section-title mt-2">
                    Guru & Staff Pengajar
                </h2>
                <p class="text-muted">
                    Mengenal tenaga pendidik yang berperan dalam memberikan
                    pendidikan terbaik bagi siswa SMPN 2 MANGUNREJA.
                </p>
            </div>
            <div class="row">
                @forelse($guru as $item)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="{{ route('guru.show', $item->getKey()) }}"
                        class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                        class="card-img-top"
                                        style="height:280px;object-fit:cover;"
                                        alt="{{ $item->nama_guru }}">
                                @else
                                    <div class="bg-light d-flex
                                                align-items-center
                                                justify-content-center"
                                        style="height:280px;">
                                        <i class="fas fa-user fa-4x text-success"></i>
                                    </div>
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="font-weight-bold text-dark">
                                        {{ $item->nama_guru }}
                                    </h5>
                                    <span class="text-success">
                                        {{ $item->mapel ?? 'Guru SMPN 2 MANGUNREJA' }}
                                    </span>
                                    @if($item->nip)
                                        <p class="small text-muted mt-2 mb-0">
                                            NIP. {{ $item->nip }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <p class="text-muted">
                            Belum ada data guru.
                        </p>
                    </div>
                @endforelse
            </div>
            @if(isset($guru) && $guru->count() > 0)
                <div class="text-center mt-3">
                    <a href="{{ route('public.guru') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <section id="berita"
            class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <small class="section-label">
                    INFORMASI
                </small>
                <h2 class="section-title mt-2">
                    Berita Terbaru
                </h2>
                <p class="text-muted">
                    Informasi dan kegiatan terbaru
                    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}.
                </p>
            </div>
            <div class="row">
                @forelse($berita as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('berita.show', $item->getKey()) }}"
                        class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="card-img-top"
                                        style="height:210px;object-fit:cover;"
                                        alt="{{ $item->judul }}">
                                @else
                                    <div class="bg-light d-flex
                                                align-items-center
                                                justify-content-center"
                                        style="height:210px;">
                                        <i class="fas fa-newspaper fa-3x text-success"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <small class="text-warning">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $item->tanggal
                                            ? $item->tanggal->format('d F Y')
                                            : '-' }}
                                    </small>
                                    <h5 class="font-weight-bold text-dark mt-2">
                                        {{ $item->judul }}
                                    </h5>
                                    <p class="text-muted small">
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($item->isi),
                                            130
                                        ) }}
                                    </p>
                                    <span class="text-success small font-weight-bold">
                                        Baca Selengkapnya
                                        <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Belum ada berita yang dipublikasikan.
                        </p>
                    </div>
                @endforelse
            </div>
            @if(isset($berita) && $berita->count() > 0)
                <div class="text-center mt-3">
                    <a href="{{ route('public.berita') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <section id="pengumuman"
            class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <small class="section-label">
                    INFORMASI PENTING
                </small>
                <h2 class="section-title mt-2">
                    Pengumuman
                </h2>
                <p class="text-muted">
                    Informasi penting dan pengumuman terbaru sekolah.
                </p>
            </div>
            @forelse($pengumuman as $item)
                <a href="{{ route('pengumuman.show', $item->getKey()) }}"
                class="text-decoration-none">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body border-left border-warning">
                            <h5 class="font-weight-bold text-dark">
                                {{ $item->judul }}
                            </h5>
                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($item->isi),
                                    200
                                ) }}
                            </p>
                            <small class="text-muted">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ $item->tanggal
                                    ? $item->tanggal->format('d F Y')
                                    : '-' }}
                            </small>
                            <div class="text-success small font-weight-bold mt-3">
                                Lihat Detail
                                <i class="fas fa-arrow-right ml-1"></i>
                            </div>
                        </div>
                    </div>

                </a>
            @empty
                <p class="text-center text-muted">
                    Belum ada pengumuman.
                </p>
            @endforelse
            @if(isset($pengumuman) && $pengumuman->count() > 0)
                <div class="text-center mt-4">
                    <a href="{{ route('public.pengumuman') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <section id="ekstrakurikuler" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <small class="section-label">
                    PENGEMBANGAN SISWA
                </small>
                <h2 class="section-title mt-2">
                    Ekstrakurikuler
                </h2>
                <p class="text-muted">
                    Kegiatan untuk mengembangkan minat, bakat,
                    dan kreativitas siswa.
                </p>
            </div>
            <div class="row">
                @forelse($ekstrakurikuler as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('ekstrakurikuler.show', $item->getKey()) }}"
                        class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 overflow-hidden">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="card-img-top"
                                        alt="{{ $item->nama_ekskul }}"
                                        style="
                                            height:220px;
                                            object-fit:cover;
                                        ">
                                @else
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="
                                            height:220px;
                                            background:#e8f5ee;
                                            color:#006b3c;
                                        ">
                                        <i class="fas fa-running fa-4x"></i>
                                    </div>
                                @endif
                                <div class="card-body text-center p-4">
                                    <h5 class="font-weight-bold text-dark mb-3">
                                        {{ $item->nama_ekskul }}
                                    </h5>
                                    @if($item->pembina)
                                        <p class="text-muted small mb-2">
                                            <i class="fas fa-user-tie mr-1"
                                            style="color:#006b3c;"></i>
                                            <strong>Pembina:</strong>
                                            {{ $item->pembina }}
                                        </p>
                                    @endif
                                    @if($item->jadwal_latihan)
                                        <p class="text-muted small mb-3">
                                            <i class="far fa-calendar-alt mr-1"
                                            style="color:#006b3c;"></i>
                                            {{ $item->jadwal_latihan }}
                                        </p>
                                    @endif
                                    <div class="text-success small font-weight-bold">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right ml-1"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="py-5">
                            <i class="fas fa-running fa-3x text-success mb-3"></i>
                            <p class="text-muted mb-0">
                                Belum ada data ekstrakurikuler.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
            @if(isset($ekstrakurikuler) && $ekstrakurikuler->count() > 0)
                <div class="text-center mt-3">
                    <a href="{{ route('public.ekstrakurikuler') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <section id="prestasi" class="py-5" style="background: #f5f9f7;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">PRESTASI SEKOLAH</span>
                <h2 class="section-title mt-2">
                    Prestasi SMPN 2 MANGUNREJA
                </h2>
                <p class="text-muted mb-0">
                    Berbagai pencapaian siswa dan sekolah dalam bidang akademik
                    maupun non-akademik.
                </p>
            </div>
            <div class="row g-4">
                @forelse($prestasi as $item)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('prestasi.show', $item->getKey()) }}"
                        class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm"
                                style="border-radius: 18px; overflow: hidden;">
                                <div style="height: 220px; background: #e8f5ee;">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                            alt="{{ $item->nama_prestasi }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100">
                                            <i class="fas fa-trophy"
                                            style="font-size: 60px; color: #d99a16;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-2">
                                        <span class="badge"
                                            style="background: #e8f5ee;
                                                    color: #006b3c;
                                                    font-size: 12px;
                                                    padding: 7px 12px;
                                                    border-radius: 20px;">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            {{ $item->tahun_ajaran }}
                                        </span>
                                    </div>
                                    <h5 class="fw-bold mt-3 mb-2"
                                        style="color: #173d2d;">
                                        {{ $item->nama_prestasi }}
                                    </h5>
                                    <p class="text-muted mb-3">
                                        {{ Str::limit($item->deskripsi, 120) }}
                                    </p>
                                    <span class="text-success small font-weight-bold">
                                        Lihat Selengkapnya
                                        <i class="fas fa-arrow-right ml-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-trophy mb-3"
                            style="font-size: 50px; color: #d99a16;"></i>
                            <h5 class="fw-bold" style="color: #173d2d;">
                                Belum Ada Data Prestasi
                            </h5>
                            <p class="text-muted mb-0">
                                Data prestasi sekolah akan ditampilkan di sini.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
            @if($prestasi->count() > 0)
                <div class="text-center mt-3">
                    <a href="{{ route('public.prestasi') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
    <section id="galeri"
            class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <small class="section-label">
                    DOKUMENTASI
                </small>
                <h2 class="section-title mt-2">
                    Galeri Sekolah
                </h2>
                <p class="text-muted">
                    Dokumentasi kegiatan
                    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}.
                </p>
            </div>
            <div class="row">
                @forelse($galeri as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('galeri.show', $item->getKey()) }}"
                        class="text-decoration-none">
                            <div class="card border-0 shadow-sm overflow-hidden">
                                @if($item->kategori === 'Foto')
                                    <img src="{{ asset('storage/' . $item->file) }}"
                                        class="card-img-top"
                                        style="height:240px;object-fit:cover;"
                                        alt="{{ $item->judul }}">
                                @else
                                    <video class="w-100"
                                        style="height:240px;object-fit:cover;"
                                        controls>
                                        <source src="{{ asset('storage/' . $item->file) }}">
                                    </video>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Belum ada galeri.
                        </p>
                    </div>
                @endforelse
            </div>
            @if(isset($galeri) && $galeri->count() > 0)
                <div class="text-center mt-3">
                    <a href="{{ route('public.galeri') }}"
                    class="btn btn-school rounded-pill px-4">
                        Lihat Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
</body>
@endsection