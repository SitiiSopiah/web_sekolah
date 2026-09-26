@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="row align-items-center py-4">

            <div class="col-lg-8 col-7">

                <h1 class="text-white">
                    Ekstrakurikuler
                </h1>

                <p class="text-white mb-0">
                    Kegiatan ekstrakurikuler SMPN 2 MANGUNREJA
                </p>

            </div>

            <div class="col-lg-4 col-5 text-right">

                <a href="{{ route('ekstrakurikuler.create') }}"
                   class="btn btn-white">

                    <i class="fas fa-plus"></i>
                    Tambah Ekstrakurikuler

                </a>

            </div>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    {{-- Pesan berhasil --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="ni ni-check-bold"></i>

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    {{-- Tabel --}}
    <div class="card shadow">

        <div class="card-header border-0">

            <div class="row align-items-center">

                <div class="col">

                    <h3 class="mb-0">
                        Data Ekstrakurikuler
                    </h3>

                </div>

            </div>

        </div>


        <div class="table-responsive">

            <table class="table align-items-center table-flush">

                <thead class="thead-light">

                    <tr>

                        <th width="5%">No</th>

                        <th width="10%">Gambar</th>

                        <th>Nama Ekstrakurikuler</th>

                        <th>Pembina</th>

                        <th>Jadwal Latihan</th>

                        <th>Deskripsi</th>

                        <th width="18%">Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($ekstrakurikuler as $item)

                        <tr>

                            {{-- No --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- Gambar --}}
                            <td>

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->nama_ekskul }}"
                                        width="80"
                                        height="60"
                                        style="
                                            object-fit: cover;
                                            border-radius: 8px;
                                        "
                                    >

                                @else

                                    <div
                                        class="d-flex align-items-center justify-content-center bg-light"
                                        style="
                                            width:80px;
                                            height:60px;
                                            border-radius:8px;
                                        "
                                    >

                                        <i class="fas fa-users text-primary"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- Nama --}}
                            <td>

                                <strong>
                                    {{ $item->nama_ekskul }}
                                </strong>

                            </td>


                            {{-- Pembina --}}
                            <td>

                                <i class="fas fa-user text-primary mr-1"></i>

                                {{ $item->pembina }}

                            </td>


                            {{-- Jadwal --}}
                            <td>

                                <i class="far fa-calendar-alt text-success mr-1"></i>

                                {{ $item->jadwal_latihan }}

                            </td>


                            {{-- Deskripsi --}}
                            <td>

                                @if($item->deskripsi)

                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td>

                                <a href="{{ route('ekstrakurikuler.edit', $item->id_ekskul) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="fas fa-edit"></i>

                                </a>


                                <form
                                    action="{{ route('ekstrakurikuler.destroy', $item->id_ekskul) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                    >

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <i class="fas fa-users fa-3x text-muted mb-3"></i>

                                <h3>
                                    Belum Ada Ekstrakurikuler
                                </h3>

                                <p class="text-muted mb-0">
                                    Silakan tambahkan kegiatan ekstrakurikuler.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection