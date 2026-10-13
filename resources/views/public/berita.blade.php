@extends('template.landing')

@section('title')
    Berita - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
@endsection

@section('content')

<div style="background:#f5f9f7; padding-top:120px; padding-bottom:70px;">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <small style="
                color:#d99a16;
                font-weight:700;
                letter-spacing:2px;
            ">
                INFORMASI TERKINI
            </small>

            <h1 class="font-weight-bold mt-2"
                style="color:#173d2d;">
                Berita Sekolah
            </h1>

            <p class="text-muted mx-auto"
               style="max-width:700px; line-height:1.8;">
                Temukan berbagai berita dan informasi terbaru
                seputar kegiatan dan perkembangan
                {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}.
            </p>

        </div>
        <div class="row">

            @forelse($berita as $item)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm h-100"
                         style="border-radius:15px; overflow:hidden;">


                        @if($item->gambar)

                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->judul }}"
                                 style="
                                    width:100%;
                                    height:230px;
                                    object-fit:cover;
                                 ">

                        @else

                            <div style="
                                height:230px;
                                background:#e8f5ee;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                            ">
                                <i class="fas fa-newspaper fa-4x"
                                   style="color:#079447;"></i>
                            </div>

                        @endif

                        <div class="card-body p-4">
                            <div class="mb-2"
                                 style="
                                    color:#079447;
                                    font-size:14px;
                                 ">

                                <i class="fas fa-calendar-alt mr-1"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                            </div>

                            <h5 class="font-weight-bold"
                                style="
                                    color:#173d2d;
                                    line-height:1.5;
                                ">

                                {{ $item->judul }}

                            </h5>

                            <p class="text-muted"
                               style="
                                    line-height:1.7;
                                    font-size:14px;
                               ">

                                {{ strip_tags($item->isi) }}

                            </p>
                            <a href="{{ route('berita.show', $item->getKey()) }}"
                               class="btn btn-sm rounded-pill px-3"
                               style="
                                    background:#006b3c;
                                    border-color:#006b3c;
                                    color:white;
                               ">

                                Baca Selengkapnya

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

                            <i class="fas fa-newspaper fa-4x mb-3"
                               style="color:#079447;"></i>

                            <h5 class="font-weight-bold"
                                style="color:#173d2d;">

                                Belum Ada Berita

                            </h5>

                            <p class="text-muted mb-0">

                                Belum tersedia berita yang dapat ditampilkan.

                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- KEMBALI --}}
        <div class="text-center mt-4">

            <a href="{{ url('/#berita') }}"
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