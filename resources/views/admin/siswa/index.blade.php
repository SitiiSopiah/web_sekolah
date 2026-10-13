@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="col-lg-5 col-7">
                <h1 class="text-white">Data Siswa</h1>
                <p class="text-white">
                    Kelola data siswa SMPN 2 MANGUNREJA
                </p>
            </div>
            
            <div class="col-lg-7 col-7">
                <div class="d-flex justify-content-end align-items-center">
                    {{-- Search Siswa --}}
                    <form action="{{ route('siswa.index') }}"
                        method="GET"
                        class="mr-2">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari siswa..."
                                value="{{ request('search') }}"
                                style="
                                    height: 44px;
                                    width: 230px;
                                    border: none;
                                    border-radius: 6px 0 0 6px;
                                "
                            >

                            {{-- Tombol Search --}}
                            <div class="input-group-append">
                                <button
                                    type="submit"
                                    class="btn btn-white"
                                    title="Cari siswa"
                                    style="
                                        height: 44px;
                                        border-radius: 0 6px 6px 0;
                                        margin: 0;
                                    ">
                                    <i class="fas fa-search"></i>
                                </button>

                                {{-- Tombol Reset --}}
                                @if(request('search'))
                                    <a
                                        href="{{ route('siswa.index') }}"
                                        class="btn btn-white"
                                        title="Hapus pencarian"
                                        style="
                                            height: 44px;
                                            border-radius: 6px;
                                            margin: 0;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        ">
                                        <i class="fas fa-times text-danger"></i>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </form>

                    @if(auth()->user()->role === 'Admin')

                        <a href="{{ route('siswa.create') }}"
                        class="btn btn-white">

                            <i class="fas fa-plus"></i>
                            Tambah Siswa

                        </a>

                    @endif

                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container-fluid mt--7">
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Daftar Siswa</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            @if(auth()->user()->role === 'Admin')  
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>
                                    @if($item->jenis_kelamin == 'Laki-Laki')
                                        Laki-laki
                                    @elseif($item->jenis_kelamin == 'Perempuan')
                                        Perempuan
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->tahun_masuk }}</td>
                                @if(auth()->user()->role === 'Admin')  
                                    <td>
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('siswa.edit', Crypt::encrypt($item->id_siswa)) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('siswa.destroy', Crypt::encrypt($item->id_siswa)) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection