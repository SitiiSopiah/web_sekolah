@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <h1 class="text-white">
            Tambah Berita
        </h1>

        <p class="text-white">
            Tambahkan berita baru SMPN 2 MANGUNREJA
        </p>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">
                Form Tambah Berita
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


            <form
                action="{{ route('berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="form-group">

                    <label>
                        Gambar Berita
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control-file"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>

                </div>

                <div class="form-group">

                    <label>
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
                        placeholder="Masukkan judul berita"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Isi Berita
                    </label>

                    <textarea
                        name="isi"
                        class="form-control"
                        rows="8"
                        placeholder="Masukkan isi berita"
                        required
                    >{{ old('isi') }}</textarea>

                </div>


                <div class="form-group">

                    <label>
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select name="status"
                            id="status"
                            class="form-control @error('status') is-invalid @enderror"
                            required>

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option value="Publish"
                            {{ old('status') == 'Publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                        <option value="Draft"
                            {{ old('status') == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <a
                    href="{{ route('berita.index') }}"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="fas fa-save"></i>
                    Simpan Berita

                </button>

            </form>

        </div>

    </div>

</div>

@endsection