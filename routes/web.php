
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UjikomController;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Daftar publik
Route::get('/guru/public', [GuruController::class, 'public'])
    ->name('public.guru');

Route::get('/berita/public', [BeritaController::class, 'public'])
    ->name('public.berita');

Route::get('/pengumuman/public', [PengumumanController::class, 'public'])
    ->name('public.pengumuman');

Route::get('/ekstrakurikuler/public', [EkstrakurikulerController::class, 'public'])
    ->name('public.ekstrakurikuler');

Route::get('/galeri/public', [GaleriController::class, 'public'])
    ->name('public.galeri');

Route::get('/prestasi/public', [PrestasiController::class, 'public'])
    ->name('public.prestasi');

Route::get('/profil-sekolah/public', [ProfilSekolahController::class, 'public'])
    ->name('public.profil_sekolah');

Route::get('/ujikom/public', [UjikomController::class, 'public'])
    ->name('public.ujikom');

// Detail 
Route::get('/guru/detail/{guru}', [GuruController::class, 'show'])
    ->name('guru.show');

Route::get('/berita/detail/{slug}', [BeritaController::class, 'show'])
    ->name('berita.show');

Route::get('/pengumuman/detail/{pengumuman}', [PengumumanController::class, 'show'])
    ->name('pengumuman.show');

Route::get('/ekstrakurikuler/detail/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])
    ->name('ekstrakurikuler.show');

Route::get('/galeri/detail/{galeri}', [GaleriController::class, 'show'])
    ->name('galeri.show');

Route::get('/prestasi/detail/{prestasi}', [PrestasiController::class, 'show'])
    ->name('prestasi.show');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->middleware('CheckAuth')->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN: WAJIB LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('CheckAuth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    // Profil Sekolah
    Route::resource('profil-sekolah', ProfilSekolahController::class)
        ->names('profil_sekolah');

    Route::get('/profile', [ProfilController::class, 'index'])
        ->name('admin.profil.index');

    Route::put('/profile', [ProfilController::class, 'update'])
        ->name('admin.profil.update');

    Route::put('/profile/password', [ProfilController::class, 'updatePassword'])
        ->name('admin.profil.password');


    // Guru
    Route::get('/guru', [GuruController::class, 'index'])
        ->name('guru.index');

    Route::get('/guru/create', [GuruController::class, 'create'])
        ->middleware('roleAdmin')
        ->name('guru.create');

    Route::post('/guru', [GuruController::class, 'store'])
        ->middleware('roleAdmin')
        ->name('guru.store');

    Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])
        ->middleware('roleAdmin')
        ->name('guru.edit');

    Route::put('/guru/{guru}', [GuruController::class, 'update'])
        ->middleware('roleAdmin')
        ->name('guru.update');

    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])
        ->middleware('roleAdmin')
        ->name('guru.destroy');


    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])
        ->name('siswa.index');

    Route::get('/siswa/create', [SiswaController::class, 'create'])
        ->middleware('roleAdmin')
        ->name('siswa.create');

    Route::post('/siswa', [SiswaController::class, 'store'])
        ->middleware('roleAdmin')
        ->name('siswa.store');

    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])
        ->middleware('roleAdmin')
        ->name('siswa.edit');

    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])
        ->name('siswa.show');

    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])
        ->name('siswa.update');

    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])
        ->middleware('roleAdmin')
        ->name('siswa.destroy');


    // Berita
    Route::resource('berita', BeritaController::class)
        ->except(['show']);

    Route::patch('/berita/{berita}/status', [BeritaController::class, 'updateStatus'])
        ->name('berita.status');


    // Pengumuman
    Route::resource('pengumuman', PengumumanController::class)
        ->except(['show']);

    Route::patch('/pengumuman/{pengumuman}/status', [PengumumanController::class, 'updateStatus'])
        ->name('pengumuman.status');


    // Ekstrakurikuler
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class)
        ->except(['show']);


    // Galeri
    Route::resource('galeri', GaleriController::class)
        ->except(['show']);


    // Prestasi
    Route::resource('prestasi', PrestasiController::class)
        ->except(['show']);


    // Users
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->middleware('roleAdmin')
        ->name('users.create');

    Route::post('/users', [UserController::class, 'store'])
        ->middleware('roleAdmin')
        ->name('users.store');

    Route::get('/users/{users}/edit', [UserController::class, 'edit'])
        ->middleware('roleAdmin')
        ->name('users.edit');

    Route::get('/users/{users}', [UserController::class, 'show'])
        ->name('users.show');

    Route::put('/users/{users}', [UserController::class, 'update'])
        ->middleware('roleAdmin')
        ->name('users.update');

    Route::delete('/users/{users}', [UserController::class, 'destroy'])
        ->middleware('roleAdmin')
        ->name('users.destroy');

});