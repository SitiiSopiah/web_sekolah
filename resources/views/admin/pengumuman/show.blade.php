@extends('template.landing')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $pengumuman->judul }} - SMPN 2 MANGUNREJA</title>

    <link rel="icon"
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

        .navbar-detail {
            background: #006b3c;
            padding: 18px 0;
        }

        .navbar-detail a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .container-detail {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card-detail {
            background: #fff;
            padding: 45px;
            border-radius: 12px;
            box-shadow: 0 10px 35px rgba(25, 65, 45, .10);
            border-left: 5px solid #d9aa32;
        }

        .date {
            color: #c49a2c;
            font-size: 13px;
            margin-bottom: 15px;
        }

        h1 {
            color: #173d2d;
            font-size: 36px;
            line-height: 1.3;
            margin-bottom: 25px;
        }

        .isi {
            color: #65736c;
            font-size: 16px;
            line-height: 1.9;
        }

        .back-button {
            display: inline-flex;
            gap: 8px;
            align-items: center;

            margin-top: 30px;

            padding: 11px 22px;

            border-radius: 30px;

            background: #006b3c;
            color: white !important;

            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #16a05d;
        }

    </style>

</head>

<body>


<nav class="navbar-detail">

    <div class="container">

        <a href="{{ url('/') }}">

            <i class="fas fa-school mr-2"></i>

            SMPN 2 MANGUNREJA

        </a>

    </div>

</nav>


<div class="container-detail">

    <div class="card-detail">

        <div class="date">

            <i class="far fa-calendar-alt mr-1"></i>

            {{ $pengumuman->tanggal
                ? $pengumuman->tanggal->format('d F Y')
                : '-' }}

        </div>


        <h1>
            {{ $pengumuman->judul }}
        </h1>


        <div class="isi">

            {!! nl2br(e($pengumuman->isi)) !!}

        </div>


        <a
            href="{{ url('/#pengumuman') }}"
            class="back-button">

            <i class="fas fa-arrow-left"></i>

            Kembali ke Pengumuman

        </a>

    </div>

</div>
@endsection