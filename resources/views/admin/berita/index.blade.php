@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-6 col-7">

                    <h1 class="text-white">
                        Berita
                    </h1>

                    <p class="text-white">
                        Data berita SMPN 2 MANGUNREJA
                    </p>

                </div>

                <div class="col-lg-6 col-5 text-right">

                    <a href="{{ route('berita.create') }}"
                       class="btn btn-md btn-white">

                        <i class="fas fa-plus"></i>
                        Tambah Berita

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="container-fluid mt--7">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    <div class="card shadow">

        <div class="card-header border-0">

            <h3 class="mb-0">
                Data Berita
            </h3>

        </div>


        <div class="table-responsive">

            <table class="table align-items-center table-flush">

                <thead class="thead-light">

                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($berita as $item)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- GAMBAR --}}
                            <td>

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        width="90"
                                        height="65"
                                        style="
                                            object-fit: cover;
                                            border-radius: 8px;
                                        "
                                    >

                                @else

                                    <span class="text-muted">
                                        Tidak ada gambar
                                    </span>

                                @endif

                            </td>


                            {{-- JUDUL --}}
                            <td>

                                <strong>
                                    {{ $item->judul }}
                                </strong>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                <i class="ni ni-calendar-grid-58 text-primary"></i>

                                {{ $item->tanggal?->format('d/m/Y') }}

                            </td>


                            {{-- ISI --}}
                            <td style="
                                min-width: 280px;
                                max-width: 400px;
                                white-space: normal;
                                word-wrap: break-word;
                                overflow-wrap: break-word;
                            ">

                                <div style="
                                    line-height: 1.6;
                                    overflow-wrap: anywhere;
                                ">

                                    {{ $item->isi }}

                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <form action="{{ route('berita.status', $item->id_berita) }}"
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


                            {{-- AKSI --}}
                            <td>


                                <a
                                    href="{{ route('berita.edit', $item->id_berita) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>


                                <form
                                    action="{{ route('berita.destroy', $item->id_berita) }}"
                                    method="POST"
                                    style="display:inline-block;"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')"
                                    >

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted py-4">

                                Belum ada data berita.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('js')

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.status-switch').forEach(function (switchElement) {

        switchElement.addEventListener('change', function () {

            const checkbox = this;

            const id = checkbox.dataset.id;

            const statusText = checkbox
                .closest('.custom-control')
                .querySelector('.status-text');

            const status = checkbox.checked
                ? 'Publish'
                : 'Draft';


            fetch(`/berita/${id}/status`, {

                method: 'PATCH',

                headers: {

                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}',

                    'Accept':
                        'application/json'

                },

                body: JSON.stringify({
                    status: status
                })

            })

            .then(response => {

                if (!response.ok) {
                    throw new Error('Gagal mengubah status');
                }

                return response.json();

            })

            .then(data => {

                if (data.success) {

                    statusText.textContent =
                        data.status;

                }

            })

            .catch(error => {

                console.error(error);

                checkbox.checked =
                    !checkbox.checked;

                alert('Status gagal diperbarui.');

            });

        });

    });

});

</script>

@endpush