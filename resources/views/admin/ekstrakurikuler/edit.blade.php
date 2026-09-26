@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">

        <h1 class="text-white">
            Edit Ekstrakurikuler
        </h1>

        <p class="text-white mb-0">
            Perbarui data ekstrakurikuler
        </p>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header bg-white">
            <h3 class="mb-0">
                Form Edit Ekstrakurikuler
            </h3>
        </div>


        <div class="card-body">

            <form action="{{ route('ekstrakurikuler.update', $ekstrakurikuler->id_ekskul) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="form-group">
                    <label>Nama Ekstrakurikuler</label>

                    <input type="text"
                           name="nama_ekskul"
                           class="form-control"
                           value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul) }}">
                </div>


                <div class="form-group">
                    <label>Pembina</label>

                    <input type="text"
                           name="pembina"
                           class="form-control"
                           value="{{ old('pembina', $ekstrakurikuler->pembina) }}">
                </div>


                <div class="form-group">
                    <label>Jadwal Latihan</label>

                    <input type="text"
                           name="jadwal_latihan"
                           class="form-control"
                           value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}">
                </div>


                <div class="form-group">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
                </div>


                {{-- Gambar lama --}}
                @if($ekstrakurikuler->gambar)

                    <div class="form-group">

                        <label>Gambar Saat Ini</label>

                        <div>
                            <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                 style="width:220px; height:140px; object-fit:cover;"
                                 class="rounded shadow-sm">
                        </div>

                    </div>

                @endif


                <div class="form-group">
                    <label>Ganti Gambar</label>

                    <input type="file"
                           name="gambar"
                           class="form-control-file"
                           accept="image/png,image/jpeg">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>
                </div>


                <hr>

                <a href="{{ route('ekstrakurikuler.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update
                </button>
                
            </form>

        </div>

    </div>

</div>

@endsection