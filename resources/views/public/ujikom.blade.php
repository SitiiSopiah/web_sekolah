@extends('template.landing')

@section('title', 'Form Nilai Ujikom')

@section('content')
<div class="container" style="padding-top:120px; padding-bottom:50px;">

    <h3>Form Input Nilai Ujikom</h3>

    <form id="formUjikom">
        <div class="form-group">
            <label>Input Nilai 1</label>
            <input type="number" id="nilai1" class="form-control"
                min="0" max="100" required>
        </div>

        <div class="form-group">
            <label>Input Nilai 2</label>
            <input type="number" id="nilai2" class="form-control"
                min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">Hitung</button>
    </form>

    <div id="hasil" style="display:none; margin-top:20px;">
        <h3>Hasil Perhitungan</h3>
        <p>Nilai 1: <span id="hasil1"></span></p>
        <p>Nilai 2: <span id="hasil2"></span></p>
        <p>Rata-rata: <span id="rata"></span></p>
        <p>Keterangan: <span id="ket"></span></p>
    </div>

</div>

<script>
document.getElementById('formUjikom').addEventListener('submit', function(e) {
    e.preventDefault();

    const n1 = Number(document.getElementById('nilai1').value);
    const n2 = Number(document.getElementById('nilai2').value);

    if (n1 < 0 || n1 > 100 || n2 < 0 || n2 > 100) {
        alert('Nilai harus antara 0 sampai 100.');
        return;
    }

    const rata = (n1 + n2) / 2;
    const ket = rata >= 70 ? 'Lulus' : 'Tidak Lulus';

    document.getElementById('hasil1').textContent = n1;
    document.getElementById('hasil2').textContent = n2;
    document.getElementById('rata').textContent = rata;
    document.getElementById('ket').textContent = ket;
    document.getElementById('hasil').style.display = 'block';
});
</script>
@endsection