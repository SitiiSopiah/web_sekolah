@extends('layouts.app')

@section('content')

<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <h1 class="text-white">Edit Galeri</h1>
        <p class="text-white mb-0">Perbarui data galeri sekolah</p>
    </div>
</div>

<div class="container-fluid mt--7 pb-5">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h3 class="mb-0">Form Edit Galeri</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('galeri.update', $galeri->id_galeri) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="form-group">
                    <label>Judul Galeri</label>
                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $galeri->judul) }}"
                           required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori"
                            class="form-control @error('kategori') is-invalid @enderror"
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                            Foto
                        </option>
                        <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                            Video
                        </option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $galeri->tanggal ? \Illuminate\Support\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}"
                           required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan"
                              rows="5"
                              class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- File Saat Ini --}}
                @if($galeri->file)
                    <div class="form-group">
                        <label>File Saat Ini</label>
                        <div class="mt-2">
                            @if($galeri->kategori == 'Foto')
                                <img src="{{ asset('storage/' . $galeri->file) }}"
                                     alt="{{ $galeri->judul }}"
                                     class="rounded shadow-sm"
                                     style="width:220px; height:150px; object-fit:cover;">
                            @else
                                <video controls
                                       class="rounded shadow-sm"
                                       style="width:320px; max-width:100%;">
                                    <source src="{{ asset('storage/' . $galeri->file) }}">
                                    Browser Anda tidak mendukung video.
                                </video>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Ganti File --}}
                <div class="form-group">
                    <label>Ganti File Foto/Video</label>
                    <input type="file"
                           name="file"
                           id="file"
                           class="form-control-file @error('file') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/webp,video/mp4,video/quicktime,video/x-msvideo,video/x-matroska">

                    <small class="form-text text-muted">
                        Kosongkan jika tidak ingin mengganti file.
                        Format foto: JPG, JPEG, PNG, WEBP. Format video: MP4, MOV, AVI, MKV.
                    </small>

                    @error('file')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Preview File Baru --}}
                <div class="form-group" id="preview-container" style="display:none;">
                    <label>Preview File Baru</label>
                    <div>
                        <img id="preview-image"
                             src=""
                             alt="Preview foto"
                             class="rounded shadow-sm"
                             style="display:none; width:220px; height:150px; object-fit:cover;">

                        <video id="preview-video"
                               controls
                               class="rounded shadow-sm"
                               style="display:none; width:320px; max-width:100%;">
                        </video>
                    </div>
                </div>

                <hr>

                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="btn btn-green">
                    <i class="fas fa-save"></i>
                    Update
                </button>

            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('file');
    const container = document.getElementById('preview-container');
    const image = document.getElementById('preview-image');
    const video = document.getElementById('preview-video');
    let previewUrl = null;

    input.addEventListener('change', function () {
        image.style.display = 'none';
        video.style.display = 'none';

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (!this.files || !this.files[0]) {
            container.style.display = 'none';
            image.removeAttribute('src');
            video.removeAttribute('src');
            video.load();
            return;
        }

        const file = this.files[0];
        previewUrl = URL.createObjectURL(file);
        container.style.display = 'block';

        if (file.type.startsWith('image/')) {
            image.src = previewUrl;
            image.style.display = 'block';
        } else if (file.type.startsWith('video/')) {
            video.src = previewUrl;
            video.style.display = 'block';
            video.load();
        } else {
            container.style.display = 'none';
        }
    });
});
</script>
@endpush