<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - SMPN 2 MANGUNREJA</title>

    {{-- Favicon --}}
    <link rel="icon"
          type="image/png"
          href="{{ asset('assets/img/brand/favicon.png') }}">

    {{-- Font --}}
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">

    {{-- Argon CSS --}}
    <link rel="stylesheet"
          href="{{ asset('assets/css/argon.css?v=1.0.0') }}">

    <style>

        body {
            background: #f8f9fe;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            border: 0;
            border-radius: 12px;
            box-shadow: 0 0 2rem rgba(136, 152, 170, .15);
            overflow: hidden;
        }

        .login-header {
            text-align: center;
            padding: 35px 30px 20px;
        }

        .school-title {
            font-size: 24px;
            font-weight: 700;
            color: #5e72e4;
            margin-bottom: 2px;
        }

        .school-subtitle {
            font-size: 14px;
            font-weight: 600;
            color: #8898aa;
            letter-spacing: .5px;
        }

        .login-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #5e72e4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            box-shadow: 0 8px 20px rgba(94, 114, 228, .25);
        }

        .login-body {
            padding: 10px 35px 35px;
        }

        .form-control {
            height: 48px;
            border-radius: 8px;
        }

        .input-group-text {
            border-radius: 8px 0 0 8px;
        }

        .login-button {
            height: 48px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        .login-footer {
            text-align: center;
            color: #8898aa;
            font-size: 13px;
            padding-bottom: 25px;
        }

    </style>

</head>


<body>

<div class="login-wrapper">

    <div class="card login-card">

        {{-- HEADER --}}
        <div class="login-header">

            <div class="mb-3">
                <img src="{{ asset('storage/logosmp1.png') }}"
                    alt="Logo SMPN 2 MANGUNREJA"
                    style="
                        width: 90px;
                        height: 90px;
                        object-fit: contain;
                    ">
            </div>

            <div class="school-title">
                SMPN 2 MANGUNREJA
            </div>

            <h3 class="mt-3 mb-1">
                Selamat Datang
            </h3>

            <p class="text-muted mb-0">
                Silakan login untuk melanjutkan
            </p>

        </div>


        {{-- BODY --}}
        <div class="login-body">

            {{-- ERROR LOGIN --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">

                    <span class="alert-inner--icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>

                    <span class="alert-inner--text">
                        {{ session('error') }}
                    </span>

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        <span>
                            &times;
                        </span>

                    </button>

                </div>
            @endif


            {{-- ERROR VALIDASI --}}
            @if($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0 pl-3">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>
            @endif


            <form action="{{ route('login.process') }}"
                  method="POST">

                @csrf


                {{-- USERNAME --}}
                <div class="form-group mb-4">

                    <label class="form-control-label"
                           for="username">

                        Username

                    </label>

                    <div class="input-group input-group-alternative">

                        <div class="input-group-prepend">

                            <span class="input-group-text">
                                <i class="ni ni-single-02"></i>
                            </span>

                        </div>

                        <input type="text"
                               id="username"
                               name="username"
                               class="form-control @error('username') is-invalid @enderror"
                               placeholder="Masukkan username"
                               value="{{ old('username') }}"
                               autocomplete="username"
                               required>

                    </div>

                    @error('username')

                        <small class="text-danger">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                {{-- PASSWORD --}}
                <div class="form-group mb-4">

                    <label class="form-control-label"
                           for="password">

                        Password

                    </label>

                    <div class="input-group input-group-alternative">

                        <div class="input-group-prepend">

                            <span class="input-group-text">
                                <i class="ni ni-lock-circle-open"></i>
                            </span>

                        </div>

                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password"
                               autocomplete="current-password"
                               required>

                    </div>

                    @error('password')

                        <small class="text-danger">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                {{-- INGAT SAYA --}}
                <div class="custom-control custom-checkbox mb-4">

                    <input type="checkbox"
                           class="custom-control-input"
                           id="remember"
                           name="remember">

                    <label class="custom-control-label"
                           for="remember">

                        Ingat saya

                    </label>

                </div>


                {{-- BUTTON --}}
                <button type="submit"
                        class="btn btn-primary btn-block login-button">

                    <i class="fas fa-sign-in-alt mr-2"></i>

                    Login

                </button>

            </form>

        </div>


        {{-- FOOTER --}}
        <div class="login-footer">

            Sistem Informasi
            <strong>SMPN 2 MANGUNREJA</strong>

        </div>

    </div>

</div>


{{-- JS --}}
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>

</body>

</html>