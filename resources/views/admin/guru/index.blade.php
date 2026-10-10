@extends('layouts.app')

@section('content')

<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="col-lg-5 col-7">
                <h1 class="text-white">Data Guru</h1>
                <p class="text-white">
                    Kelola data guru SMPN 2 MANGUNREJA
                </p>
            </div>


            <div class="col-lg-7 col-7">

                <div class="d-flex justify-content-end align-items-center">

                    {{-- Search --}}
                    <form action="{{ route('guru.index') }}"
                        method="GET"
                        class="mr-2">

                        <div class="input-group">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari guru..."
                                value="{{ request('search') }}"
                                style="
                                    height: 44px;
                                    width: 230px;
                                    border: none;
                                    border-radius: 6px 0 0 6px;
                                "
                            >

                            <div class="input-group-append">

                                <button type="submit"
                                        class="btn btn-white"
                                        style="
                                            height: 44px;
                                            border-radius: 0 6px 6px 0;
                                            margin: 0;
                                        ">

                                    <i class="fas fa-search"></i>

                                </button>

                            </div>

                        </div>

                    </form>


                    {{-- Tombol Tambah Guru --}}
                    @if(auth()->user()->role === 'Admin')

                        <a href="{{ route('guru.create') }}"
                        class="btn btn-md btn-white">

                            <i class="fas fa-plus"></i>
                            Tambah Guru

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

                                    <a href="{{ route('guru.edit', Crypt::encrypt($item->id_guru)) }}"
                                    class="btn btn-sm btn-warning">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    <form
                                        action="{{ route('guru.destroy', Crypt::encrypt($item->id_guru)) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data guru ini?')">

                                            <i class="fas fa-trash"></i>

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