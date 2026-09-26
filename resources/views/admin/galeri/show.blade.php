@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-white">Detail Galeri</h1>
            <p class="text-white">
                Informasi lengkap dokumentasi sekolah.
            </p>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">

    <div class="row">

        {{-- Foto --}}
        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-body p-0">

                    @if ($galeri->file)

                        <img
                            src="{{ asset('storage/galeri/' . $galeri->file) }}"
                            alt="{{ $galeri->judul }}"
                            class="img-fluid w-100"
                            style="
                                max-height:500px;
                                object-fit:cover;
                                border-radius:5px;
                            "
                        >

                    @else

                        <div
                            class="text-center text-muted py-5"
                            style="height:400px;"
                        >
                            <i class="fas fa-image fa-4x mb-3"></i>

                            <p>
                                Tidak ada foto.
                            </p>
                        </div>

                    @endif

                </div>

            </div>

        </div>

        {{-- Informasi --}}
        <div class="col-lg-5">

            <div class="card shadow">

                <div class="card-header">
                    <h3 class="mb-0">
                        {{ $galeri->judul }}
                    </h3>
                </div>

                <div class="card-body">

                    {{-- Kategori --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Kategori
                        </small>

                        <span class="badge badge-primary">
                            {{ $galeri->kategori }}
                        </span>

                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Tanggal
                        </small>

                        <strong>
                            @if ($galeri->tanggal)
                                {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                            @else
                                -
                            @endif
                        </strong>

                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Keterangan
                        </small>

                        <p class="mt-2">
                            {{ $galeri->keterangan ?: 'Tidak ada keterangan.' }}
                        </p>

                    </div>

                    <hr>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">

                        <a href="{{ route('galeri.index') }}"
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali
                        </a>

                        <a href="{{ route('galeri.edit', $galeri->id) }}"
                           class="btn btn-warning">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection