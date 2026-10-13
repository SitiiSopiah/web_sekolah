@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <h1 class="text-white">Tambah Pengumuman</h1>
        <p class="text-white mb-0">Tambahkan pengumuman baru</p>
    </div>
</div>

{{-- CARD FORM --}}
<div class="container-fluid mt--7 pb-5">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h3 class="mb-0">Form Pengumuman</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf

                {{-- Judul --}}
                <div class="form-group">
                    <label for="judul">Judul Pengumuman</label>
                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Masukkan judul pengumuman"
                        required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Isi --}}
                <div class="form-group">
                    <label for="isi">Isi Pengumuman</label>
                    <textarea
                        name="isi"
                        id="isi"
                        rows="7"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Masukkan isi pengumuman"
                        required>{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal dan Status --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal') }}"
                                required>

                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select
                                name="status"
                                id="status"
                                class="form-control @error('status') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Status --</option>

                                <option value="Publish"
                                    {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                    Publish
                                </option>

                                <option value="Draft"
                                    {{ old('status') == 'Draft' ? 'selected' : '' }}>
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

                {{-- Tombol --}}
                <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="btn btn-green">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>

@endsection