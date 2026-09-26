@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <h1 class="text-white">
            Detail Prestasi
        </h1>

        <p class="text-white mb-0">
            Informasi lengkap prestasi SMPN 2 MANGUNREJA
        </p>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-body">

            <div class="row">

                {{-- Foto --}}
                <div class="col-md-5">

                    @if($prestasi->foto)

                        <img src="{{ asset('storage/prestasi/' . $prestasi->foto) }}"
                             class="img-fluid rounded shadow"
                             style="width:100%; max-height:350px; object-fit:cover;">

                    @else

                        <div class="bg-secondary rounded d-flex justify-content-center align-items-center"
                             style="height:300px;">

                            <i class="fas fa-trophy fa-5x text-white"></i>

                        </div>

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-md-7">

                    <h1 class="mb-4">
                        {{ $prestasi->nama_prestasi }}
                    </h1>


                    <div class="mb-4">

                        <h4>
                            <i class="fas fa-calendar-alt text-primary mr-2"></i>
                            Tahun Ajaran
                        </h4>

                        <p class="text-muted">
                            {{ $prestasi->tahun_ajaran }}
                        </p>

                    </div>


                    <div class="mb-4">

                        <h4>
                            <i class="fas fa-info-circle text-info mr-2"></i>
                            Deskripsi
                        </h4>

                        <p class="text-muted">
                            {{ $prestasi->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>

                    </div>


                    <a href="{{ route('prestasi.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>


                    <a href="{{ route('prestasi.edit', $prestasi->id_prestasi) }}"
                       class="btn btn-warning">

                        <i class="fas fa-edit"></i>
                        Edit

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection