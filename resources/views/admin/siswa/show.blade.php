@extends('layouts.app')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-4">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-white">Detail Siswa</h1>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Informasi Siswa</h3>
        </div>

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="200">NISN</th>
                    <td>{{ $siswa->nisn }}</td>
                </tr>

                <tr>
                    <th>Nama Siswa</th>
                    <td>{{ $siswa->nama_siswa }}</td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                        @if($siswa->jenis_kelamin == 'Laki-Laki')
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Tahun Masuk</th>
                    <td>{{ $siswa->tahun_masuk }}</td>
                </tr>

            </table>

            <a href="{{ route('siswa.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('siswa.edit', $siswa->idi_siswa) }}"
               class="btn btn-warning">
                Edit
            </a>

        </div>
    </div>

</div>

@endsection