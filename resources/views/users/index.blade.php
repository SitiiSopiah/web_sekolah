@extends('layouts.app')

@section('content')

<div class="header bg-gradient-green pb-6 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        Data User
                    </h6>
                </div>

                <div class="col-lg-6 col-5 text-right">

                    <div class="d-flex justify-content-end align-items-center">

                        {{-- Search --}}
                        <form action="{{ route('users.index') }}"
                            method="GET"
                            class="mr--6">

                            <div class="input-group">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Cari user..."
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

                        @if(auth()->user()->role === 'Admin')
                            <div class="col-lg-6 col-5 text-right">
                                <a href="{{ route('users.create') }}"
                                class="btn btn-md btn-white">
                                    <i class="fas fa-plus"></i>
                                    Tambah User
                                </a>
                        
                            </div>
                        @endif
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="container-fluid mt--6">

    {{-- Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <span>{{ session('success') }}</span>

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- Error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <span>{{ session('error') }}</span>

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <h3 class="mb-0">
                Daftar User
            </h3>
        </div>

        <div class="table-responsive">

            <table class="table align-items-center table-flush">

                <thead class="thead-light">

                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        @if(auth()->user()->role === 'Admin')  
                            <th class="text-center">Aksi</th>
                        @endif
                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $user->username }}
                                </strong>
                            </td>

                            <td>

                                @if($user->role === 'Admin')

                                    <span class="badge badge-primary">
                                        Admin
                                    </span>

                                @else

                                    <span class="badge badge-info">
                                        Operator
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $user->created_at
                                    ? $user->created_at->format('d-m-Y H:i')
                                    : '-' }}
                            </td>
                            
                            @if(auth()->user()->role === 'Admin')
                                <td class="text-center">

                                    {{-- Edit --}}
                                    <a href="{{ route('users.edit', Crypt::encrypt($user->id_user)) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Hapus --}}
                                    @if(auth()->id() != $user->id_user)

                                        <form action="{{ route('users.destroy', Crypt::encrypt($user->id_user)) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    @endif

                                </td>
                            @endif

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="text-center py-4">

                                <span class="text-muted">
                                    Belum ada data user.
                                </span>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection