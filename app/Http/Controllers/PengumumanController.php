<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengumumanController extends Controller
{
    /**
     * Menampilkan semua pengumuman
     */
    public function index(Request $request)
    {
        $query = Pengumuman::with('user');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', "%{$search}%")
                ->orWhere('isi', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");

            });
        }

        $pengumuman = $query
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function public()
    {
        $pengumuman = Pengumuman::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('public.pengumuman', compact('pengumuman'));
    }

    /**
     * Form tambah pengumuman
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Menyimpan pengumuman
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.string' => 'Judul pengumuman harus berupa teks.',
            'judul.max' => 'Judul pengumuman maksimal 255 karakter.',

            'isi.required' => 'Isi pengumuman wajib diisi.',
            'isi.string' => 'Isi pengumuman harus berupa teks.',

            'tanggal.required' => 'Tanggal pengumuman wajib diisi.',
            'tanggal.date' => 'Format tanggal pengumuman tidak valid.',

            'status.required' => 'Status pengumuman wajib dipilih.',
            'status.in' => 'Status pengumuman hanya boleh Publish atau Draft.',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => Auth::id(),
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pengumuman
     */
    public function show($id)
    {
        $pengumuman = \App\Models\Pengumuman::findOrFail($id);
        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Form edit pengumuman
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $pengumuman = Pengumuman::findOrFail($id);

            return view('admin.pengumuman.edit', compact('pengumuman'));

        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }

    /**
     * Memperbarui pengumuman
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'judul.string' => 'Judul pengumuman harus berupa teks.',
            'judul.max' => 'Judul pengumuman maksimal 255 karakter.',

            'isi.required' => 'Isi pengumuman wajib diisi.',
            'isi.string' => 'Isi pengumuman harus berupa teks.',

            'tanggal.required' => 'Tanggal pengumuman wajib diisi.',
            'tanggal.date' => 'Format tanggal pengumuman tidak valid.',

            'status.required' => 'Status pengumuman wajib dipilih.',
            'status.in' => 'Status pengumuman hanya boleh Publish atau Draft.',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Menghapus pengumuman
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    /**
     * Mengubah status Publish / Draft
     */
    public function updateStatus(Pengumuman $pengumuman)
    {
        $pengumuman->update([
            'status' => $pengumuman->status === 'Publish'
                ? 'Draft'
                : 'Publish',
        ]);

        return back()->with('success', 'Status pengumuman berhasil diperbarui.');
    }
}