@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <h1 class="text-white">
            Tambah Ekstrakurikuler
        </h1>

        <p class="text-white mb-0">
            Tambahkan data ekstrakurikuler SMPN 2 MANGUNREJA
        </p>
    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header bg-white">
            <h3 class="mb-0">
                Form Tambah Ekstrakurikuler
            </h3>
        </div>


        <div class="card-body">

            <form action="{{ route('ekstrakurikuler.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- Nama --}}
                <div class="form-group">
                    <label>
                        Nama Ekstrakurikuler
                    </label>

                    <input type="text"
                           name="nama_ekskul"
                           class="form-control @error('nama_ekskul') is-invalid @enderror"
                           value="{{ old('nama_ekskul') }}"
                           placeholder="Contoh: Pramuka">

                    @error('nama_ekskul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Pembina --}}
                <div class="form-group">
                    <label>
                        Pembina
                    </label>

                    <input type="text"
                           name="pembina"
                           class="form-control @error('pembina') is-invalid @enderror"
                           value="{{ old('pembina') }}"
                           placeholder="Nama pembina">

                    @error('pembina')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Jadwal --}}
                <div class="form-group">
                    <label>
                        Jadwal Latihan
                    </label>

                    <input type="text"
                           name="jadwal_latihan"
                           class="form-control @error('jadwal_latihan') is-invalid @enderror"
                           value="{{ old('jadwal_latihan') }}"
                           placeholder="Contoh: Sabtu, 08.00 - 10.00">

                    @error('jadwal_latihan')
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
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Deskripsi ekstrakurikuler">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Gambar --}}
                <div class="form-group">
                    <label>
                        Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control-file @error('gambar') is-invalid @enderror"
                           accept="image/png,image/jpeg">

                    <small class="form-text text-muted">
                        Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <hr>


                <a href="{{ route('ekstrakurikuler.index') }}"
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