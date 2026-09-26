@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-white">Edit Galeri</h1>
            <p class="text-white">
                Perbarui informasi dokumentasi sekolah.
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
                        <i class="fas fa-edit text-warning mr-2"></i>
                        Edit Data Galeri
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

                    <form action="{{ route('galeri.update', $galeri->id_galeri) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

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
                                value="{{ old('judul', $galeri->judul) }}"
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

                                <option value="Foto"
                                    {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
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
                                value="{{ old('tanggal', $galeri->tanggal ? \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}"
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
                            >{{ old('keterangan', $galeri->keterangan) }}</textarea>
                        </div>

                        {{-- Foto Lama --}}
                        <div class="form-group">
                            <label>Foto / Video Saat Ini</label>

                            <div class="mb-3">
                                @if ($galeri->file)

                                    @if ($galeri->kategori == 'Foto')
                                        <img
                                            src="{{ asset('storage/' . $galeri->file) }}"
                                            alt="{{ $galeri->judul }}"
                                            style="
                                                width:300px;
                                                height:200px;
                                                object-fit:cover;
                                                border-radius:10px;
                                            "
                                        >
                                    @elseif ($galeri->kategori == 'Video')
                                        <video
                                            controls
                                            style="
                                                width:300px;
                                                max-height:200px;
                                                border-radius:10px;
                                            "
                                        >
                                            <source
                                                src="{{ asset('storage/' . $galeri->file) }}"
                                            >
                                        </video>
                                    @endif

                                @else
                                    <p class="text-muted">Belum ada file.</p>
                                @endif
                            </div>
                        </div>


                        {{-- File Baru --}}
                        <div class="form-group">
                            <label for="file">Ganti Foto / Video</label>

                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control-file"
                                accept="image/*,video/*"
                            >

                            <small class="form-text text-muted">
                                Kosongkan jika tidak ingin mengganti file.
                            </small>
                        </div>

                        {{-- Preview File Baru --}}
                        <div class="form-group">

                            <label>Preview File Baru</label>

                            <div>
                                <img
                                    id="previewImage"
                                    src="#"
                                    alt="Preview Foto"
                                    style="
                                        display:none;
                                        max-width:300px;
                                        max-height:200px;
                                        object-fit:cover;
                                        border-radius:10px;
                                    "
                                >

                                <video
                                    id="previewVideo"
                                    controls
                                    style="
                                        display:none;
                                        max-width:300px;
                                        max-height:200px;
                                        border-radius:10px;
                                    "
                                ></video>
                            </div>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('galeri.index') }}"
                               class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Kembali
                            </a>

                            <button type="submit"
                                    class="btn btn-warning">
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
    document.getElementById('file').addEventListener('change', function(event) {

        const file = event.target.files[0];

        const previewImage = document.getElementById('previewImage');
        const previewVideo = document.getElementById('previewVideo');

        // Sembunyikan preview terlebih dahulu
        previewImage.style.display = 'none';
        previewVideo.style.display = 'none';

        if (!file) {
            return;
        }

        const fileURL = URL.createObjectURL(file);

        // Jika file adalah foto
        if (file.type.startsWith('image/')) {

            previewImage.src = fileURL;
            previewImage.style.display = 'block';

        }

        // Jika file adalah video
        else if (file.type.startsWith('video/')) {

            previewVideo.src = fileURL;
            previewVideo.style.display = 'block';

        }
    });
</script>
@endpush