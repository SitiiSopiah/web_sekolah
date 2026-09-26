@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4">

    {{-- Header --}}
    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-white border-0 py-4">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-school"></i>
                    </div>
                </div>

                <div>
                    <h2 class="mb-1 font-weight-bold">
                        Tambah Profil Sekolah
                    </h2>
                    <p class="text-muted mb-0">
                        Lengkapi informasi profil SMPN 2 MANGUNREJA
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form --}}
    <form action="{{ route('profil_sekolah.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            {{-- Informasi Utama --}}
            <div class="col-lg-8">

                <div class="card shadow border-0 mb-4">

                    <div class="card-header bg-white border-0">
                        <h3 class="mb-0">
                            <i class="fas fa-school text-primary mr-2"></i>
                            Informasi Sekolah
                        </h3>
                    </div>

                    <div class="card-body">

                        {{-- Nama Sekolah --}}
                        <div class="form-group">
                            <label for="nama_sekolah">
                                Nama Sekolah
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="nama_sekolah"
                                   id="nama_sekolah"
                                   class="form-control @error('nama_sekolah') is-invalid @enderror"
                                   value="{{ old('nama_sekolah', 'SMPN 2 MANGUNREJA') }}"
                                   placeholder="Masukkan nama sekolah"
                                   required>

                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        {{-- Kepala Sekolah --}}
                        <div class="form-group">
                            <label for="kepala_sekolah">
                                Kepala Sekolah
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="kepala_sekolah"
                                   id="kepala_sekolah"
                                   class="form-control @error('kepala_sekolah') is-invalid @enderror"
                                   value="{{ old('kepala_sekolah') }}"
                                   placeholder="Masukkan nama kepala sekolah"
                                   required>

                            @error('kepala_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        {{-- NPSN --}}
                        <div class="form-group">
                            <label for="npsn">
                                NPSN
                            </label>

                            <input type="text"
                                   name="npsn"
                                   id="npsn"
                                   class="form-control @error('npsn') is-invalid @enderror"
                                   value="{{ old('npsn') }}"
                                   placeholder="Masukkan NPSN">

                            @error('npsn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        {{-- Alamat --}}
                        <div class="form-group">
                            <label for="alamat">
                                Alamat Sekolah
                            </label>

                            <textarea name="alamat"
                                      id="alamat"
                                      rows="3"
                                      class="form-control @error('alamat') is-invalid @enderror"
                                      placeholder="Masukkan alamat sekolah">{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="row">

                            {{-- Kontak --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kontak">
                                        Kontak
                                    </label>

                                    <input type="text"
                                           name="kontak"
                                           id="kontak"
                                           class="form-control @error('kontak') is-invalid @enderror"
                                           value="{{ old('kontak') }}"
                                           placeholder="Contoh: 0265xxxxxx">

                                    @error('kontak')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            {{-- Tahun Berdiri --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_berdiri">
                                        Tahun Berdiri
                                    </label>

                                    <input type="text"
                                           name="tahun_berdiri"
                                           id="tahun_berdiri"
                                           class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                           value="{{ old('tahun_berdiri') }}"
                                           placeholder="Contoh: 1995"
                                           maxlength="4">

                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi">
                                Deskripsi Sekolah
                            </label>

                            <textarea name="deskripsi"
                                      id="deskripsi"
                                      rows="5"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Tuliskan deskripsi singkat tentang sekolah">{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        {{-- Visi Misi --}}
                        <div class="form-group mb-0">
                            <label for="visi_misi">
                                Visi & Misi
                            </label>

                            <textarea name="visi_misi"
                                      id="visi_misi"
                                      rows="7"
                                      class="form-control @error('visi_misi') is-invalid @enderror"
                                      placeholder="Tuliskan visi dan misi sekolah">{{ old('visi_misi') }}</textarea>

                            @error('visi_misi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>


            {{-- Foto --}}
            <div class="col-lg-4">

                {{-- Logo --}}
                <div class="card shadow border-0 mb-4">

                    <div class="card-header bg-white border-0">
                        <h3 class="mb-0">
                            <i class="fas fa-image text-primary mr-2"></i>
                            Logo Sekolah
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="text-center mb-3">

                            <div id="logo-preview"
                                 class="mx-auto d-flex align-items-center justify-content-center bg-light rounded"
                                 style="width:180px; height:180px; overflow:hidden;">

                                <i class="fas fa-school text-muted"
                                   style="font-size:70px;"></i>

                            </div>

                        </div>

                        <div class="form-group mb-0">

                            <label for="logo">
                                Pilih Logo
                            </label>

                            <input type="file"
                                   name="logo"
                                   id="logo"
                                   class="form-control-file @error('logo') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png">

                            <small class="form-text text-muted">
                                Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                            </small>

                            @error('logo')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>
                </div>


                {{-- Foto Kepala Sekolah --}}
                <div class="card shadow border-0 mb-4">

                    <div class="card-header bg-white border-0">
                        <h3 class="mb-0">
                            <i class="fas fa-user-tie text-primary mr-2"></i>
                            Foto Kepala Sekolah
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="text-center mb-3">

                            <div id="foto-preview"
                                 class="mx-auto rounded-circle bg-light d-flex align-items-center justify-content-center"
                                 style="width:180px; height:180px; overflow:hidden;">

                                <i class="fas fa-user text-muted"
                                   style="font-size:70px;"></i>

                            </div>

                        </div>

                        <div class="form-group mb-0">

                            <label for="foto">
                                Pilih Foto
                            </label>

                            <input type="file"
                                   name="foto"
                                   id="foto"
                                   class="form-control-file @error('foto') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png">

                            <small class="form-text text-muted">
                                Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                            </small>

                            @error('foto')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>
                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class="card shadow border-0 mb-5">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <a href="{{ route('profil_sekolah.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Simpan Profil
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- Preview Gambar --}}
<script>
    document.getElementById('logo').addEventListener('change', function(event) {

        const file = event.target.files[0];
        const preview = document.getElementById('logo-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}"
                         style="width:100%; height:100%; object-fit:contain;">
                `;
            };

            reader.readAsDataURL(file);
        }
    });


    document.getElementById('foto').addEventListener('change', function(event) {

        const file = event.target.files[0];
        const preview = document.getElementById('foto-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}"
                         style="width:100%; height:100%; object-fit:cover;">
                `;
            };

            reader.readAsDataURL(file);
        }
    });
</script>

@endsection