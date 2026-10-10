@extends('template.landing')

@section('title')
    Galeri - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<div style="
    background:#f5f9f7;
    padding-top:120px;
    padding-bottom:70px;
">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <small style="
                color:#d99a16;
                font-weight:700;
                letter-spacing:2px;
            ">
                DOKUMENTASI SEKOLAH
            </small>

            <h1 class="font-weight-bold mt-2"
                style="color:#173d2d;">
                Galeri Sekolah
            </h1>

            <p class="text-muted mx-auto"
               style="
                    max-width:700px;
                    line-height:1.8;
               ">
                Dokumentasi berbagai kegiatan dan aktivitas
                {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}.
            </p>

        </div>


        {{-- GALERI --}}
        <div class="row">

            @forelse($galeri as $item)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm h-100"
                         style="
                            border-radius:15px;
                            overflow:hidden;
                         ">

                        
                        {{-- FOTO / VIDEO GALERI --}}
                        @if($item->file)

                            @if($item->kategori === 'Foto')

                                {{-- FOTO --}}
                                <img src="{{ asset('storage/' . $item->file) }}"
                                    alt="{{ $item->judul }}"
                                    style="
                                        width:100%;
                                        height:240px;
                                        object-fit:cover;
                                    ">

                            @elseif($item->kategori === 'Video')

                                {{-- VIDEO --}}
                                <video controls
                                    preload="metadata"
                                    playsinline
                                    style="
                                        width:100%;
                                        height:240px;
                                        object-fit:cover;
                                        background:#000;
                                    ">
                                    <source
                                        src="{{ asset('storage/' . $item->file) }}"
                                        type="video/mp4">

                                    Browser kamu tidak mendukung pemutaran video.
                                </video>

                            @endif

                        @else

                            {{-- JIKA FILE KOSONG --}}
                            <div style="
                                height:240px;
                                background:#e8f5ee;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                            ">
                                <i class="fas fa-images fa-4x"
                                style="color:#079447;"></i>
                            </div>

                        @endif



                        {{-- ISI --}}
                        <div class="card-body p-4">

                            {{-- KATEGORI --}}
                            @if($item->kategori)

                                <small style="
                                    color:#079447;
                                    font-weight:600;
                                ">

                                    <i class="fas fa-folder mr-1"></i>

                                    {{ $item->kategori }}

                                </small>

                            @endif


                            {{-- JUDUL --}}
                            <h5 class="font-weight-bold mt-2 mb-2"
                                style="
                                    color:#173d2d;
                                    line-height:1.5;
                                ">

                                {{ $item->judul }}

                            </h5>


                            {{-- TANGGAL --}}
                            @if($item->tanggal)

                                <p class="text-muted small mb-3">

                                    <i class="fas fa-calendar-alt mr-1"
                                       style="color:#079447;"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </p>

                            @endif


                            {{-- DETAIL --}}
                            <a href="{{ route('galeri.show', $item->getKey()) }}"
                               class="btn btn-sm rounded-pill px-3"
                               style="
                                    background:#006b3c;
                                    border-color:#006b3c;
                                    color:white;
                               ">

                                Lihat Detail

                                <i class="fas fa-arrow-right ml-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-sm"
                         style="border-radius:15px;">

                        <div class="card-body text-center py-5">

                            <i class="fas fa-images fa-4x mb-3"
                               style="color:#079447;"></i>

                            <h5 class="font-weight-bold"
                                style="color:#173d2d;">

                                Belum Ada Galeri

                            </h5>

                            <p class="text-muted mb-0">

                                Belum tersedia dokumentasi galeri sekolah.

                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- KEMBALI --}}
        <div class="text-center mt-4">

            <a href="{{ url('/#galeri') }}"
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