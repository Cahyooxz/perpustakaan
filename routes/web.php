<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:petugas|admin'])->name('dashboard');

Route::get('/peminjaman_buku',[PeminjamanController::class,'index'])->name('peminjaman.index');
Route::delete('/peminjaman_buku/delete/{id}',[PeminjamanController::class,'destroy'])->name('peminjaman.destroy');

Route::get('/daftar_buku',[BukuController::class,'index'])->name('buku.index');
Route::get('/add_daftar_buku',[BukuController::class,'create'])->name('buku.create');
Route::get('/add_daftar_buku/detail/{id}',[BukuController::class,'show'])->name('buku.show');
Route::post('/add_daftar_buku/save',[BukuController::class,'store'])->name('buku.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
