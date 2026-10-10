<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_prestasi', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%")
                ->orWhere('tahun_ajaran', 'like', "%{$search}%");

            });
        }

        $prestasi = $query
            ->orderBy('tahun_ajaran', 'desc')
            ->get();

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function public()
    {
        $prestasi = Prestasi::orderBy('tahun_ajaran', 'desc')->get();
        return view('public.prestasi', compact('prestasi'));
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
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'nama_prestasi.string' => 'Nama prestasi harus berupa teks.',
            'nama_prestasi.max' => 'Nama prestasi maksimal 255 karakter.',

            'deskripsi.string' => 'Deskripsi prestasi harus berupa teks.',

            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',

            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahun_ajaran.string' => 'Tahun ajaran harus berupa teks.',
            'tahun_ajaran.max' => 'Tahun ajaran maksimal 20 karakter.',
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
        return view('admin.prestasi.show', compact('prestasi'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $prestasi = Prestasi::findOrFail($id);

            return view('admin.prestasi.edit', compact('prestasi'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'tahun_ajaran' => 'required|string|max:20',
        ], [
            'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
            'nama_prestasi.string' => 'Nama prestasi harus berupa teks.',
            'nama_prestasi.max' => 'Nama prestasi maksimal 255 karakter.',

            'deskripsi.string' => 'Deskripsi prestasi harus berupa teks.',

            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',

            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahun_ajaran.string' => 'Tahun ajaran harus berupa teks.',
            'tahun_ajaran.max' => 'Tahun ajaran maksimal 20 karakter.',
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