<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_guru', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");

            });
        }

        $guru = $query
            ->orderBy('nama_guru', 'asc')
            ->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function public()
    {
        $guru = Guru::orderBy('nama_guru', 'asc')->get();
        return view('public.guru', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:guru,nip',
            'mapel' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nama_guru.string' => 'Nama guru harus berupa teks.',
            'nama_guru.max' => 'Nama guru maksimal 255 karakter.',

            'nip.string' => 'NIP harus berupa teks.',
            'nip.max' => 'NIP maksimal 50 karakter.',
            'nip.unique' => 'NIP sudah terdaftar pada data guru lain.',

            'mapel.string' => 'Mata pelajaran harus berupa teks.',
            'mapel.max' => 'Mata pelajaran maksimal 255 karakter.',

            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show($id)
    {
        $guru = \App\Models\Guru::findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $guru = Guru::findOrFail($id);

            return view('admin.guru.edit', compact('guru'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50|unique:guru,nip' . $guru->id . ',id_guru',
            'mapel' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nama_guru.string' => 'Nama guru harus berupa teks.',
            'nama_guru.max' => 'Nama guru maksimal 255 karakter.',

            'nip.string' => 'NIP harus berupa teks.',
            'nip.max' => 'NIP maksimal 50 karakter.',
            'nip.unique' => 'NIP sudah terdaftar pada data guru lain.',

            'mapel.string' => 'Mata pelajaran harus berupa teks.',
            'mapel.max' => 'Mata pelajaran maksimal 255 karakter.',

            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ];

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}