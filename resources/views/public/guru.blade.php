@extends('template.landing')

@section('title')
    Guru & Staff - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<div class="bg-light py-5" style="padding-top: 120px !important;">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <small style="
                color:#d99a16;
                font-weight:700;
                letter-spacing:2px;
            ">
                TENAGA PENDIDIK
            </small>

            <h1 class="font-weight-bold mt-2"
                style="color:#173d2d;">

                Guru & Staff Pengajar

            </h1>

            <p class="text-muted mx-auto"
               style="max-width:700px;line-height:1.8;">

                Daftar seluruh tenaga pendidik
                {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                yang berperan dalam memberikan pendidikan
                terbaik bagi siswa.

            </p>

        </div>


        {{-- DAFTAR GURU --}}
        <div class="row">

            @forelse($guru as $item)

                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        {{-- FOTO --}}
                        @if($item->foto)

                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="card-img-top"
                                 alt="{{ $item->nama_guru }}"
                                 style="
                                    height:280px;
                                    object-fit:cover;
                                 ">

                        @else

                            <div class="bg-success d-flex
                                        align-items-center
                                        justify-content-center"
                                 style="
                                    height:280px;
                                    background:#e8f5ee !important;
                                 ">

                                <i class="fas fa-user fa-5x text-success"></i>

                            </div>

                        @endif


                        {{-- DATA GURU --}}
                        <div class="card-body text-center">

                            <h5 class="font-weight-bold"
                                style="color:#173d2d;">

                                {{ $item->nama_guru }}

                            </h5>


                            <p class="text-success mb-2">

                                <i class="fas fa-book mr-1"></i>

                                {{ $item->mapel ?? 'Guru SMPN 2 MANGUNREJA' }}

                            </p>


                            @if($item->nip)

                                <p class="small text-muted mb-3">

                                    <i class="fas fa-id-card mr-1"></i>

                                    NIP. {{ $item->nip }}

                                </p>

                            @endif


                            <a href="{{ route('guru.show', $item->getKey()) }}"
                               class="btn btn-sm rounded-pill px-3"
                               style="background:#006b3c; border-color:#006b3c; color:white;">

                                Lihat Profil

                                <i class="fas fa-arrow-right ml-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                {{-- JIKA BELUM ADA GURU --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="fas fa-users fa-3x text-success mb-3"></i>

                            <h5 class="font-weight-bold">
                                Belum Ada Data Guru
                            </h5>

                            <p class="text-muted mb-0">
                                Data guru belum tersedia.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- TOMBOL KEMBALI --}}
        <div class="text-center mt-4">

            <a href="{{ url('/#guru') }}"
               class="btn rounded-pill px-4"
               style="
                    background:#006b3c;
                    border-color:#006b3c;
                    color:white;
               ">

                <i class="fas fa-arrow-left mr-2"></i>

                Kembali ke Beranda

            </a>

        </div>

    </div>

</div>

@endsection