@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="row align-items-center py-4">

            <div class="col-lg-8 col-7">

                <h1 class="text-white">
                    Galeri Sekolah
                </h1>

                <p class="text-white mb-0">
                    Dokumentasi kegiatan dan berbagai informasi visual
                    SMPN 2 MANGUNREJA
                </p>

            </div>

            <div class="col-lg-4 col-5 text-right">

                <a href="{{ route('galeri.create') }}"
                   class="btn btn-white">

                    <i class="fas fa-plus"></i>
                    Tambah Galeri

                </a>

            </div>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    {{-- Pesan Sukses --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fas fa-check-circle mr-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    {{-- Tabel Galeri --}}
    <div class="card shadow">

        <div class="card-header border-0">

            <h3 class="mb-0">
                Data Galeri
            </h3>

        </div>


        <div class="table-responsive">

            <table class="table align-items-center table-flush">

                <thead class="thead-light">

                    <tr>

                        <th width="5%">No</th>

                        <th width="12%">File</th>

                        <th>Judul</th>

                        <th>Kategori</th>

                        <th>Tanggal</th>

                        <th width="25%">Keterangan</th>

                        <th width="18%">Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($galeri as $galeri)

                        <tr>

                            {{-- No --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- File --}}
                            <td>

                                @if($galeri->file)

                                    @if($galeri->kategori == 'Foto')

                                        <img
                                            src="{{ asset('storage/' . $galeri->file) }}"
                                            alt="{{ $galeri->judul }}"
                                            width="90"
                                            height="65"
                                            style="
                                                object-fit: cover;
                                                border-radius: 8px;
                                            "
                                        >

                                    @elseif($galeri->kategori == 'Video')

                                        <video
                                            width="90"
                                            height="65"
                                            controls
                                            style="
                                                object-fit: cover;
                                                border-radius: 8px;
                                            "
                                        >
                                            <source
                                                src="{{ asset('storage/' . $galeri->file) }}"
                                            >
                                        </video>

                                    @endif

                                @else

                                    <div
                                        class="d-flex align-items-center justify-content-center bg-light"
                                        style="
                                            width:90px;
                                            height:65px;
                                            border-radius:8px;
                                        "
                                    >

                                        <i class="fas fa-image text-muted"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- Judul --}}
                            <td>

                                <strong>
                                    {{ $galeri->judul }}
                                </strong>

                            </td>


                            {{-- Kategori --}}
                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <span class="badge badge-primary">
                                        <i class="fas fa-image mr-1"></i>
                                        Foto
                                    </span>

                                @elseif($galeri->kategori == 'Video')

                                    <span class="badge badge-success">
                                        <i class="fas fa-video mr-1"></i>
                                        Video
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Tanggal --}}
                            <td>

                                <i class="fas fa-calendar-alt text-success mr-1"></i>

                                {{ $galeri->tanggal
                                    ? \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y')
                                    : '-'
                                }}

                            </td>


                            {{-- Keterangan --}}
                            <td style="
                                white-space: normal;
                                word-wrap: break-word;
                                overflow-wrap: break-word;
                                min-width: 250px;
                                max-width: 350px;
                            ">

                                @if($galeri->keterangan)

                                    <div style="
                                        white-space: normal;
                                        word-break: normal;
                                        overflow-wrap: anywhere;
                                        line-height: 1.6;
                                    ">
                                        {{ $galeri->keterangan }}
                                    </div>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td>

                                <a href="{{ route('galeri.edit', $galeri->id_galeri) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>


                                <form
                                    action="{{ route('galeri.destroy', $galeri->id_galeri) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
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

                                <i class="fas fa-images fa-3x text-muted mb-3"></i>

                                <h3>
                                    Belum Ada Galeri
                                </h3>

                                <p class="text-muted mb-0">
                                    Belum ada dokumentasi yang ditambahkan.
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