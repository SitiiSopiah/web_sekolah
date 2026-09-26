<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        if (!$profil) {
            return redirect()
                ->route('admin.profil_sekolah.create')
                ->with(
                    'info',
                    'Data profil sekolah belum tersedia. Silakan tambahkan terlebih dahulu.'
                );
        }

        return view('admin.profil_sekolah.index', compact('profil'));
    }

    public function create()
    {
        return view('admin.profil_sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'npsn' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|string|max:10',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_sekolah',
            'kepala_sekolah',
            'npsn',
            'alamat',
            'kontak',
            'visi_misi',
            'tahun_berdiri',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('profil_sekolah', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('profil_sekolah', 'public');
        }

        ProfilSekolah::create($data);

        return redirect()
            ->route('profil_sekolah.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function show(ProfilSekolah $profilSekolah)
    {
        return view('profil_sekolah.show', compact('profilSekolah'));
    }

    public function edit(ProfilSekolah $profilSekolah)
    {
        return view('admin.profil_sekolah.edit', compact('profilSekolah'));
    }

    public function update(
        Request $request,
        ProfilSekolah $profilSekolah
    ) {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'npsn' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|string|max:10',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->only([
            'nama_sekolah',
            'kepala_sekolah',
            'npsn',
            'alamat',
            'kontak',
            'visi_misi',
            'tahun_berdiri',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {

            if (
                $profilSekolah->foto &&
                Storage::disk('public')->exists($profilSekolah->foto)
            ) {
                Storage::disk('public')->delete(
                    $profilSekolah->foto
                );
            }

            $data['foto'] = $request->file('foto')
                ->store('profil_sekolah', 'public');
        }

        if ($request->hasFile('logo')) {

            if (
                $profilSekolah->logo &&
                Storage::disk('public')->exists($profilSekolah->logo)
            ) {
                Storage::disk('public')->delete(
                    $profilSekolah->logo
                );
            }

            $data['logo'] = $request->file('logo')
                ->store('profil_sekolah', 'public');
        }

        $profilSekolah->update($data);

        return redirect()
            ->route('profil_sekolah.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy(ProfilSekolah $profilSekolah)
    {
        if (
            $profilSekolah->foto &&
            Storage::disk('public')->exists($profilSekolah->foto)
        ) {
            Storage::disk('public')->delete(
                $profilSekolah->foto
            );
        }

        if (
            $profilSekolah->logo &&
            Storage::disk('public')->exists($profilSekolah->logo)
        ) {
            Storage::disk('public')->delete(
                $profilSekolah->logo
            );
        }

        $profilSekolah->delete();

        return redirect()
            ->route('profil_sekolah.index')
            ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}