@extends('layouts.app')

@section('content')

    {{-- ========================================================= --}}
    {{-- HEADER STATISTIK ARGON --}}
    {{-- ========================================================= --}}

    @include('layouts.headers.cards')


    {{-- ========================================================= --}}
    {{-- CONTENT DASHBOARD --}}
    {{-- ========================================================= --}}

    <div class="container-fluid mt--7">


        {{-- ===================================================== --}}
        {{-- GRAFIK + PENGUMUMAN --}}
        {{-- ===================================================== --}}

        <div class="row">

            {{-- ===================== --}}
            {{-- GRAFIK DATA SEKOLAH --}}
            {{-- ===================== --}}

            <div class="col-xl-8 mb-5 mb-xl-0">

                <div class="card bg-gradient-default shadow">

                    <div class="card-header bg-transparent">

                        <div class="row align-items-center">

                            <div class="col">

                                <h6 class="text-uppercase text-light ls-1 mb-1">
                                    Statistik
                                </h6>

                                <h2 class="text-white mb-0">
                                    Data Sekolah
                                </h2>

                            </div>

                            <div class="col-auto">

                                <span class="badge badge-primary">
                                    Data
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="chart">

                            <canvas id="chart-sekolah"></canvas>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================== --}}
            {{-- PENGUMUMAN TERBARU --}}
            {{-- ===================== --}}

            <div class="col-xl-4">

                <div class="card shadow">

                    <div class="card-header border-0">

                        <div class="row align-items-center">

                            <div class="col">

                                <h6 class="text-uppercase text-muted ls-1 mb-1">
                                    Informasi
                                </h6>

                                <h2 class="mb-0">
                                    Pengumuman Terbaru
                                </h2>

                            </div>

                        </div>

                    </div>


                    <div class="card-body">

                        @forelse($pengumumanTerbaru ?? [] as $pengumuman)

                            <div class="mb-3">

                                <h4 class="mb-1">
                                    {{ $pengumuman->judul }}
                                </h4>

                                @if(isset($pengumuman->tanggal))

                                    <small class="text-muted">
                                        {{ $pengumuman->tanggal }}
                                    </small>

                                @endif

                            </div>


                            @if(!$loop->last)

                                <hr>

                            @endif


                        @empty

                            <div class="text-center py-4">

                                <i class="ni ni-bell-55 text-muted"
                                   style="font-size: 30px;">
                                </i>

                                <p class="text-muted mt-2 mb-0">
                                    Belum ada pengumuman.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- BERITA TERBARU + INFORMASI WEBSITE --}}
        {{-- ===================================================== --}}

        <div class="row mt-5">


            {{-- ===================== --}}
            {{-- BERITA TERBARU --}}
            {{-- ===================== --}}

            <div class="col-xl-8 mb-5 mb-xl-0">

                <div class="card shadow">


                    {{-- HEADER --}}

                    <div class="card-header border-0">

                        <div class="row align-items-center">

                            <div class="col">

                                <h3 class="mb-0">
                                    Berita Terbaru
                                </h3>

                            </div>

                            <div class="col text-right">

                                <a href="#"
                                   class="btn btn-sm btn-primary">

                                    Lihat Semua

                                </a>

                            </div>

                        </div>

                    </div>


                    {{-- TABLE --}}

                    <div class="table-responsive">

                        <table class="table align-items-center table-flush">

                            <thead class="thead-light">

                                <tr>

                                    <th>No</th>

                                    <th>
                                        Judul Berita
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($beritaTerbaru ?? [] as $berita)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        <td>

                                            <strong>
                                                {{ $berita->judul }}
                                            </strong>

                                        </td>


                                        <td>

                                            @if(isset($berita->tanggal))

                                                {{ $berita->tanggal }}

                                            @elseif(isset($berita->created_at))

                                                {{ $berita->created_at }}

                                            @else

                                                -

                                            @endif

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td colspan="3"
                                            class="text-center text-muted py-4">

                                            Belum ada berita.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>



            {{-- ===================== --}}
            {{-- INFORMASI WEBSITE --}}
            {{-- ===================== --}}

            <div class="col-xl-4">

                <div class="card shadow">


                    {{-- HEADER --}}

                    <div class="card-header border-0">

                        <h3 class="mb-0">
                            Informasi Website
                        </h3>

                    </div>


                    {{-- TABLE --}}

                    <div class="table-responsive">

                        <table class="table align-items-center table-flush">

                            <tbody>


                                {{-- GURU --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-single-02 text-primary mr-2"></i>

                                        Guru

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahGuru ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>



                                {{-- SISWA --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-badge text-success mr-2"></i>

                                        Siswa

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahSiswa ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>



                                {{-- BERITA --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-paper-diploma text-warning mr-2"></i>

                                        Berita

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahBerita ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>



                                {{-- PENGUMUMAN --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-bell-55 text-danger mr-2"></i>

                                        Pengumuman

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahPengumuman ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>



                                {{-- EKSTRAKURIKULER --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-trophy text-info mr-2"></i>

                                        Ekstrakurikuler

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahEkstrakurikuler ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>



                                {{-- GALERI --}}

                                <tr>

                                    <th>

                                        <i class="ni ni-image text-primary mr-2"></i>

                                        Galeri

                                    </th>

                                    <td class="text-right">

                                        <strong>
                                            {{ $jumlahGaleri ?? 0 }}
                                        </strong>

                                    </td>

                                </tr>


                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


    </div>

@endsection



{{-- ============================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================= --}}

@push('js')

    {{-- Chart.js --}}

    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>


    <script>

        document.addEventListener('DOMContentLoaded', function () {

            var canvas = document.getElementById('chart-sekolah');

            if (!canvas) {
                return;
            }


            var ctx = canvas.getContext('2d');


            new Chart(ctx, {

                type: 'line',

                data: {

                    labels: [

                        'Guru',
                        'Siswa',
                        'Berita',
                        'Pengumuman',
                        'Ekskul',
                        'Galeri'

                    ],


                    datasets: [{

                        label: 'Jumlah Data',

                        data: [

                            {{ $jumlahGuru ?? 0 }},

                            {{ $jumlahSiswa ?? 0 }},

                            {{ $jumlahBerita ?? 0 }},

                            {{ $jumlahPengumuman ?? 0 }},

                            {{ $jumlahEkstrakurikuler ?? 0 }},

                            {{ $jumlahGaleri ?? 0 }}

                        ],

                        borderWidth: 3,

                        pointRadius: 4,

                        fill: false

                    }]

                },


                options: {

                    responsive: true,

                    maintainAspectRatio: false,


                    legend: {

                        display: false

                    },


                    scales: {

                        yAxes: [{

                            ticks: {

                                beginAtZero: true,

                                precision: 0

                            }

                        }],


                        xAxes: [{

                            gridLines: {

                                display: false

                            }

                        }]

                    }

                }

            });

        });

    </script>

@endpush