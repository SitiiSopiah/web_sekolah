
@extends('template.landing')

@section('title', 'Prestasi Sekolah - SMPN 2 MANGUNREJA')

@section('content')

<style>
    .prestasi-page {
        background: #f5f9f7;
        min-height: 75vh;
        padding: 38px 0 60px;
    }

    .prestasi-header {
        text-align: center;
        margin-bottom: 45px;
        padding: 0 15px;
    }
    .prestasi-heading {
        color: #173d2d;
        font-size: 36px;
        font-weight: 700;
        margin: 10px 0;
    }

    .prestasi-subtitle {
        color: #65736c;
        font-size: 14px;
        line-height: 1.8;
        max-width: 650px;
        margin: 0 auto;
    }

    .prestasi-card {
        background: #fff;
        border-radius: 13px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0, 60, 35, .07);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .prestasi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 60, 35, .13);
    }

    .prestasi-card-image {
        width: 100%;
        height: 207px;
        object-fit: cover;
        display: block;
    }

    .prestasi-image-placeholder {
        width: 100%;
        height: 207px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f5ee;
        color: #d99a16;
        font-size: 48px;
    }

    .prestasi-card-body {
        padding: 20px 22px 24px;
    }

    .prestasi-year {
        color: #079447;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .prestasi-card-title {
        color: #173d2d;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 8px;
    }

    .prestasi-description {
        color: #65736c;
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 15px;
    }

    .prestasi-detail-link {
        color: #087b46;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .prestasi-detail-link:hover {
        color: #d99a16;
    }

    .prestasi-empty {
        background: white;
        border-radius: 13px;
        padding: 55px 20px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .prestasi-heading {
            font-size: 28px;
        }

        .prestasi-header {
            margin-bottom: 30px;
        }

        .prestasi-card-image,
        .prestasi-image-placeholder {
            height: 220px;
        }
    }
</style>

<section class="prestasi-page" style="padding-top: 120px !important;">
    <div class="container">

        {{-- Judul Halaman --}}
        <div class="prestasi-header">
            <small style="
                color:#d99a16;
                font-weight:700;
                letter-spacing:2px;
            ">
                PENCAPAIAN SEKOLAH
            </small>

            <h1 class="prestasi-heading">
                Prestasi Sekolah
            </h1>

            <p class="prestasi-subtitle">
                Temukan berbagai pencapaian siswa dan sekolah
                SMPN 2 MANGUNREJA dalam bidang akademik maupun non-akademik.
            </p>
        </div>

        {{-- Daftar Prestasi --}}
        <div class="row g-4">

            @forelse($prestasi as $item)

                <div class="col-lg-4 col-md-6">

                    <article class="prestasi-card">

                        {{-- Foto --}}
                        @if($item->foto)
                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                class="prestasi-card-image"
                                alt="{{ $item->nama_prestasi }}">
                        @else
                            <div class="prestasi-image-placeholder">
                                <i class="fas fa-trophy"></i>
                            </div>
                        @endif

                        {{-- Isi Card --}}
                        <div class="prestasi-card-body">

                            <div class="prestasi-year">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ $item->tahun_ajaran ?: 'Tahun tidak dicantumkan' }}
                            </div>

                            <h2 class="prestasi-card-title">
                                {{ $item->nama_prestasi }}
                            </h2>

                            <p class="prestasi-description">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}
                            </p>

                            <a
                                href="{{ route('prestasi.show', $item->getKey()) }}"
                                class="prestasi-detail-link">
                                Lihat Selengkapnya
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>

                        </div>
                    </article>

                </div>

            @empty

                <div class="col-12">
                    <div class="prestasi-empty">
                        <i class="fas fa-trophy mb-3"
                           style="font-size: 48px; color: #d99a16;"></i>

                        <h4 class="fw-bold" style="color: #173d2d;">
                            Belum Ada Data Prestasi
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi prestasi sekolah akan ditampilkan di sini.
                        </p>
                    </div>
                </div>

            @endforelse

        </div>

        <div class="text-center mt-4">

            <a href="{{ url('/#prestasi') }}"
               class="btn rounded-pill px-4"
               style="
                    background:#006b3c;
                    border-color:#006b3c;
                    color:white;
               ">

                <i class="fas fa-arrow-left mr-2"></i>

                Kembali ke Beranda

            </a>

        </div>

    </div>
</section>

@endsection