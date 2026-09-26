@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <h1 class="text-white">
            Tambah Prestasi
        </h1>

        <p class="text-white mb-0">
            Tambahkan prestasi SMPN 2 MANGUNREJA
        </p>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header bg-white">

            <h3 class="mb-0">
                Form Tambah Prestasi
            </h3>

        </div>


        <div class="card-body">

            <form action="{{ route('prestasi.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- FOTO --}}
                <div class="form-group">

                    <label>
                        Foto Prestasi
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control-file"
                           accept="image/png,image/jpeg">

                    <small class="text-muted">
                        Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                    </small>

                    @error('foto')

                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                {{-- Nama Prestasi --}}
                <div class="form-group">

                    <label>
                        Nama Prestasi
                    </label>

                    <input type="text"
                           name="nama_prestasi"
                           class="form-control @error('nama_prestasi') is-invalid @enderror"
                           value="{{ old('nama_prestasi') }}"
                           placeholder="Contoh: Juara 1 Olimpiade Matematika">

                    @error('nama_prestasi')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Tahun Ajaran --}}
                <div class="form-group">

                    <label>
                        Tahun Ajaran
                    </label>

                    <input type="text"
                           name="tahun_ajaran"
                           class="form-control @error('tahun_ajaran') is-invalid @enderror"
                           value="{{ old('tahun_ajaran') }}"
                           placeholder="Contoh: 2025/2026">

                    @error('tahun_ajaran')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Deskripsi --}}
                <div class="form-group">

                    <label>
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control"
                              placeholder="Deskripsi prestasi">{{ old('deskripsi') }}</textarea>

                </div>


                <hr>


                <a href="{{ route('prestasi.index') }}"
                   class="btn btn-secondary">

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