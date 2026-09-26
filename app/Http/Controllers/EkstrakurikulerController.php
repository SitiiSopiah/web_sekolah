<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('nama_ekskul', 'asc')->get();

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(
        Request $request,
        Ekstrakurikuler $ekstrakurikuler
    ) {
        $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal_latihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {

            if (
                $ekstrakurikuler->gambar &&
                Storage::disk('public')->exists($ekstrakurikuler->gambar)
            ) {
                Storage::disk('public')->delete(
                    $ekstrakurikuler->gambar
                );
            }

            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($data);

        return redirect()
            ->route('ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if (
            $ekstrakurikuler->gambar &&
            Storage::disk('public')->exists($ekstrakurikuler->gambar)
        ) {
            Storage::disk('public')->delete(
                $ekstrakurikuler->gambar
            );
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}