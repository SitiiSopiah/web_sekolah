@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="header-body">

            <h1 class="text-white">
                Tambah Guru
            </h1>

            <p class="text-white mb-0">
                Tambahkan data guru SMPN 2 MANGUNREJA
            </p>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">
                Form Tambah Guru
            </h3>

        </div>


        <div class="card-body">

            <form action="{{ route('guru.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- NIP --}}
                <div class="form-group">

                    <label>
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip') }}"
                           placeholder="Masukkan NIP">

                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Nama Guru --}}
                <div class="form-group">

                    <label>
                        Nama Guru
                    </label>

                    <input type="text"
                           name="nama_guru"
                           class="form-control @error('nama_guru') is-invalid @enderror"
                           value="{{ old('nama_guru') }}"
                           placeholder="Masukkan nama guru">

                    @error('nama_guru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Mata Pelajaran --}}
                <div class="form-group">

                    <label>
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mapel"
                           class="form-control @error('mapel') is-invalid @enderror"
                           value="{{ old('mapel') }}"
                           placeholder="Contoh: Matematika">

                    @error('mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto --}}
                <div class="form-group">

                    <label>
                        Foto Guru
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control-file @error('foto') is-invalid @enderror"
                           accept=".jpg,.jpeg,.png">

                    <small class="form-text text-muted">
                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="mt-4">

                    <a href="{{ route('guru.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection