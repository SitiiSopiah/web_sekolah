@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <h1 class="text-white">
            Detail Guru
        </h1>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($guru->foto)

                        <img src="{{ asset('storage/guru/' . $guru->foto) }}"
                             class="img-fluid rounded-circle"
                             style="width:180px;height:180px;object-fit:cover;">

                    @else

                        <div class="avatar avatar-xl rounded-circle">

                            <i class="ni ni-single-02"
                               style="font-size:80px;">
                            </i>

                        </div>

                    @endif

                </div>


                <div class="col-md-8">

                    <p>
                        <strong>NIP:</strong>
                        {{ $guru->nip }}
                    </p>

                    <hr>

                    <h2>
                        {{ $guru->nama_guru }}
                    </h2>

                    <p>
                        <strong>Mata Pelajaran:</strong>
                        {{ $guru->mapel }}
                    </p>

                    <a href="{{ route('guru.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                    <a href="{{ route('guru.edit', $guru->id_guru) }}"
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