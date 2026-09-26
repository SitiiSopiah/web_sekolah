@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Edit User
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
                Form Edit User
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

            <form action="{{ route('users.update', $user->id_user) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ old('username', $user->username) }}"
                           required>

                </div>

                <div class="form-group">

                    <label>
                        Password Baru
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak ingin mengubah password">

                    <small class="text-muted">
                        Kosongkan jika password tidak ingin diubah.
                    </small>

                </div>

                <div class="form-group">

                    <label>
                        Konfirmasi Password Baru
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password baru">

                </div>

                <div class="form-group">

                    <label>
                        Role
                    </label>

                    <select name="role"
                            class="form-control"
                            required>

                        <option value="Admin"
                            {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="Operator"
                            {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
                            Operator
                        </option>

                    </select>

                </div>

                <a href="{{ route('users.index') }}"
                    class="btn btn-md btn-white">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection