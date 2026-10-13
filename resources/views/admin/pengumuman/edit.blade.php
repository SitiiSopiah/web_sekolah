@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="header bg-gradient-green pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <h1 class="text-white">Edit Pengumuman</h1>
        <p class="text-white mb-0">Perbarui data pengumuman</p>
    </div>
</div>

{{-- CARD FORM --}}
<div class="container-fluid mt--7 pb-5">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h3 class="mb-0">Form Edit Pengumuman</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $pengumuman->judul) }}"
                           required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Isi --}}
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea name="isi"
                              rows="7"
                              class="form-control @error('isi') is-invalid @enderror"
                              required>{{ old('isi', $pengumuman->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $pengumuman->tanggal ? \Illuminate\Support\Carbon::parse($pengumuman->tanggal)->format('Y-m-d') : '') }}"
                           required>

                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label>Status Pengumuman</label>
                    <select name="status"
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

                <hr>

                {{-- Tombol --}}
                <a href="{{ route('pengumuman.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="btn btn-green">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

            </form>
        </div>
    </div>
</div>

@endsection