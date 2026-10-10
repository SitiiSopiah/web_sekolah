<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                ->orWhere('keterangan', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");

            });
        }

        $galeri = $query
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function public()
    {
        $galeri = Galeri::orderBy('tanggal', 'desc')->get();

        return view('public.galeri', compact('galeri'));
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
        ],[
            'judul.required' => 'Judul galeri wajib diisi.',
            'judul.string' => 'Judul galeri harus berupa teks.',
            'judul.max' => 'Judul galeri maksimal 255 karakter.',

            'keterangan.string' => 'Keterangan harus berupa teks.',

            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'kategori.in' => 'Kategori hanya boleh Foto atau Video.',

            'tanggal.required' => 'Tanggal galeri wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',

            'file.required' => 'File foto atau video wajib diunggah.',
            'file.file' => 'File yang diunggah tidak valid.',
            'file.mimes' => 'Format file harus JPG, JPEG, PNG, WEBP, MP4, MOV, AVI, atau MKV.',
            'file.max' => 'Ukuran file maksimal 20 MB.',
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
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $galeri = Galeri::findOrFail($id);

            return view('admin.galeri.edit', compact('galeri'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'judul.string' => 'Judul galeri harus berupa teks.',
            'judul.max' => 'Judul galeri maksimal 255 karakter.',

            'keterangan.string' => 'Keterangan harus berupa teks.',

            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'kategori.in' => 'Kategori hanya boleh Foto atau Video.',

            'tanggal.required' => 'Tanggal galeri wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            
            'file.file' => 'File yang diunggah tidak valid.',
            'file.mimes' => 'Format file harus JPG, JPEG, PNG, WEBP, MP4, MOV, AVI, atau MKV.',
            'file.max' => 'Ukuran file maksimal 20 MB.',
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