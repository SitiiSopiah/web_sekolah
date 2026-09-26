@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="header-body">

            <h1 class="text-white">
                Edit Guru
            </h1>

            <p class="text-white mb-0">
                Perbarui data guru SMPN 2 MANGUNREJA
            </p>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">
                Form Edit Guru
            </h3>

        </div>


        <div class="card-body">

            <form action="{{ route('guru.update', $guru->id_guru) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- NIP --}}
                <div class="form-group">

                    <label>
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip', $guru->nip) }}">

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
                           value="{{ old('nama_guru', $guru->nama_guru) }}">

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
                           value="{{ old('mapel', $guru->mapel) }}">

                    @error('mapel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto Lama --}}
                @if($guru->foto)

                    <div class="form-group">

                        <label>
                            Foto Saat Ini
                        </label>

                        <br>

                        <img src="{{ asset('storage/' . $guru->foto) }}"
                             width="100"
                             height="100"
                             style="object-fit: cover; border-radius: 10px;">

                    </div>

                @endif


                {{-- Foto Baru --}}
                <div class="form-group">

                    <label>
                        Ganti Foto
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control-file"
                           accept=".jpg,.jpeg,.png">

                    <small class="form-text text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

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
                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection