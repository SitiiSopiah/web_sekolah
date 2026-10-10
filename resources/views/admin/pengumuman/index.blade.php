@extends('layouts.app')

@section('content')

<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-4 col-7">
                    <h1 class="text-white">Pengumuman</h1>
                    <p class="text-white mb-0">
                        Kelola informasi dan pengumuman sekolah
                    </p>
                </div>

                <div class="col-lg-8 col-5 text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        {{-- Search --}}
                        <form action="{{ route('pengumuman.index') }}"
                            method="GET"
                            class="mr-2">

                            <div class="input-group">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Cari pengumuman..."
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

                        <a href="{{ route('pengumuman.create') }}"
                        class="btn btn-md btn-white">

                            <i class="fas fa-plus"></i>
                            Tambah Pengumuman

                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt--7">

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <span class="alert-inner--icon">
                <i class="ni ni-check-bold"></i>
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


    {{-- Error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col">

            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">

                        <div class="col">
                            <h3 class="mb-0">
                                Data Pengumuman
                            </h3>
                        </div>

                    </div>
                </div>


                <div class="table-responsive">

                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">

                            <tr>
                                <th width="60">No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th>Diinput Oleh</th>
                                <th width="230">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($pengumuman as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ $item->judul }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $item->tanggal->format('d-m-Y') }}
                                    </td>

                                    <td style="
                                        white-space: normal;
                                        word-wrap: break-word;
                                        overflow-wrap: anywhere;
                                        min-width: 300px;
                                        max-width: 450px;
                                    ">
                                        <div style="
                                            line-height: 1.6;
                                            white-space: normal;
                                            overflow-wrap: anywhere;
                                        ">
                                            {{ $item->isi }}
                                        </div>
                                    </td>

                                    <td>

                                        <form action="{{ route('pengumuman.status', $item->id_pengumuman) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="btn btn-sm
                                                    {{ $item->status === 'Publish'
                                                        ? 'btn-success'
                                                        : 'btn-secondary' }}">

                                                @if($item->status === 'Publish')
                                                    <i class="fas fa-toggle-on"></i>
                                                    Publish
                                                @else
                                                    <i class="fas fa-toggle-off"></i>
                                                    Draft
                                                @endif

                                            </button>

                                        </form>

                                    </td>

                                    <td class="text-center">
                                        @if ($item->user)
                                            <strong>{{ $item->user->username }}</strong>
                                            <br>
                                            @if ($item->user->role === 'Admin')
                                                <span class="badge badge-success">Admin</span>
                                            @elseif ($item->user->role === 'Operator')
                                                <span class="badge badge-info">Operator</span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    {{ $item->user->role }}
                                                </span>
                                            @endif
                                        @else
                                            <span class="text-muted">Tidak diketahui</span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('pengumuman.edit', Crypt::encrypt($item->id_pengumuman)) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('pengumuman.destroy', Crypt::encrypt($item->id_pengumuman)) }}"
                                              method="POST"
                                              style="display:inline;"
                                              onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6"
                                        class="text-center py-5">

                                        <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>

                                        <p class="text-muted mb-0">
                                            Belum ada data pengumuman.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection