@extends('template.landing')

@section('title', 'Form Nilai Ujikom')

@section('content')
<div class="container" style="padding-top:120px; padding-bottom:50px;">
    <h3>Form Input Nilai Ujikom</h3>
    <form method="GET" action="{{ url()->current() }}">
        <div class="form-group">
            <label>Input Nilai 1</label>
            <input type="number"
                   name="nilai1"
                   class="form-control"
                   min="0"
                   max="100"
                   value="{{ request('nilai1') }}"
                   required>
        </div>
        <div class="form-group">
            <label>Input Nilai 2</label>
            <input type="number"
                   name="nilai2"
                   class="form-control"
                   min="0"
                   max="100"
                   value="{{ request('nilai2') }}"
                   required>
        </div>
        <button type="submit" class="btn btn-green">
            Hitung
        </button>
    </form>
    @if (request()->has('nilai1') && request()->has('nilai2'))
        @php
            $nilai1 = (float) request('nilai1');
            $nilai2 = (float) request('nilai2');
            $rata = ($nilai1 + $nilai2) / 2;
        @endphp
        <div class="mt-4">
            <h3>Hasil Perhitungan</h3>
            <p>Nilai 1: {{ $nilai1 }}</p>
            <p>Nilai 2: {{ $nilai2 }}</p>
            <p>Rata-rata: {{ $rata }}</p>
            <p>
                Keterangan:
                @if ($rata >= 70)
                    <p>LULUS</p>
                @else
                    <p>TIDAK LULUS</p>
                @endif
            </p>
        </div>
    @endif
</div>
@endsection