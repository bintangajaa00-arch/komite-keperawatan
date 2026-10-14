<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomiteController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\SpoKeperawatanController;
use App\Http\Controllers\DataPersonalController;
use App\Http\Controllers\SertifikatController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/komite', [KomiteController::class, 'index'])->name('komite.index');

Route::get('/komite/mutu', function () {
    return view('komite.mutu');
})->name('komite.mutu');

Route::get('/komite/kredensial', function () {
    return view('komite.kredensial');
})->name('komite.kredensial');

Route::get('/komite/etik', function () {
    return view('komite.etik');
})->name('komite.etik');

Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan.index');
Route::get('/panduan/create', [PanduanController::class, 'create'])->name('panduan.create');
Route::post('/panduan', [PanduanController::class, 'store'])->name('panduan.store');
Route::get('/panduan/{panduan}/edit', [PanduanController::class, 'edit'])->name('panduan.edit');
Route::put('/panduan/{panduan}', [PanduanController::class, 'update'])->name('panduan.update');
Route::delete('/panduan/{panduan}', [PanduanController::class, 'destroy'])->name('panduan.destroy');

Route::get('/spo', [SpoKeperawatanController::class, 'index'])->name('spo.index');
Route::get('/spo/create', [SpoKeperawatanController::class, 'create'])->name('spo.create');
Route::post('/spo', [SpoKeperawatanController::class, 'store'])->name('spo.store');
Route::get('/spo/{spo}/edit', [SpoKeperawatanController::class, 'edit'])->name('spo.edit');
Route::put('/spo/{spo}', [SpoKeperawatanController::class, 'update'])->name('spo.update');
Route::delete('/spo/{spo}', [SpoKeperawatanController::class, 'destroy'])->name('spo.destroy');

Route::get('/data-personal', [DataPersonalController::class, 'index'])
    ->middleware('auth')
    ->name('data-personal.index');

Route::get('/data-personal/create', [DataPersonalController::class, 'create'])
    ->middleware('auth')
    ->name('data-personal.create');

Route::post('/data-personal', [DataPersonalController::class, 'store'])
    ->middleware('auth')
    ->name('data-personal.store');

Route::get('/data-personal/{dataPersonal}/edit', [DataPersonalController::class, 'edit'])
    ->middleware('auth')
    ->name('data-personal.edit');

Route::put('/data-personal/{dataPersonal}', [DataPersonalController::class, 'update'])
    ->middleware('auth')
    ->name('data-personal.update');

Route::delete('/data-personal/{dataPersonal}', [DataPersonalController::class, 'destroy'])
    ->middleware('auth')
    ->name('data-personal.destroy');



Route::get('/data-personal/{dataPersonal}/sertifikat/create', [SertifikatController::class, 'create'])
    ->middleware('auth')
    ->name('sertifikat.create');

Route::post('/data-personal/{dataPersonal}/sertifikat', [SertifikatController::class, 'store'])
    ->middleware('auth')
    ->name('sertifikat.store');

Route::delete('/sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])
    ->middleware('auth')
    ->name('sertifikat.destroy');