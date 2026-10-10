<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_ekskul', 'like', "%{$search}%")
                ->orWhere('pembina', 'like', "%{$search}%")
                ->orWhere('jadwal_latihan', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");

            });
        }

        $ekstrakurikuler = $query
            ->orderBy('nama_ekskul', 'asc')
            ->get();

        return view(
            'admin.ekstrakurikuler.index',
            compact('ekstrakurikuler')
        );
    }

    public function public() 
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('nama_ekskul', 'asc')->get();
        return view('public.ekstrakurikuler', compact('ekstrakurikuler'));
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
        ], [
            'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'nama_ekskul.string' => 'Nama ekstrakurikuler harus berupa teks.',
            'nama_ekskul.max' => 'Nama ekstrakurikuler maksimal 255 karakter.',

            'pembina.required' => 'Nama pembina wajib diisi.',
            'pembina.string' => 'Nama pembina harus berupa teks.',
            'pembina.max' => 'Nama pembina maksimal 255 karakter.',

            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'jadwal_latihan.string' => 'Jadwal latihan harus berupa teks.',
            'jadwal_latihan.max' => 'Jadwal latihan maksimal 255 karakter.',

            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',
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
        return view('admin.ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

            return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
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
        ], [
            'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'nama_ekskul.string' => 'Nama ekstrakurikuler harus berupa teks.',
            'nama_ekskul.max' => 'Nama ekstrakurikuler maksimal 255 karakter.',

            'pembina.required' => 'Nama pembina wajib diisi.',
            'pembina.string' => 'Nama pembina harus berupa teks.',
            'pembina.max' => 'Nama pembina maksimal 255 karakter.',

            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'jadwal_latihan.string' => 'Jadwal latihan harus berupa teks.',
            'jadwal_latihan.max' => 'Jadwal latihan maksimal 255 karakter.',
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