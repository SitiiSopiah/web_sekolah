@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-white">Edit Siswa</h1>
            <p class="text-white mb-0">
                Perbarui data siswa
            </p>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Form Edit Siswa</h3>
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

            <form action="{{ route('siswa.update', $siswa->id_siswa) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>NISN</label>

                    <input type="text"
                           name="nisn"
                           class="form-control"
                           value="{{ old('nisn', $siswa->nisn) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control"
                           value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>

                    <select name="jenis_kelamin"
                            class="form-control"
                            required>

                        <option value="Laki-Laki"
                            {{ $siswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Tahun Masuk</label>

                    <input type="number"
                           name="tahun_masuk"
                           class="form-control"
                           value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                           required>
                </div>

                <a href="{{ route('siswa.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update
                </button>

            </form>

        </div>
    </div>

</div>

@endsection