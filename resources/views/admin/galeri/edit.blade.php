```blade
@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col">
                    <h1 class="text-white font-weight-bold mb-2">
                        Edit Galeri
                    </h1>
                    <p class="text-white mb-0">
                        Perbarui informasi dokumentasi sekolah.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CARD FORM --}}
<div class="container-fluid mt--7 pb-5">
    <div class="row">
        <div class="col-12">

            <div class="card shadow border-0">

                <div class="card-header bg-white py-4">
                    <h3 class="mb-0">
                        Form Edit Galeri
                    </h3>
                </div>

                <div class="card-body px-4 py-4">

                    {{-- PESAN ERROR --}}
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

                    <form action="{{ route('galeri.update', $galeri->id_galeri) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- JUDUL --}}
                        <div class="form-group">
                            <label for="judul">Judul Galeri</label>
                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $galeri->judul) }}"
                                required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select
                                name="kategori"
                                id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Kategori --</option>

                                <option value="Foto"
                                    {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>
                            </select>

                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TANGGAL --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}"
                                required>

                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- KETERANGAN --}}
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea
                                name="keterangan"
                                id="keterangan"
                                rows="5"
                                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $galeri->keterangan) }}</textarea>

                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- FILE SAAT INI --}}
                        <div class="form-group">
                            <label>Foto / Video Saat Ini</label>

                            <div class="mb-3">
                                @if ($galeri->file)
                                    @if ($galeri->kategori == 'Foto')
                                        <img
                                            src="{{ asset('storage/' . $galeri->file) }}"
                                            alt="{{ $galeri->judul }}"
                                            style="width:300px; max-width:100%; height:200px; object-fit:cover; border-radius:10px;">
                                    @elseif ($galeri->kategori == 'Video')
                                        <video
                                            controls
                                            preload="metadata"
                                            style="width:300px; max-width:100%; max-height:200px; border-radius:10px;">
                                            <source src="{{ asset('storage/' . $galeri->file) }}">
                                            Browser kamu tidak mendukung pemutaran video.
                                        </video>
                                    @endif
                                @else
                                    <p class="text-muted">Belum ada file.</p>
                                @endif
                            </div>
                        </div>

                        {{-- FILE BARU --}}
                        <div class="form-group">
                            <label for="file">Ganti Foto / Video</label>
                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control-file @error('file') is-invalid @enderror"
                                accept="image/*,video/*">

                            <small class="form-text text-muted">
                                Kosongkan jika tidak ingin mengganti file.
                            </small>

                            @error('file')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- PREVIEW FILE BARU --}}
                        <div class="form-group">
                            <label>Preview File Baru</label>

                            <div>
                                <img
                                    id="previewImage"
                                    src=""
                                    alt="Preview Foto"
                                    style="display:none; max-width:300px; max-height:200px; object-fit:cover; border-radius:10px;">

                                <video
                                    id="previewVideo"
                                    controls
                                    preload="metadata"
                                    style="display:none; max-width:300px; max-height:200px; border-radius:10px;">
                                </video>
                            </div>
                        </div>

                        <hr>

                        {{-- TOMBOL --}}
                        <div class="d-flex justify-content-between flex-wrap">
                            <a href="{{ route('galeri.index') }}"
                               class="btn btn-secondary mb-2">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-green mb-2">
                                <i class="fas fa-save mr-1"></i>
                                Simpan Perubahan
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
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('file');
    const previewImage = document.getElementById('previewImage');
    const previewVideo = document.getElementById('previewVideo');

    let currentObjectURL = null;

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];

        previewImage.style.display = 'none';
        previewImage.removeAttribute('src');

        previewVideo.pause();
        previewVideo.style.display = 'none';
        previewVideo.removeAttribute('src');
        previewVideo.load();

        if (currentObjectURL) {
            URL.revokeObjectURL(currentObjectURL);
            currentObjectURL = null;
        }

        if (!file) {
            return;
        }

        currentObjectURL = URL.createObjectURL(file);

        if (file.type.startsWith('image/')) {
            previewImage.src = currentObjectURL;
            previewImage.style.display = 'block';
        } else if (file.type.startsWith('video/')) {
            previewVideo.src = currentObjectURL;
            previewVideo.load();
            previewVideo.style.display = 'block';
        }
    });
});
</script>
@endpush
```