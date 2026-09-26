@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h2">Data Guru</h1>
            <p class="text-muted">
                Kelola data guru SMPN 2 MANGUNREJA
            </p>
        </div>

        @if(auth()->user()->role === 'Admin')
            <a href="{{ route('guru.create') }}"
            class="btn btn-primary">

                <i class="fas fa-plus"></i>
                Tambah Guru

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
            <h3 class="mb-0">Daftar Guru</h3>
        </div>


        <div class="table-responsive">

            <table class="table align-items-center table-flush">

                <thead class="thead-light">

                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Foto</th>
                        @if(auth()->user()->role === 'Admin')  
                            <th>Aksi</th>
                        @endif
                    </tr>

                </thead>


                <tbody>

                    @forelse($guru as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->nip }}
                            </td>


                            <td>
                                {{ $item->nama_guru }}
                            </td>


                            <td>
                                {{ $item->mapel }}
                            </td>


                            <td>

                                @if($item->foto)

                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        width="60"
                                        height="60"
                                        style="object-fit: cover;"
                                        class="rounded-circle"
                                        alt="Foto {{ $item->nama_guru }}">

                                @else

                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

                            @if(auth()->user()->role === 'Admin')  
                                <td>

                                    <a href="{{ route('guru.edit', $item->id_guru) }}"
                                    class="btn btn-sm btn-warning">

                                        <i class="fas fa-edit"></i>
                                        Edit

                                    </a>


                                    <form
                                        action="{{ route('guru.destroy', $item->id_guru) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data guru ini?')">

                                            <i class="fas fa-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>
                            @endif

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-4">

                                Belum ada data guru.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection