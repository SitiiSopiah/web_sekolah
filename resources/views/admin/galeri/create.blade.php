@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-white">Tambah Galeri</h1>
            <p class="text-white">
                Tambahkan dokumentasi kegiatan sekolah.
            </p>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">

    <div class="row">
        <div class="col-xl-10 mx-auto">

            <div class="card shadow">

                <div class="card-header border-0">
                    <h3 class="mb-0">
                        <i class="fas fa-images text-primary mr-2"></i>
                        Form Tambah Galeri
                    </h3>
                </div>

                <div class="card-body">

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

                    <form action="{{ route('galeri.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- Judul --}}
                        <div class="form-group">
                            <label for="judul">
                                Judul Galeri
                            </label>

                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control"
                                value="{{ old('judul') }}"
                                placeholder="Masukkan judul galeri"
                                required
                            >
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label for="kategori">Kategori</label>

                            <select
                                name="kategori"
                                id="kategori"
                                class="form-control"
                                required
                            >
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Foto" {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>
                                <option value="Video" {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>
                            </select>
                        </div>

                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">
                                Tanggal
                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-control"
                                value="{{ old('tanggal') }}"
                                required
                            >
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group">
                            <label for="keterangan">
                                Keterangan
                            </label>

                            <textarea
                                name="keterangan"
                                id="keterangan"
                                rows="5"
                                class="form-control"
                                placeholder="Masukkan keterangan galeri..."
                            >{{ old('keterangan') }}</textarea>
                        </div>

                        {{-- File --}}
                        <div class="form-group">
                            <label for="file">File Foto / Video</label>

                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control-file"
                                accept="image/*,video/*"
                                required
                            >

                            <small class="form-text text-muted">
                                Pilih file sesuai kategori Foto atau Video.
                            </small>
                        </div>

                        {{-- Preview --}}
                        <div class="form-group">
                            <img
                                id="preview"
                                src="#"
                                alt="Preview"
                                style="
                                    display:none;
                                    max-width:300px;
                                    max-height:200px;
                                    object-fit:cover;
                                    border-radius:10px;
                                "
                            >
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('galeri.index') }}"
                               class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Kembali
                            </a>

                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i>
                                Simpan
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@push('js')
<script>
    document.getElementById('file').addEventListener('change', function(event) {

        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>
@endpush