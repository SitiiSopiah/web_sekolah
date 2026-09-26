@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Tambah User
                    </h6>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="container-fluid mt--6">

    <div class="card">

        <div class="card-header">
            <h3 class="mb-0">
                Form Tambah User
            </h3>
        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">
                    <ul class="mb-0">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>

            @endif

            <form action="{{ route('users.store') }}"
                  method="POST">

                @csrf

                <div class="form-group">

                    <label>
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           value="{{ old('username') }}"
                           placeholder="Masukkan username"
                           required>

                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Minimal 6 karakter"
                           required>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>
                        Konfirmasi Password
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password"
                           required>

                </div>

                <div class="form-group">

                    <label>
                        Role
                    </label>

                    <select name="role"
                            class="form-control @error('role') is-invalid @enderror"
                            required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="Admin"
                            {{ old('role') == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="Operator"
                            {{ old('role') == 'Operator' ? 'selected' : '' }}>
                            Operator
                        </option>

                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                
                <a href="{{ route('users.index') }}"
                    class="btn btn-md btn-white">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection