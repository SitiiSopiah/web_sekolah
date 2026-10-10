
@extends('template.landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<style>
    .prestasi-detail-page {
        background: #f5f8f6;
        font-family: Arial, Helvetica, sans-serif;
        color: #173d2d;
        min-height: 70vh;
        padding: 50px 20px;
    }

    .prestasi-detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .prestasi-detail-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(25, 65, 45, .10);
    }

    .prestasi-detail-image {
        display: block;
        width: 100%;
        max-height: 500px;
        object-fit: cover;
    }

    .prestasi-detail-placeholder {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f5ee;
        color: #d99a16;
        font-size: 75px;
    }

    .prestasi-detail-content {
        padding: 40px;
    }

    .prestasi-detail-year {
        display: inline-block;
        background: #e8f5ee;
        color: #006b3c;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .prestasi-detail-title {
        color: #173d2d;
        font-size: 36px;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 25px;
    }

    .prestasi-detail-heading {
        color: #006b3c;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .prestasi-detail-text {
        color: #65736c;
        font-size: 16px;
        line-height: 1.9;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .prestasi-back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 30px;
        padding: 11px 22px;
        border-radius: 30px;
        background: #006b3c;
        color: #fff !important;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .3s;
    }

    .prestasi-back-button:hover {
        background: #16a05d;
    }

    @media (max-width: 576px) {
        .prestasi-detail-page {
            padding: 30px 15px;
        }

        .prestasi-detail-content {
            padding: 25px;
        }

        .prestasi-detail-title {
            font-size: 27px;
        }
    }
</style>

<section class="prestasi-detail-page">
    <div class="prestasi-detail-container">

        <article class="prestasi-detail-card mt-5">

            {{-- Foto Prestasi --}}
            @if($prestasi->foto)
                <img
                    src="{{ asset('storage/' . $prestasi->foto) }}"
                    class="prestasi-detail-image"
                    alt="{{ $prestasi->nama_prestasi }}">
            @else
                <div class="prestasi-detail-placeholder">
                    <i class="fas fa-trophy"></i>
                </div>
            @endif

            <div class="prestasi-detail-content">

                {{-- Tahun Ajaran --}}
                <div class="prestasi-detail-year">
                    <i class="far fa-calendar-alt me-2"></i>
                    Tahun Ajaran:
                    {{ $prestasi->tahun_ajaran ?: 'Tidak dicantumkan' }}
                </div>

                {{-- Nama Prestasi --}}
                <h1 class="prestasi-detail-title">
                    {{ $prestasi->nama_prestasi }}
                </h1>

                <hr>

                <div class="prestasi-detail-text">{{ $prestasi->deskripsi ?: 'Belum ada deskripsi untuk prestasi ini.' }}</div>

                {{-- Tombol Kembali --}}
                <a href="{{ url('/#prestasi') }}"
                   class="prestasi-back-button">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Prestasi
                </a>

            </div>
        </article>

    </div>
</section>

@endsection