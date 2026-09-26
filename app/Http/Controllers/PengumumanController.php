<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    /**
     * Menampilkan semua pengumuman
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('tanggal', 'desc')->get();

        return view('admin.pengumuman.index', compact('pengumuman'));
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
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Form edit pengumuman
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
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