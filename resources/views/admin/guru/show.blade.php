@extends('template.landing')

@section('title')
    Guru & Staff - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $guru->nama_guru }} - SMPN 2 MANGUNREJA</title>

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

        .guru-detail {
            max-width: 850px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .guru-detail-card {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 35px rgba(25, 65, 45, .10);
        }

        .guru-photo {
            width: 230px;
            height: 280px;
            object-fit: cover;
            border-radius: 12px;
        }

        .guru-placeholder {
            width: 230px;
            height: 280px;
            border-radius: 12px;
            background: #e8f3ed;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #16a05d;
            font-size: 70px;
        }

        .guru-name {
            color: #173d2d;
            font-size: 32px;
            font-weight: 700;
        }

        .guru-mapel {
            color: #16a05d;
            font-size: 17px;
            margin: 10px 0 25px;
        }

        .guru-data {
            color: #65736c;
            line-height: 1.8;
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


<div class="guru-detail">

    <div class="guru-detail-card">

        <div class="row align-items-center">

            <div class="col-md-4 text-center mb-4 mb-md-0">

                @if($guru->foto)

                    <img
                        src="{{ asset('storage/' . $guru->foto) }}"
                        class="guru-photo"
                        alt="{{ $guru->nama_guru }}">

                @else

                    <div class="guru-placeholder">

                        <i class="fas fa-user"></i>

                    </div>

                @endif

            </div>


            <div class="col-md-8">

                <h1 class="guru-name">

                    {{ $guru->nama_guru }}

                </h1>


                <div class="guru-mapel">

                    {{ $guru->mapel ?? 'Guru SMPN 2 MANGUNREJA' }}

                </div>


                @if($guru->nip)

                    <div class="guru-data">

                        <strong>NIP</strong>

                        <br>

                        {{ $guru->nip }}

                    </div>

                @endif


                <div class="guru-data mt-3">

                    <strong>Tenaga Pendidik</strong>

                    <br>

                    SMPN 2 MANGUNREJA

                </div>


                <a
                    href="{{ url('/#guru') }}"
                    class="back-button">

                    <i class="fas fa-arrow-left"></i>

                    Kembali ke Guru

                </a>

            </div>

        </div>

    </div>

</div>


</body>
@endsection