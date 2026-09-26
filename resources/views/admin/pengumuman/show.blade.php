@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col">

                    <h1 class="text-white">
                        Detail Pengumuman
                    </h1>

                </div>

            </div>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="row">

        <div class="col-lg-10">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="mb-3">
                        {{ $pengumuman->judul }}
                    </h2>


                    <div class="mb-3">

                        <span class="text-muted">
                            <i class="fas fa-calendar"></i>
                            {{ $pengumuman->tanggal->format('d F Y') }}
                        </span>

                        @if($pengumuman->status === 'Publish')

                            <span class="badge badge-success ml-2">
                                Publish
                            </span>

                        @else

                            <span class="badge badge-secondary ml-2">
                                Draft
                            </span>

                        @endif

                    </div>


                    <hr>


                    <div style="
                        white-space: pre-line;
                        line-height: 1.8;
                        font-size: 16px;
                    ">
                        {{ $pengumuman->isi }}
                    </div>


                    <hr>

                    <a href="{{ route('pengumuman.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                    <a href="{{ route('pengumuman.edit', $pengumuman->id_pengumuman) }}"
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