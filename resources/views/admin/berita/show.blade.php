@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    <div class="container-fluid">

        <h1 class="text-white">
            Detail Berita
        </h1>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-body">

            <h2>
                {{ $berita->judul }}
            </h2>

            <p class="text-muted">

                <i class="ni ni-calendar-grid-58"></i>

                {{ $berita->tanggal?->format('d F Y') }}

            </p>


            @if($berita->gambar)

                <img
                    src="{{ asset('assets/img/berita/' . $berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    style="
                        width: 100%;
                        max-width: 700px;
                        max-height: 400px;
                        object-fit: cover;
                        border-radius: 10px;
                    "
                    class="mb-4"
                >

            @endif


            <div style="
                white-space: pre-line;
                line-height: 1.8;
            ">

                {{ $berita->isi }}

            </div>


            <hr>


            @if($berita->status == 'Publish')

                <span class="badge badge-success">
                    Publish
                </span>

            @else

                <span class="badge badge-secondary">
                    Draft
                </span>

            @endif


            <div class="mt-4">

                <a
                    href="{{ route('berita.index') }}"
                    class="btn btn-secondary"
                >
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <a
                    href="{{ route('berita.edit', $berita->id_berita) }}"
                    class="btn btn-warning"
                >

                    <i class="fas fa-edit"></i>
                    Edit

                </a>

            </div>

        </div>

    </div>

</div>

@endsection