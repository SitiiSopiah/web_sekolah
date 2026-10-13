<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Prestasi;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        // Data Guru
        $guru = Guru::orderBy('nama_guru', 'asc')
            ->take(4)
            ->get();

        // Data Siswa
        $jumlahSiswa = Siswa::count();

        // Jumlah Guru
        $jumlahGuru = Guru::count();

        // Jumlah Ekstrakurikuler
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();

        // Jumlah Berita
        $jumlahBerita = Berita::where('status', 'Publish')->count();

        // Jumlah Pengumuman
        $jumlahPengumuman = Pengumuman::where('status', 'Publish')->count();

        // Berita terbaru
        $berita = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        // Pengumuman terbaru
        $pengumuman = Pengumuman::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        // Ekstrakurikuler
        $ekstrakurikuler = Ekstrakurikuler::latest()
            ->take(3)
            ->get();

        // Galeri
        $galeri = Galeri::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $prestasi = Prestasi::orderBy('tahun_ajaran', 'desc')
            ->take(3)
            ->get();
            

        return view('home', compact(
            'profil',
            'guru',
            'berita',
            'pengumuman',
            'ekstrakurikuler',
            'galeri',
            'prestasi',
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahEkstrakurikuler',
            'jumlahBerita',
            'jumlahPengumuman'
        ));
    }
}