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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

});

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect()->route('login');

})->name('logout');

Route::middleware('CheckAuth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::resource('profil-sekolah', ProfilSekolahController::class)
        ->names('profil_sekolah');

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

    Route::get('/guru/{guru}', [GuruController::class, 'show'])
        ->name('guru.show');

    Route::put('/guru/{guru}', [GuruController::class, 'update'])
        ->middleware('roleAdmin')
        ->name('guru.update');

    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])
        ->middleware('roleAdmin')
        ->name('guru.destroy');
    
    // (-- Route Siswa --)
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
        ->middleware('roleAdmin')
        ->name('siswa.update');

    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])
        ->middleware('roleAdmin')
        ->name('siswa.destroy');


    Route::resource('berita', BeritaController::class);
    Route::patch(
        '/berita/{berita}/status',
        [BeritaController::class, 'updateStatus']
    )->name('berita.status');

    Route::resource('pengumuman', PengumumanController::class);
    Route::patch(
        '/pengumuman/{pengumuman}/status',
        [PengumumanController::class, 'updateStatus']
    )->name('pengumuman.status');

    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);

    Route::resource('galeri', GaleriController::class);

    Route::resource('prestasi', PrestasiController::class);

    // (-- Route Users --)
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

