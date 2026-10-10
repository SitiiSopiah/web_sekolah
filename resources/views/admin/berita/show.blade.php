@extends('template.landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMPN 2 MANGUNREJA</title>

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

        .detail-navbar {
            background: #006b3c;
            padding: 18px 0;
        }

        .detail-navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .detail-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .detail-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(25, 65, 45, .10);
        }

        .detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .detail-content {
            padding: 40px;
        }

        .detail-date {
            color: #c49a2c;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .detail-title {
            color: #173d2d;
            font-size: 36px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 25px;
        }

        .detail-text {
            color: #65736c;
            font-size: 16px;
            line-height: 1.9;
        }

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
        }

        @media(max-width: 576px) {

            .detail-content {
                padding: 25px;
            }

            .detail-title {
                font-size: 27px;
            }

        }

    </style>

</head>

<body>


    <nav class="detail-navbar">

        <div class="container">

            <a href="{{ url('/') }}">

                <i class="fas fa-school mr-2"></i>

                SMPN 2 MANGUNREJA

            </a>

        </div>

    </nav>


    <div class="detail-container">

        <div class="detail-card">

            @if($berita->gambar)

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    class="detail-image"
                    alt="{{ $berita->judul }}">

            @endif


            <div class="detail-content">

                <div class="detail-date">

                    <i class="far fa-calendar-alt mr-1"></i>

                    {{ $berita->tanggal
                        ? $berita->tanggal->format('d F Y')
                        : '-' }}

                </div>


                <h1 class="detail-title">

                    {{ $berita->judul }}

                </h1>


                <div class="detail-text">

                    {!! nl2br(e($berita->isi)) !!}

                </div>


                <a
                    href="{{ url('/#berita') }}"
                    class="back-button">

                    <i class="fas fa-arrow-left"></i>

                    Kembali ke Berita

                </a>

            </div>

        </div>

    </div>

</body>
@endsection