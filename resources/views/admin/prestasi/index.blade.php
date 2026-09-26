@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-8 col-7">

                    <h1 class="text-white">
                        Prestasi
                    </h1>

                    <p class="text-white mb-0">
                        Data prestasi SMPN 2 MANGUNREJA
                    </p>

                </div>

                <div class="col-lg-4 col-5 text-right">

                    <a href="{{ route('prestasi.create') }}"
                       class="btn btn-white">

                        <i class="fas fa-plus"></i>
                        Tambah Prestasi

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="container-fluid mt--7">

    {{-- Alert sukses --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <span class="alert-inner--icon">
                <i class="fas fa-check"></i>
            </span>

            <span class="alert-inner--text">
                {{ session('success') }}
            </span>

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    {{-- Tabel Prestasi --}}
    <div class="card shadow">

        <div class="card-header border-0">

            <h3 class="mb-0">
                Data Prestasi
            </h3>

        </div>


        <div class="table-responsive">

            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Prestasi</th>
                        <th>Tahun Ajaran</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($prestasi as $item)
                        <tr>
                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            {{-- FOTO --}}
                            <td>
                                @if($item->foto)
                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        alt="{{ $item->nama_prestasi }}"
                                        width="90"
                                        height="65"
                                        style="object-fit: cover; border-radius: 8px;"
                                    >
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>

                            {{-- NAMA PRESTASI --}}
                            <td>
                                <strong>
                                    {{ $item->nama_prestasi }}
                                </strong>
                            </td>

                            {{-- TAHUN AJARAN --}}
                            <td>
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                {{ $item->tahun_ajaran }}
                            </td>

                            {{-- DESKRIPSI --}}
                            <td style="
                                white-space: normal;
                                word-wrap: break-word;
                                overflow-wrap: break-word;
                                min-width: 250px;
                                max-width: 400px;
                            ">
                                @if($item->deskripsi)
                                    <div style="
                                        white-space: normal;
                                        word-break: normal;
                                        overflow-wrap: anywhere;
                                        line-height: 1.6;
                                    ">
                                        {{ $item->deskripsi }}
                                    </div>
                                @else
                                    <span class="text-muted">
                                        Tidak ada deskripsi.
                                    </span>
                                @endif
                            </td>

                            {{-- AKSI --}}
                            <td>
                                <a href="{{ route('prestasi.edit', $item->id_prestasi) }}"
                                class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('prestasi.destroy', $item->id_prestasi) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus prestasi ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data prestasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</div>

@endsection