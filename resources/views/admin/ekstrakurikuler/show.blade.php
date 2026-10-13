@extends('template.landing')

@section('title')
    Guru & Staff - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $ekstrakurikuler->nama_ekskul }} - SMPN 2 MANGUNREJA
    </title>

    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/img/brand/favicon.png') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <style>

        body {
            background: #f5f8f6;
            font-family: Arial, Helvetica, sans-serif;
            color: #173d2d;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .detail-navbar {
            background: #006b3c;
            padding: 18px 0;
        }

        .detail-navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .detail-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .detail-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(25, 65, 45, .10);
        }


        /* =====================================================
           IMAGE
        ===================================================== */

        .detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .detail-image-empty {
            width: 100%;
            height: 350px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e8f5ee;
            color: #006b3c;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .detail-content {
            padding: 40px;
        }


        /* =====================================================
           LABEL
        ===================================================== */

        .detail-label {
            color: #c49a2c;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .detail-title {
            color: #173d2d;
            font-size: 36px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 25px;
        }


        /* =====================================================
           INFO
        ===================================================== */

        .detail-info {
            background: #f5f9f7;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .detail-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .detail-info-item:last-child {
            margin-bottom: 0;
        }

        .detail-info-icon {
            width: 38px;
            height: 38px;

            min-width: 38px;

            border-radius: 50%;

            background: #e0f1e8;
            color: #006b3c;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;
        }

        .detail-info-title {
            color: #173d2d;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .detail-info-text {
            color: #65736c;
            font-size: 14px;
        }


        /* =====================================================
           DESCRIPTION
        ===================================================== */

        .detail-text {
            color: #65736c;
            font-size: 16px;
            line-height: 1.9;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .back-button {
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

        .back-button:hover {
            background: #16a05d;
            color: #fff !important;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 576px) {

            .detail-content {
                padding: 25px;
            }

            .detail-title {
                font-size: 27px;
            }

            .detail-image {
                max-height: 300px;
            }

        }

    </style>

</head>


<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

<nav class="detail-navbar">

    <div class="container">

        <a href="{{ url('/') }}">

            <i class="fas fa-school mr-2"></i>

            SMPN 2 MANGUNREJA

        </a>

    </div>

</nav>



{{-- =========================================================
     DETAIL
========================================================= --}}

<div class="detail-container">

    <div class="detail-card">


        {{-- =================================================
             FOTO EKSTRAKURIKULER
        ================================================== --}}

        @if($ekstrakurikuler->gambar)

            <img
                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                class="detail-image"
                alt="{{ $ekstrakurikuler->nama_ekskul }}">

        @else

            <div class="detail-image-empty">

                <i class="fas fa-running fa-5x"></i>

            </div>

        @endif



        {{-- =================================================
             CONTENT
        ================================================== --}}

        <div class="detail-content">


            {{-- LABEL --}}

            <div class="detail-label">

                PENGEMBANGAN SISWA

            </div>



            {{-- JUDUL --}}

            <h1 class="detail-title">

                {{ $ekstrakurikuler->nama_ekskul }}

            </h1>

            <div class="detail-info">

                @if($ekstrakurikuler->pembina)

                    <div class="detail-info-item">

                        <div class="detail-info-icon">

                            <i class="fas fa-user-tie"></i>

                        </div>

                        <div>

                            <div class="detail-info-title">

                                Pembina

                            </div>

                            <div class="detail-info-text">

                                {{ $ekstrakurikuler->pembina }}

                            </div>

                        </div>

                    </div>

                @endif



                {{-- JADWAL --}}

                @if($ekstrakurikuler->jadwal_latihan)

                    <div class="detail-info-item">

                        <div class="detail-info-icon">

                            <i class="far fa-calendar-alt"></i>

                        </div>

                        <div>

                            <div class="detail-info-title">

                                Jadwal Latihan

                            </div>

                            <div class="detail-info-text">

                                {{ $ekstrakurikuler->jadwal_latihan }}

                            </div>

                        </div>

                    </div>

                @endif


            </div>



            {{-- =================================================
                 DESKRIPSI
            ================================================== --}}

            @if($ekstrakurikuler->deskripsi)

                <div class="detail-text">

                    {!! nl2br(e($ekstrakurikuler->deskripsi)) !!}

                </div>

            @else

                <div class="detail-text">

                    Kegiatan ekstrakurikuler
                    <strong>
                        {{ $ekstrakurikuler->nama_ekskul }}
                    </strong>
                    merupakan salah satu kegiatan pengembangan
                    minat, bakat, dan kreativitas siswa
                    di SMPN 2 MANGUNREJA.

                </div>

            @endif

            <a
                href="{{ url('/#ekstrakurikuler') }}"
                class="back-button">

                <i class="fas fa-arrow-left"></i>

                Kembali ke Ekstrakurikuler

            </a>


        </div>

    </div>

</div>


</body>
@endsection