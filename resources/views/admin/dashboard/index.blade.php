@extends('layouts.app')

@section('content')

<style>
    /* =========================================================
       DASHBOARD GREEN
    ========================================================= */

    .dashboard-green {
        background-color: #f5f9f7;
        min-height: calc(100vh - 70px);
        padding: 30px 0 40px;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .dashboard-header {
        background: linear-gradient(135deg, #006b3c, #079447);
        border-radius: 12px;
        padding: 28px 30px;
        margin-bottom: 25px;
        color: #fff;
        box-shadow: 0 4px 12px rgba(0, 107, 60, 0.12);
    }

    .dashboard-header h2 {
        color: #fff;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .dashboard-header p {
        color: rgba(255, 255, 255, .85);
        margin-bottom: 0;
        font-size: 14px;
    }

    /* =========================================================
       STATISTIC CARD
    ========================================================= */

    .stat-card {
        background: #fff;
        border: 0;
        border-radius: 12px;
        padding: 22px;
        height: 100%;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .06);
        transition: all .3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 18px rgba(0, 0, 0, .09);
    }

    .stat-card-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-title {
        color: #8898aa;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 8px;
    }

    .stat-number {
        color: #006b3c;
        font-size: 30px;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 7px;
    }

    .stat-description {
        color: #8898aa;
        font-size: 12px;
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        background: #e8f5ee;
        color: #006b3c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    /* =========================================================
       DASHBOARD CARD
    ========================================================= */

    .dashboard-card {
        background: #fff;
        border: 0;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .06);
        overflow: hidden;
        height: 100%;
    }

    .dashboard-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #edf2ef;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dashboard-card-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #32325d;
    }

    .dashboard-card-header .icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: #e8f5ee;
        color: #006b3c;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* =========================================================
       PENGUMUMAN
    ========================================================= */

    .announcement-item {
        padding: 15px 20px;
        border-bottom: 1px solid #edf2ef;
    }

    .announcement-item:last-child {
        border-bottom: none;
    }

    .announcement-item h4 {
        font-size: 14px;
        font-weight: 600;
        color: #32325d;
        margin-bottom: 5px;
    }

    .announcement-date {
        font-size: 12px;
        color: #8898aa;
    }

    /* =========================================================
       BERITA
    ========================================================= */

    .news-table {
        margin-bottom: 0;
    }

    .news-table th {
        background-color: #f6faf8;
        color: #006b3c;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: 700;
        border: none;
        padding: 14px 18px;
    }

    .news-table td {
        vertical-align: middle;
        color: #525f7f;
        font-size: 13px;
        padding: 14px 18px;
        border-top: 1px solid #edf2ef;
    }

    .news-title {
        color: #32325d;
        font-weight: 600;
    }

    /* =========================================================
       INFORMASI WEBSITE
    ========================================================= */

    .info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 15px;
        border-bottom: 1px solid #edf2ef;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-name {
        display: flex;
        align-items: center;
        color: #525f7f;
        font-size: 13px;
        font-weight: 500;
    }

    .info-icon {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #e8f5ee;
        color: #006b3c;
        margin-right: 10px;
    }

    .info-number {
        color: #006b3c;
        font-size: 16px;
        font-weight: 700;
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .btn-green {
        background-color: #006b3c;
        border-color: #006b3c;
        color: #fff !important;
        font-weight: 600;
        border-radius: 5px;
        padding: 6px 12px;
    }

    .btn-green:hover {
        background-color: #00552f;
        border-color: #00552f;
    }

    /* =========================================================
       EMPTY DATA
    ========================================================= */

    .empty-data {
        text-align: center;
        padding: 30px 20px;
        color: #8898aa;
    }

    .empty-data i {
        font-size: 28px;
        color: #adb9b2;
        margin-bottom: 10px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991px) {

        .dashboard-green {
            padding: 20px 0 30px;
        }

        .dashboard-header {
            padding: 22px;
        }

        .dashboard-header h2 {
            font-size: 21px;
        }

        .stat-number {
            font-size: 26px;
        }
    }
</style>


<div class="container-fluid dashboard-green">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-header">

        <h2>
            Selamat Datang, {{ ucwords(auth()->user()->username) }}
        </h2>

        <p>
            Sistem Informasi SMPN 2 MANGUNREJA
        </p>

    </div>

    {{-- =====================================================
         INFORMASI WEBSITE + SISTEM INFORMASI
    ====================================================== --}}

    <div class="row">

        {{-- SISTEM INFORMASI --}}
        <div class="col-xl-12 mb-4">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h3>
                        Sistem Informasi
                    </h3>

                    <div class="icon">
                        <i class="fas fa-school"></i>
                    </div>

                </div>

                <div class="p-4">

                    <p class="text-muted mb-3">
                        Selamat datang di Sistem Informasi
                        SMPN 2 MANGUNREJA.
                    </p>

                    <p class="text-muted mb-0">
                        Gunakan menu di sebelah kiri untuk
                        mengelola data sekolah, informasi,
                        berita, pengumuman, dan galeri.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        STATISTIK DASHBOARD
    ====================================================== --}}

    <div class="row">

        {{-- GURU --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="stat-card-content">

                    <div>
                        <div class="stat-title">
                            Guru
                        </div>

                        <div class="stat-number">
                            {{ $jumlahGuru ?? 0 }}
                        </div>

                        <div class="stat-description">
                            Data guru sekolah
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>

                </div>
            </div>
        </div>


        {{-- SISWA --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="stat-card-content">

                    <div>
                        <div class="stat-title">
                            Siswa
                        </div>

                        <div class="stat-number">
                            {{ $jumlahSiswa ?? 0 }}
                        </div>

                        <div class="stat-description">
                            Data siswa sekolah
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>

                </div>
            </div>
        </div>

        {{-- EKSTRAKURIKULER --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="stat-card-content">

                    <div>
                        <div class="stat-title">
                            Ekstrakurikuler
                        </div>

                        <div class="stat-number">
                            {{ $jumlahEkstrakurikuler ?? 0 }}
                        </div>

                        <div class="stat-description">
                            Kegiatan sekolah
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fas fa-running"></i>
                    </div>

                </div>
            </div>
        </div>


        {{-- GALERI --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card">
                <div class="stat-card-content">

                    <div>
                        <div class="stat-title">
                            Galeri
                        </div>

                        <div class="stat-number">
                            {{ $jumlahGaleri ?? 0 }}
                        </div>

                        <div class="stat-description">
                            Dokumentasi sekolah
                        </div>
                    </div>

                    <div class="stat-icon">
                        <i class="fas fa-images"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>
    {{-- =====================================================
         PENGUMUMAN + BERITA
    ====================================================== --}}

    <div class="row">

        {{-- PENGUMUMAN TERBARU --}}
        <div class="col-xl-4 mb-4">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h3>
                        Pengumuman Terbaru
                    </h3>

                    <div class="icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>

                </div>

                <div>

                    @forelse($pengumumanTerbaru ?? [] as $pengumuman)

                        <div class="announcement-item">

                            <h4>
                                {{ $pengumuman->judul }}
                            </h4>

                            @if($pengumuman->tanggal)

                                <div class="announcement-date">

                                    <i class="far fa-calendar-alt mr-1"></i>

                                    {{ $pengumuman->tanggal }}

                                </div>

                            @endif

                        </div>

                    @empty

                        <div class="empty-data">

                            <i class="fas fa-bullhorn d-block"></i>

                            <p class="mb-0">
                                Belum ada pengumuman.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- BERITA TERBARU --}}
        <div class="col-xl-8 mb-4">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h3>
                        Berita Terbaru
                    </h3>

                    <a href="{{ route('berita.index') }}"
                       class="btn btn-sm btn-green">

                        <i class="fas fa-newspaper mr-1"></i>

                        Lihat Semua

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table news-table">

                        <thead>

                            <tr>

                                <th style="width:60px;">
                                    No
                                </th>

                                <th>
                                    Judul Berita
                                </th>

                                <th style="width:130px;">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($beritaTerbaru ?? [] as $berita)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <span class="news-title">
                                            {{ $berita->judul }}
                                        </span>
                                    </td>

                                    <td>

                                        @if($berita->tanggal)

                                            {{ $berita->tanggal }}

                                        @elseif($berita->created_at)

                                            {{ $berita->created_at->format('d/m/Y') }}

                                        @else

                                            -

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3">

                                        <div class="empty-data">

                                            <i class="fas fa-newspaper d-block"></i>

                                            Belum ada berita.

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection