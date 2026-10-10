@extends('template.landing')

@section('title')
    Ekstrakurikuler - {{ $profil->nama_sekolah ?? 'SMPN 2 MANGUNREJA' }}
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
                KEGIATAN SISWA
            </small>

            <h1 class="font-weight-bold mt-2"
                style="color:#173d2d;">
                Ekstrakurikuler
            </h1>

            <p class="text-muted mx-auto"
               style="max-width:700px; line-height:1.8;">
                Berbagai kegiatan ekstrakurikuler yang dapat diikuti
                oleh siswa untuk mengembangkan bakat, minat,
                kreativitas, dan keterampilan.
            </p>

        </div>


        {{-- DAFTAR EKSTRAKURIKULER --}}
        <div class="row">

            @forelse($ekstrakurikuler as $item)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm h-100"
                         style="
                            border-radius:15px;
                            overflow:hidden;
                         ">

                        {{-- GAMBAR --}}
                        @if($item->gambar)

                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->nama_ekskul }}"
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
                                <i class="fas fa-running fa-4x"
                                   style="color:#079447;"></i>
                            </div>

                        @endif


                        {{-- ISI --}}
                        <div class="card-body p-4">

                            <h5 class="font-weight-bold mb-3"
                                style="color:#173d2d;">

                                {{ $item->nama_ekskul }}

                            </h5>


                            @if($item->pembina)

                                <p class="text-muted mb-2">

                                    <i class="fas fa-user-tie mr-2"
                                       style="color:#079447;"></i>

                                    <strong>Pembina:</strong>
                                    {{ $item->pembina }}

                                </p>

                            @endif


                            @if($item->jadwal_latihan)

                                <p class="text-muted mb-3">

                                    <i class="fas fa-calendar-alt mr-2"
                                       style="color:#079447;"></i>

                                    <strong>Jadwal:</strong>
                                    {{ $item->jadwal_latihan }}

                                </p>

                            @endif


                            @if($item->deskripsi)

                                <p class="text-muted"
                                   style="
                                        font-size:14px;
                                        line-height:1.7;
                                   ">

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($item->deskripsi),
                                        120
                                    ) }}

                                </p>

                            @endif


                            {{-- DETAIL --}}
                            <a href="{{ route('ekstrakurikuler.show', $item->getKey()) }}"
                               class="btn btn-sm rounded-pill px-3 mt-2"
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

                            <i class="fas fa-running fa-4x mb-3"
                               style="color:#079447;"></i>

                            <h5 class="font-weight-bold"
                                style="color:#173d2d;">

                                Belum Ada Ekstrakurikuler

                            </h5>

                            <p class="text-muted mb-0">

                                Data ekstrakurikuler belum tersedia.

                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- KEMBALI --}}
        <div class="text-center mt-4">

            <a href="{{ url('/#ekstrakurikuler') }}"
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