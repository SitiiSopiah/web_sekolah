<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan semua data siswa
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa', 'asc')->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan form tambah siswa
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Menyimpan data siswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:20|unique:siswas,nisn',
            'nama_siswa'    => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        Siswa::create([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk'   => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail siswa
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Menampilkan form edit siswa
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Mengupdate data siswa
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn'          => 'required|string|max:20|unique:siswas,nisn,' . $siswa->id_siswa . ',id_siswa',
            'nama_siswa'    => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn'          => $request->nisn,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk'   => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Menghapus data siswa
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}