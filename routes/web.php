<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KecanduanController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/run-seed-secret', function () {
    Artisan::call('migrate:fresh', [
        '--seed' => true,
        '--force' => true,
    ]);

    return 'Migration dan seeder berhasil dijalankan';
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/artikel_pengunjung', [HomeController::class, 'artikel'])->name('artikel_pengunjung');
Route::get('/artikel_pengunjung/show/{artikel}', [HomeController::class, 'artikel_detail'])->name('artikel_pengunjung.detail');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class, 'index', 'panggil'])->name('dashboard')->middleware('auth');

Route::get('/password', [PasswordController::class, 'index'])->name('password');
Route::post('/password/proses', [PasswordController::class, 'proses'])->name('password.proses');

Route::resource('kecanduan', KecanduanController::class)->except('show');
Route::resource('gejala', GejalaController::class)->except('show');
Route::resource('pengguna', PenggunaController::class)->except('show');
Route::resource('artikel', ArtikelController::class)->except('show');
Route::resource('aturan', AturanController::class)->except('show');
Route::resource('hasil', HasilController::class)->only(['index', 'update', 'destroy', 'show', 'edit', 'bisa']);
// Route::resource('hasiil', HasilController::class)->except('kaka');

Route::get('/hasil/{hasil}/cetak', [HasilController::class, 'cetak'])->name('hasil.cetak');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
Route::put('/profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');

Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis');
Route::post('/diagnosis/proses', [DiagnosisController::class, 'proses'])->name('diagnosis.proses');
Route::post('/diagnosis/hasil', [DiagnosisController::class, 'hasil'])->name('diagnosis.hasil');
Route::post('/diagnosis/pdf', [DiagnosisController::class, 'pdf'])->name('diagnosis.pdf');
