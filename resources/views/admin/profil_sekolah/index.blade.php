@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4">

    {{-- Header Profil --}}
    <div class="card shadow border-0 mb-4">
        <div class="card-body py-4">
            <div class="row align-items-center">

                {{-- Logo --}}
                <div class="col-md-2 text-center">
                    @if($profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}"
                             style="width:120px; height:120px; object-fit:contain;"
                             alt="Logo Sekolah">
                    @else
                        <i class="fas fa-school text-primary"
                           style="font-size:90px;"></i>
                    @endif
                </div>

                {{-- Nama Sekolah --}}
                <div class="col-md-7">
                    <h1 class="mb-1 font-weight-bold">
                        {{ $profil->nama_sekolah }}
                    </h1>

                    <p class="text-muted mb-2">
                        <i class="fas fa-id-card mr-2"></i>
                        NPSN: {{ $profil->npsn ?? '-' }}
                    </p>

                    <p class="text-muted mb-0">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Berdiri sejak {{ $profil->tahun_berdiri ?? '-' }}
                    </p>
                </div>

                {{-- Tombol Edit --}}
                <div class="col-md-3 text-md-right mt-3 mt-md-0">
                    <a href="{{ route('profil_sekolah.edit', $profil->id_profil) }}"
                       class="btn btn-primary">
                        <i class="fas fa-edit mr-1"></i>
                        Edit Profil
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="row">

        {{-- Kepala Sekolah --}}
        <div class="col-lg-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">

                    <h3 class="mb-4">
                        Kepala Sekolah
                    </h3>

                    @if($profil->foto)
                        <img src="{{ asset('storage/' . $profil->foto) }}"
                             class="rounded-circle shadow"
                             style="width:180px; height:180px; object-fit:cover;"
                             alt="Kepala Sekolah">
                    @else
                        <div class="rounded-circle bg-secondary mx-auto d-flex align-items-center justify-content-center"
                             style="width:180px; height:180px;">
                            <i class="fas fa-user text-white"
                               style="font-size:70px;"></i>
                        </div>
                    @endif

                    <h3 class="mt-4 mb-1">
                        {{ $profil->kepala_sekolah ?? '-' }}
                    </h3>

                    <p class="text-muted">
                        Kepala Sekolah
                    </p>

                </div>
            </div>
        </div>


        {{-- Informasi Sekolah --}}
        <div class="col-lg-8">
            <div class="card shadow border-0 h-100">

                <div class="card-header bg-white border-0">
                    <h3 class="mb-0">
                        <i class="fas fa-school text-primary mr-2"></i>
                        Informasi Sekolah
                    </h3>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="fas fa-map-marker-alt text-danger fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        Alamat
                                    </small>
                                    <p class="mb-0 font-weight-bold">
                                        {{ $profil->alamat ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="fas fa-phone text-success fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        Kontak
                                    </small>
                                    <p class="mb-0 font-weight-bold">
                                        {{ $profil->kontak ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="fas fa-calendar text-info fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        Tahun Berdiri
                                    </small>
                                    <p class="mb-0 font-weight-bold">
                                        {{ $profil->tahun_berdiri ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="fas fa-id-card text-warning fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        NPSN
                                    </small>
                                    <p class="mb-0 font-weight-bold">
                                        {{ $profil->npsn ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- Deskripsi --}}
    <div class="card shadow border-0 mt-4">
        <div class="card-header bg-white border-0">
            <h3 class="mb-0">
                <i class="fas fa-info-circle text-primary mr-2"></i>
                Tentang Sekolah
            </h3>
        </div>

        <div class="card-body">
            <p class="text-muted mb-0" style="line-height:1.8;">
                {{ $profil->deskripsi ?? '-' }}
            </p>
        </div>
    </div>


    {{-- Visi Misi --}}
    <div class="card shadow border-0 mt-4 mb-5">
        <div class="card-header bg-white border-0">
            <h3 class="mb-0">
                <i class="fas fa-bullseye text-success mr-2"></i>
                Visi & Misi
            </h3>
        </div>

        <div class="card-body">

            <div class="p-4 bg-light rounded">
                {!! nl2br(e($profil->visi_misi ?? '-')) !!}
            </div>

        </div>
    </div>

</div>

@endsection