@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <h1 class="text-white">
            Edit Berita
        </h1>

        <p class="text-white">
            Perbarui data berita
        </p>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">

            <h3 class="mb-0">
                Form Edit Berita
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
                action="{{ route('berita.update', $berita->id_berita) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="form-group">

                    <label>
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul', $berita->judul) }}"
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
                        required
                    >{{ old('isi', $berita->isi) }}</textarea>

                </div>


                <div class="form-group">

                    <label>
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal', optional($berita->tanggal)->format('Y-m-d')) }}"
                        required
                    >

                </div>


                @if($berita->gambar)

                    <div class="form-group">

                        <label>
                            Gambar Saat Ini
                        </label>

                        <br>

                        <img
                            src="{{ asset('assets/img/berita/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            width="200"
                            height="130"
                            style="
                                object-fit: cover;
                                border-radius: 8px;
                            "
                        >

                    </div>

                @endif


                <div class="form-group">

                    <label>
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control-file"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>


                <div class="form-group">

                    <label>
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-control"
                        required
                    >

                        <option value="Draft"
                            {{ old('status', $berita->status) == 'Draft'
                                ? 'selected'
                                : '' }}>
                            Draft
                        </option>

                        <option value="Publish"
                            {{ old('status', $berita->status) == 'Publish'
                                ? 'selected'
                                : '' }}>
                            Publish
                        </option>

                    </select>

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
                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection