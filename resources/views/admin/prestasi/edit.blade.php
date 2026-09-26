@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">

    <div class="container-fluid">

        <h1 class="text-white">
            Edit Prestasi
        </h1>

        <p class="text-white mb-0">
            Perbarui data prestasi
        </p>

    </div>

</div>


<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header bg-white">

            <h3 class="mb-0">
                Form Edit Prestasi
            </h3>

        </div>


        <div class="card-body">

            <form action="{{ route('prestasi.update', $prestasi->id_prestasi) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')



                @if($prestasi->foto)

                    <div class="form-group">

                        <label>
                            Foto Saat Ini
                        </label>

                        <br>

                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                             style="width:220px; height:140px; object-fit:cover;"
                             class="rounded shadow-sm">

                    </div>

                @endif


                <div class="form-group">

                    <label>
                        Ganti Foto
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control-file"
                           accept="image/png,image/jpeg">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                </div>

                <div class="form-group">

                    <label>
                        Nama Prestasi
                    </label>

                    <input type="text"
                           name="nama_prestasi"
                           class="form-control"
                           value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}">

                </div>


                <div class="form-group">

                    <label>
                        Tahun Ajaran
                    </label>

                    <input type="text"
                           name="tahun_ajaran"
                           class="form-control"
                           value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}">

                </div>


                <div class="form-group">

                    <label>
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                </div>


                <hr>


                <a href="{{ route('prestasi.index') }}"
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