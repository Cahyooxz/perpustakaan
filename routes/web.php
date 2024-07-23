<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;
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

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified','role:admin'])->prefix('daftar_buku')->group(function(){
    Route::get('/',[BukuController::class,'index'])->name('buku.index');
    Route::get('/tambah_buku',[BukuController::class,'create'])->name('buku.create');
    Route::post('/tambah_buku/save',[BukuController::class,'store'])->name('buku.store');
    Route::get('/edit_buku/{id}',[BukuController::class,'edit'])->name('buku.edit');
    Route::put('/edit_buku/update/{id}',[BukuController::class,'update'])->name('buku.update');
    Route::delete('/hapus/{id}',[BukuController::class,'destroy'])->name('buku.destroy');
});
Route::get('/rincian/{id}',[BukuController::class,'show'])->name('buku.show')->middleware(['auth','verified']);


Route::get('/daftar/peminjaman_buku',[PeminjamanController::class,'index'])->name('peminjaman.index');
Route::get('peminjaman_buku',[PeminjamanController::class,'user_index'])->name('peminjaman.user_index');
Route::post('/peminjaman_buku/save',[PeminjamanController::class,'store'])->name('peminjaman.store');
Route::delete('/peminjaman_buku/delete/{id}',[PeminjamanController::class,'destroy'])->name('peminjaman.destroy');
Route::get('/pinjaman_bukuku',[PeminjamanController::class,'show'])->name('peminjaman.show');
Route::post('/pinjaman_bukuku/komentar/{user_id}/{buku_id}',[PeminjamanController::class,'comment'])->name('komentar.store');


Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::post('/wishlist_buku/save',[WishlistController::class,'store'])->name('wishlist.store');
Route::delete('/wishlist_buku/unsave/{buku_id}',[WishlistController::class,'destroy'])->name('wishlist.destroy');

Route::get('/pengembalian_buku/{peminjaman_id}',[PengembalianController::class,'index'])->name('pengembalian.index');
Route::post('/pengembalian_buku/save/{peminjaman_id}',[PengembalianController::class,'store'])->name('pengembalian.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
