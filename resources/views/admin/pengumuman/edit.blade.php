
@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col">
                    <h1 class="text-white font-weight-bold mb-2">
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

{{-- CARD FORM --}}
<div class="container-fluid mt--7 pb-5">
    <div class="row">
        <div class="col-12">

            <div class="card shadow border-0">

                <div class="card-header bg-white py-4">
                    <h3 class="mb-0">
                        Form Edit Pengumuman
                    </h3>
                </div>

                <div class="card-body px-4 py-4">

                    {{-- PERTAHANKAN FORM PENGUMUMAN KAMU DI SINI --}}
                    <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul Pengumuman</label>
                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $pengumuman->judul) }}"
                                required>

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi Pengumuman</label>
                            <textarea
                                name="isi"
                                id="isi"
                                rows="7"
                                class="form-control @error('isi') is-invalid @enderror"
                                required>{{ old('isi', $pengumuman->isi) }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input
                                        type="date"
                                        name="tanggal"
                                        id="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal', \Illuminate\Support\Carbon::parse($pengumuman->tanggal)->format('Y-m-d')) }}"
                                        required>

                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status Pengumuman</label>
                                    <select
                                        name="status"
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
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between flex-wrap">
                            <a href="{{ route('pengumuman.index') }}"
                               class="btn btn-secondary mb-2">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-green mb-2">
                                <i class="fas fa-save mr-1"></i>
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
