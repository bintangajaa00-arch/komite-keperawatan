<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomiteController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\SpoKeperawatanController;
use App\Http\Controllers\DataPersonalController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\OppeController;

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login dapat diakses tanpa autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Seluruh fitur aplikasi wajib login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Menu Komite Keperawatan
    Route::get('/komite', [KomiteController::class, 'index'])
        ->name('komite.index');

    Route::get('/komite/mutu', function () {
        return view('komite.mutu');
    })->name('komite.mutu');

    Route::get('/komite/kredensial', function () {
        return view('komite.kredensial');
    })->name('komite.kredensial');

    Route::get('/komite/etik', function () {
        return view('komite.etik');
    })->name('komite.etik');

    // Panduan: semua pengguna login boleh membaca
    Route::get('/panduan', [PanduanController::class, 'index'])
        ->name('panduan.index');

    // Panduan: hanya admin yang boleh mengelola
    Route::middleware('admin')->group(function () {
        Route::get('/panduan/create', [PanduanController::class, 'create'])
            ->name('panduan.create');

        Route::post('/panduan', [PanduanController::class, 'store'])
            ->name('panduan.store');

        Route::get('/panduan/{panduan}/edit', [PanduanController::class, 'edit'])
            ->name('panduan.edit');

        Route::put('/panduan/{panduan}', [PanduanController::class, 'update'])
            ->name('panduan.update');

        Route::delete('/panduan/{panduan}', [PanduanController::class, 'destroy'])
            ->name('panduan.destroy');
    });

    // SPO Keperawatan: semua pengguna login boleh membaca
    Route::get('/spo', [SpoKeperawatanController::class, 'index'])
        ->name('spo.index');

    // SPO Keperawatan: hanya admin yang boleh mengelola
    Route::middleware('admin')->group(function () {
        Route::get('/spo/create', [SpoKeperawatanController::class, 'create'])
            ->name('spo.create');

        Route::post('/spo', [SpoKeperawatanController::class, 'store'])
            ->name('spo.store');

        Route::get('/spo/{spo}/edit', [SpoKeperawatanController::class, 'edit'])
            ->name('spo.edit');

        Route::put('/spo/{spo}', [SpoKeperawatanController::class, 'update'])
            ->name('spo.update');

        Route::delete('/spo/{spo}', [SpoKeperawatanController::class, 'destroy'])
            ->name('spo.destroy');
    });

    // Data Personal
    Route::get('/data-personal', [DataPersonalController::class, 'index'])
        ->name('data-personal.index');

    Route::get('/data-personal/create', [DataPersonalController::class, 'create'])
        ->name('data-personal.create');

    Route::post('/data-personal', [DataPersonalController::class, 'store'])
        ->name('data-personal.store');

    Route::get('/data-personal/{dataPersonal}/edit', [DataPersonalController::class, 'edit'])
        ->name('data-personal.edit');

    Route::put('/data-personal/{dataPersonal}', [DataPersonalController::class, 'update'])
        ->name('data-personal.update');

    Route::delete('/data-personal/{dataPersonal}', [DataPersonalController::class, 'destroy'])
        ->name('data-personal.destroy');

    // Sertifikat
    Route::get('/data-personal/{dataPersonal}/sertifikat/create', [SertifikatController::class, 'create'])
        ->name('sertifikat.create');

    Route::post('/data-personal/{dataPersonal}/sertifikat', [SertifikatController::class, 'store'])
        ->name('sertifikat.store');

    Route::delete('/sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])
        ->name('sertifikat.destroy');

    Route::get('/sertifikat/{sertifikat}/file', [SertifikatController::class, 'showFile'])
        ->name('sertifikat.file');

    // OPPE: menambah banyak dokumen untuk satu data personal
    Route::get('/data-personal/{dataPersonal}/oppe/create', [OppeController::class, 'create'])
        ->name('oppe.create');

    Route::post('/data-personal/{dataPersonal}/oppe', [OppeController::class, 'store'])
        ->name('oppe.store');

    // Membuka dan menghapus dokumen OPPE satu per satu
    Route::get('/oppe/{oppe}/file', [OppeController::class, 'showFile'])
        ->name('oppe.file');

    Route::delete('/oppe/{oppe}', [OppeController::class, 'destroy'])
        ->name('oppe.destroy');

    // Membuka dokumen Data Personal secara terproteksi
    Route::get(
        '/data-personal/{dataPersonal}/dokumen/{jenis}',
        [DataPersonalController::class, 'showDocument']
    )->name('data-personal.document');
});
