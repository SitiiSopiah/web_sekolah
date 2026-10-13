@extends('template.landing')

@section('title')
    Pengumuman - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
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
                INFORMASI SEKOLAH
            </small>

            <h1 class="font-weight-bold mt-2"
                style="color:#173d2d;">
                Pengumuman
            </h1>

            <p class="text-muted mx-auto"
               style="
                    max-width:700px;
                    line-height:1.8;
               ">
                Informasi dan pengumuman terbaru dari
                {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
                untuk seluruh siswa, orang tua, dan warga sekolah.
            </p>

        </div>


        {{-- LIST PENGUMUMAN --}}
        <div class="row">

            @forelse($pengumuman as $item)

                <div class="col-lg-6 mb-4">

                    <div class="card border-0 shadow-sm h-100"
                         style="
                            border-radius:15px;
                            overflow:hidden;
                         ">

                        <div class="card-body p-4">

                            {{-- TANGGAL --}}
                            <div class="mb-3"
                                 style="
                                    color:#079447;
                                    font-size:14px;
                                 ">

                                <i class="fas fa-calendar-alt mr-2"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                            </div>


                            {{-- JUDUL --}}
                            <h4 class="font-weight-bold mb-3"
                                style="
                                    color:#173d2d;
                                    line-height:1.5;
                                ">

                                {{ $item->judul }}

                            </h4>


                            {{-- ISI --}}
                            <p class="text-muted mb-4"
                               style="
                                    line-height:1.8;
                                    font-size:15px;
                               ">

                                {{ strip_tags($item->isi) }}

                            </p>


                            {{-- BUTTON --}}
                            <a href="{{ route('pengumuman.show', $item->getKey()) }}"
                               class="btn btn-sm rounded-pill px-4"
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

                            <i class="fas fa-bullhorn fa-4x mb-3"
                               style="color:#079447;"></i>

                            <h5 class="font-weight-bold"
                                style="color:#173d2d;">

                                Belum Ada Pengumuman

                            </h5>

                            <p class="text-muted mb-0">

                                Belum tersedia pengumuman yang dapat
                                ditampilkan.

                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- KEMBALI --}}
        <div class="text-center mt-4">

            <a href="{{ url('/#pengumuman') }}"
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