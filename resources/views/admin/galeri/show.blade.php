@extends('template.landing')

@section('title')
    {{ $galeri->judul }} - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<div style="
    background:#f5f9f7;
    padding-top:120px;
    padding-bottom:70px;
">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                {{-- CARD DETAIL --}}
                <div class="card border-0 shadow-sm"
                     style="
                        border-radius:18px;
                        overflow:hidden;
                     ">

                    
                    {{-- FOTO / VIDEO --}}
                    <div style="
                        background:#e8f5ee;
                        text-align:center;
                        padding:15px;
                    ">

                        @if($galeri->file)

                            @if($galeri->kategori === 'Foto')

                                {{-- TAMPILAN FOTO --}}
                                <img src="{{ asset('storage/' . $galeri->file) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="img-fluid"
                                    style="
                                        width:100%;
                                        max-height:600px;
                                        object-fit:contain;
                                    ">

                            @elseif($galeri->kategori === 'Video')

                                {{-- TAMPILAN VIDEO --}}
                                <video controls
                                    preload="metadata"
                                    playsinline
                                    style="
                                        width:100%;
                                        max-height:600px;
                                        background:#000;
                                        object-fit:contain;
                                    ">

                                    <source
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                        type="video/mp4">

                                    Browser kamu tidak mendukung pemutaran video ini.
                                </video>

                            @endif

                        @else

                            {{-- JIKA FILE KOSONG --}}
                            <div style="
                                height:400px;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                            ">

                                <i class="fas fa-images fa-5x"
                                style="color:#079447;"></i>

                            </div>

                        @endif

                    </div>



                    {{-- INFORMASI --}}
                    <div class="card-body p-4 p-md-5">

                        {{-- KATEGORI --}}
                        @if($galeri->kategori)

                            <span class="badge rounded-pill px-3 py-2 mb-3"
                                  style="
                                    background:#e8f5ee;
                                    color:#006b3c;
                                    font-size:13px;
                                  ">

                                <i class="fas fa-folder mr-1"></i>

                                {{ $galeri->kategori }}

                            </span>

                        @endif


                        {{-- JUDUL --}}
                        <h1 class="font-weight-bold mb-3"
                            style="
                                color:#173d2d;
                                line-height:1.4;
                            ">

                            {{ $galeri->judul }}

                        </h1>


                        {{-- TANGGAL --}}
                        @if($galeri->tanggal)

                            <p class="text-muted mb-4">

                                <i class="fas fa-calendar-alt mr-2"
                                   style="color:#079447;"></i>

                                {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}

                            </p>

                        @endif


                        {{-- GARIS --}}
                        <hr>


                        {{-- KETERANGAN --}}
                        @if($galeri->keterangan)

                            <div class="mt-4">

                                <h5 class="font-weight-bold mb-3"
                                    style="color:#173d2d;">

                                    Keterangan

                                </h5>

                                <div class="text-muted"
                                     style="
                                        line-height:1.9;
                                        font-size:15px;
                                     ">

                                    {!! nl2br(e($galeri->keterangan)) !!}
                                </div>

                            </div>

                        @endif


                        {{-- TOMBOL --}}
                        <div class="mt-4 pt-3">

                            <a href="{{ url('/#galeri') }}"
                               class="btn rounded-pill px-4"
                               style="
                                    background:#006b3c;
                                    border-color:#006b3c;
                                    color:white;
                               ">

                                <i class="fas fa-arrow-left mr-2"></i>

                                Kembali ke Galeri

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection