<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('user');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                ->orWhere('isi', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");

            });
        }

        $berita = $query
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function public() 
    {
        $berita = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('public.berita', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Publish,Draft',
            'slug' => 'required|string|max:255|unique:beritas,slug',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.string' => 'Judul berita harus berupa teks.',
            'judul.max' => 'Judul berita maksimal 255 karakter.',

            'isi.required' => 'Isi berita wajib diisi.',
            'isi.string' => 'Isi berita harus berupa teks.',

            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'tanggal.date' => 'Format tanggal berita tidak valid.',

            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',

            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita harus Publish atau Draft.',
        ]);
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'slug' => $request->slug,
            'id_user' => Auth::id(),
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = \App\Models\Berita::findOrFail($id);

        return view('admin.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $berita = Berita::findOrFail($id);

            return view('admin.berita.edit', compact('berita'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.string' => 'Judul berita harus berupa teks.',
            'judul.max' => 'Judul berita maksimal 255 karakter.',

            'isi.required' => 'Isi berita wajib diisi.',
            'isi.string' => 'Isi berita harus berupa teks.',

            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'tanggal.date' => 'Format tanggal berita tidak valid.',

            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',

            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita harus Publish atau Draft.',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {

            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function updateStatus(Berita $berita)
    {
        $berita->update([
            'status' => $berita->status === 'Publish'
                ? 'Draft'
                : 'Publish',
        ]);

        return back()->with('success', 'Status pengumuman berhasil diperbarui.');
    }
}