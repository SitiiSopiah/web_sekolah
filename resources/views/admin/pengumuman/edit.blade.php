@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col">

                    <h1 class="text-white">
                        Edit Pengumuman
                    </h1>

                    <p class="text-white mb-0">
                        Perbarui data pengumuman
                    </p>

                </div>

            </div>

        </div>

    </div>
</div>


<div class="container-fluid mt--7">

    <div class="row">

        <div class="col-lg-10">

            <div class="card shadow">

                <div class="card-header">

                    <h3 class="mb-0">
                        Edit Pengumuman
                    </h3>

                </div>


                <div class="card-body">

                    <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        {{-- Judul --}}
                        <div class="form-group">

                            <label for="judul">
                                Judul Pengumuman
                            </label>

                            <input type="text"
                                   name="judul"
                                   id="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $pengumuman->judul) }}"
                                   required>

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Isi --}}
                        <div class="form-group">

                            <label for="isi">
                                Isi Pengumuman
                            </label>

                            <textarea name="isi"
                                      id="isi"
                                      rows="7"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      required>{{ old('isi', $pengumuman->isi) }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="row">

                            {{-- Tanggal --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="tanggal">
                                        Tanggal
                                    </label>

                                    <input type="date"
                                           name="tanggal"
                                           id="tanggal"
                                           class="form-control @error('tanggal') is-invalid @enderror"
                                           value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}"
                                           required>

                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            {{-- Status --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="status">
                                        Status
                                    </label>

                                    <select name="status"
                                            id="status"
                                            class="form-control @error('status') is-invalid @enderror"
                                            required>

                                        <option value="Publish"
                                            {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}>
                                            Publish
                                        </option>

                                        <option value="Draft"
                                            {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}>
                                            Draft
                                        </option>

                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <div class="mt-4">

                            <a href="{{ route('pengumuman.index') }}"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection