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

use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\Program;
use App\Models\TigaProgram;
use App\Models\ProfilKepsek;
use App\Models\ProfilSekolah;
use App\Models\SosialMedia;
/*
|--------------------------------------------------------------------------
| 🌐 Public Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/

// 🏠 Halaman Utama
Route::get('/', function () {
    $beritaList = Berita::with('kategori')->latest()->take(6)->get();
    $programs = Program::all();
    $tigaProgram = TigaProgram::latest()->first();
    $profil = ProfilKepsek::first();

    return view('frontend.welcome', compact('beritaList', 'programs', 'tigaProgram', 'profil'));
});

// 📋 Daftar Siswa (Frontend)
Route::get('/daftar-siswa', [SiswaController::class, 'daftarSiswaFrontend'])->name('daftar.siswa');

// 🔍 Detail Siswa (Frontend)
Route::get('/daftar-siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');

// 📄 Detail Berita (Public)
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.detail');

// 🔐 Halaman statis (opsional)
Route::view('/detail-siswa', 'frontend.detailSiswa');

/*
|--------------------------------------------------------------------------
| 🔐 Auth Routes (Login / Logout)
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
        // 📊 Dashboard
        Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');

        // 👨‍🎓 CRUD Siswa
        Route::resource('siswa', SiswaController::class)->except('show');

        // 📰 Berita
        Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

        // 🗂️ Kategori Berita
        Route::post('/kategori', [KategoriBeritaController::class, 'store'])->name('kategori.store');
        Route::delete('/kategori/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori.destroy');

        // ✅ Program Unggulan
        Route::get('/program-unggulan', [ProgramController::class, 'index'])->name('program.index');
        Route::post('/program-unggulan', [ProgramController::class, 'store'])->name('program.store');
        Route::delete('/program-unggulan/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

        // ⭐ 3 Program Unggulan
        Route::get('/tiga-program', [TigaProgramController::class, 'index'])->name('tigaprogram.index');
        Route::post('/tiga-program', [TigaProgramController::class, 'store'])->name('tigaprogram.store');

        // 👨‍🏫 Profil Kepala Sekolah
        Route::get('/profil-kepsek', [ProfilKepsekController::class, 'index'])->name('profilkepsek.index');
        Route::post('/profil-kepsek', [ProfilKepsekController::class, 'store'])->name('profilkepsek.store');
        Route::put('/profil-kepsek/{id}', [ProfilKepsekController::class, 'update'])->name('profilkepsek.update');

        // ✅ Profil Sekolah

        Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profilsekolah.index');
        Route::post('/profil-sekolah', [ProfilSekolahController::class, 'store'])->name('profilsekolah.store');
        Route::put('/profil-sekolah/{id}', [ProfilSekolahController::class, 'update'])->name('profilsekolah.update');

        // 🌐 Sosial Media
        Route::get('/sosial-media', [SosialMediaController::class, 'index'])->name('sosialmedia.index');
        Route::post('/sosial-media', [SosialMediaController::class, 'store'])->name('sosialmedia.store');
        Route::get('/sosial-media/{id}/edit', [SosialMediaController::class, 'edit'])->name('sosialmedia.edit');
        Route::put('/sosial-media/{id}', [SosialMediaController::class, 'update'])->name('sosialmedia.update');
        Route::delete('/sosial-media/{id}', [SosialMediaController::class, 'destroy'])->name('sosialmedia.destroy');

        // 🛡️ Khusus Admin
        Route::middleware('admin')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
        });
    });
