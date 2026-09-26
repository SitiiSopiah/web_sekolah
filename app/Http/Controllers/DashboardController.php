<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();

        $jumlahSiswa = Siswa::count();

        $jumlahBerita = Berita::count();

        $jumlahPengumuman = Pengumuman::count();

        $jumlahEkstrakurikuler = Ekstrakurikuler::count();

        $jumlahGaleri = Galeri::count();


        $beritaTerbaru = Berita::latest()
            ->take(5)
            ->get();


        $pengumumanTerbaru = Pengumuman::latest()
            ->take(5)
            ->get();


        return view('admin.dashboard.index', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahBerita',
            'jumlahPengumuman',
            'jumlahEkstrakurikuler',
            'jumlahGaleri',
            'beritaTerbaru',
            'pengumumanTerbaru'
        ));
    }
}