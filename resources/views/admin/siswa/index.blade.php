@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h2">Data Siswa</h1>
            <p class="text-muted">
                Kelola data siswa SMPN 2 MANGUNREJA
            </p>
        </div>

        @if(auth()->user()->role === 'Admin')
            <a href="{{ route('siswa.create') }}"
            class="btn btn-primary">

                <i class="fas fa-plus"></i>
                Tambah Siswa

            </a>
        @endif
        
    </div>

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
                                        <a href="{{ route('siswa.edit', $item->id_siswa) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}"
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