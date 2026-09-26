@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <h1 class="text-white">
            Detail Ekstrakurikuler
        </h1>

        <p class="text-white mb-0">
            Informasi lengkap ekstrakurikuler
        </p>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-body">

            <div class="row">

                {{-- Gambar --}}
                <div class="col-md-5">

                    @if($ekstrakurikuler->gambar)

                        <img src="{{ asset('storage/ekstrakurikuler/' . $ekstrakurikuler->gambar) }}"
                             class="img-fluid rounded shadow"
                             style="width:100%; max-height:350px; object-fit:cover;">

                    @else

                        <div class="bg-secondary rounded d-flex justify-content-center align-items-center"
                             style="height:300px;">

                            <i class="fas fa-users fa-5x text-white"></i>

                        </div>

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-md-7">

                    <h1 class="mb-4">
                        {{ $ekstrakurikuler->nama_ekskul }}
                    </h1>


                    <div class="mb-3">
                        <strong>
                            <i class="fas fa-user text-primary mr-2"></i>
                            Pembina
                        </strong>

                        <p class="text-muted">
                            {{ $ekstrakurikuler->pembina }}
                        </p>
                    </div>


                    <div class="mb-3">
                        <strong>
                            <i class="fas fa-calendar-alt text-success mr-2"></i>
                            Jadwal Latihan
                        </strong>

                        <p class="text-muted">
                            {{ $ekstrakurikuler->jadwal_latihan }}
                        </p>
                    </div>


                    <div class="mb-4">
                        <strong>
                            <i class="fas fa-info-circle text-info mr-2"></i>
                            Deskripsi
                        </strong>

                        <p class="text-muted">
                            {{ $ekstrakurikuler->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>
                    </div>


                    <a href="{{ route('ekstrakurikuler.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('ekstrakurikuler.edit', $ekstrakurikuler->id_ekskul) }}"
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