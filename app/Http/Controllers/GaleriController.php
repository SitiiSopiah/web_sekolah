<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('tanggal', 'desc')->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {

            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }

            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}