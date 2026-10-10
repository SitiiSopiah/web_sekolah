@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4 pb-5">

    {{-- HEADER --}}
    <div class="card bg-gradient-success shadow mb-4"
         style="background: linear-gradient(135deg, #006b3c, #079447); border: none;">

        <div class="card-body py-4">
            <h2 class="text-white font-weight-bold mb-2">
                <i class="fas fa-user-circle mr-2"></i>
                My Profile
            </h2>

            <p class="text-white mb-0">
                Kelola informasi akun dan keamanan akun kamu.
            </p>
        </div>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        {{-- INFORMASI AKUN --}}
        <div class="col-xl-4 col-lg-5 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-header bg-white border-0">
                    <h3 class="mb-0 text-dark">
                        Informasi Akun
                    </h3>
                </div>

                <div class="card-body text-center">

                    <div class="rounded-circle bg-success d-inline-flex
                                align-items-center justify-content-center mb-3"
                         style="width: 100px; height: 100px; background-color: #006b3c !important;">

                        <i class="fas fa-user fa-3x text-white"></i>

                    </div>

                    <h2 class="h3 mb-2">
                        {{ auth()->user()->username }}
                    </h2>

                    <span class="badge badge-success mb-4">
                        {{ auth()->user()->role }}
                    </span>

                    <hr>

                    <div class="text-left">
                        <p class="mb-1 text-muted small">Username</p>
                        <p class="font-weight-bold text-dark">
                            {{ auth()->user()->username }}
                        </p>

                        <p class="mb-1 text-muted small">Hak Akses</p>
                        <p class="font-weight-bold text-dark">
                            {{ auth()->user()->role }}
                        </p>

                        <p class="mb-1 text-muted small">ID Pengguna</p>
                        <p class="font-weight-bold text-dark mb-0">
                            {{ auth()->user()->id_user }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        {{-- FORM PROFIL DAN PASSWORD --}}
        <div class="col-xl-8 col-lg-7">

            {{-- UBAH PROFIL --}}
            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-white">
                    <h3 class="mb-0">
                        <i class="fas fa-user-edit mr-2 text-success"></i>
                        Ubah Profil
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profil.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="username">Username</label>

                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control"
                                value="{{ old('username', auth()->user()->username) }}"
                                maxlength="255"
                                required
                            >
                        </div>

                        <button type="submit"
                                class="btn text-white"
                                style="background-color: #006b3c;">

                            <i class="fas fa-save mr-1"></i>
                            Simpan Perubahan

                        </button>

                    </form>

                </div>
            </div>

            {{-- UBAH PASSWORD --}}
            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-white">
                    <h3 class="mb-0">
                        <i class="fas fa-lock mr-2 text-success"></i>
                        Ubah Password
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profil.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password">
                                Password Saat Ini
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="form-control"
                                autocomplete="current-password"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru</label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                minlength="8"
                                autocomplete="new-password"
                                required
                            >

                            <small class="form-text text-muted">
                                Minimal 8 karakter.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                Konfirmasi Password Baru
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                minlength="8"
                                autocomplete="new-password"
                                required
                            >
                        </div>

                        <button type="submit"
                                class="btn text-white"
                                style="background-color: #006b3c;">

                            <i class="fas fa-key mr-1"></i>
                            Perbarui Password

                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection