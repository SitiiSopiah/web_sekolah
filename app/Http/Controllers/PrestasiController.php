<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::orderBy('tahun_ajaran', 'desc')->get();

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'deskripsi' => $request->deskripsi,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        if ($request->hasFile('foto')) {

            if ($prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}