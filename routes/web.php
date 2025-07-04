<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TigaProgramController;
use App\Http\Controllers\ProfilKepsekController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruTendikController;

/*
|--------------------------------------------------------------------------
| 🌐 Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $beritaList = App\Models\Berita::with('kategori')->latest()->take(6)->get();
    $programs = App\Models\Program::all();
    $tigaProgram = App\Models\TigaProgram::latest()->first();
    $profil = App\Models\ProfilKepsek::first();

    return view('frontend.welcome', compact('beritaList', 'programs', 'tigaProgram', 'profil'));
});
// 📋 Daftar Guru & Tendik (Frontend)
Route::get('/daftar-tendik', [GuruTendikController::class, 'daftarTendikFrontend'])->name('daftar.tendik');
Route::get('/daftar-siswa', [SiswaController::class, 'daftarSiswaFrontend'])->name('daftar.siswa');
Route::get('/daftar-siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.detail');
Route::get('/guru-tendik/{id}', [GuruTendikController::class, 'show'])->name('guru.tendik.show');
Route::get('/berita', [BeritaController::class, 'daftarBeritaFrontend'])->name('berita.index');

// Route::view('/berita', 'frontend.berita');
// Route::view('/detail-tendik', 'frontend.detailTendik');
/*
|--------------------------------------------------------------------------
| 🔐 Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 🔒 Admin Routes (Harus Login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');

        // Siswa
        Route::resource('siswa', SiswaController::class)->except('show');

        // Berita
        Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

        // Kategori Berita
        Route::post('/kategori', [KategoriBeritaController::class, 'store'])->name('kategori.store');
        Route::delete('/kategori/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori.destroy');

        // Program Unggulan
        Route::get('/program-unggulan', [ProgramController::class, 'index'])->name('program.index');
        Route::post('/program-unggulan', [ProgramController::class, 'store'])->name('program.store');
        Route::delete('/program-unggulan/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

        // Tiga Program
        Route::get('/tiga-program', [TigaProgramController::class, 'index'])->name('tigaprogram.index');
        Route::post('/tiga-program', [TigaProgramController::class, 'store'])->name('tigaprogram.store');

        // Profil Kepsek
        Route::get('/profil-kepsek', [ProfilKepsekController::class, 'index'])->name('profilkepsek.index');
        Route::post('/profil-kepsek', [ProfilKepsekController::class, 'store'])->name('profilkepsek.store');
        Route::put('/profil-kepsek/{id}', [ProfilKepsekController::class, 'update'])->name('profilkepsek.update');

        // Profil Sekolah
        Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profilsekolah.index');
        Route::post('/profil-sekolah', [ProfilSekolahController::class, 'store'])->name('profilsekolah.store');
        Route::put('/profil-sekolah/{id}', [ProfilSekolahController::class, 'update'])->name('profilsekolah.update');

        // Sosial Media
        Route::get('/sosial-media', [SosialMediaController::class, 'index'])->name('sosialmedia.index');
        Route::post('/sosial-media', [SosialMediaController::class, 'store'])->name('sosialmedia.store');
        Route::get('/sosial-media/{id}/edit', [SosialMediaController::class, 'edit'])->name('sosialmedia.edit');
        Route::put('/sosial-media/{id}', [SosialMediaController::class, 'update'])->name('sosialmedia.update');
        Route::delete('/sosial-media/{id}', [SosialMediaController::class, 'destroy'])->name('sosialmedia.destroy');

        // Mapel
        Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
        Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');

        // Guru & Tendik
        Route::get('/guru-tendik', [GuruTendikController::class, 'index'])->name('guru.tendik.index');
        Route::post('/guru-tendik', [GuruTendikController::class, 'store'])->name('guru.tendik.store');
        Route::get('/guru-tendik/{id}/edit', [GuruTendikController::class, 'edit'])->name('guru.tendik.edit');
        Route::put('/guru-tendik/{id}', [GuruTendikController::class, 'update'])->name('guru.tendik.update');
        Route::delete('/guru-tendik/{id}', [GuruTendikController::class, 'destroy'])->name('guru.tendik.destroy');

        // Rombel (sementara masih view manual)
        Route::view('/rombel', 'backend.daftarRombel')->name('rombel.form');

        // Menu Coming Soon
        Route::view('/comingsoon', 'backend.comingsoon')->name('coming.soon');

        // User Management (admin only)
        Route::middleware('admin')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
        });
    });
