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

Route::get('/daftar/peminjaman_buku',[PeminjamanController::class,'index'])->name('peminjaman.index');
Route::get('peminjaman_buku',[PeminjamanController::class,'user_index'])->name('peminjaman.user_index');
Route::post('/peminjaman_buku/save',[PeminjamanController::class,'store'])->name('peminjaman.store');
Route::delete('/peminjaman_buku/delete/{id}',[PeminjamanController::class,'destroy'])->name('peminjaman.destroy');
Route::get('/pinjaman_bukuku',[PeminjamanController::class,'show'])->name('peminjaman.show');

Route::get('/daftar_buku',[BukuController::class,'index'])->name('buku.index');
Route::get('/add_daftar_buku',[BukuController::class,'create'])->name('buku.create');
Route::get('/daftar_buku/rincian/{id}',[BukuController::class,'show'])->name('buku.show');
Route::post('/add_daftar_buku/save',[BukuController::class,'store'])->name('buku.store');
Route::delete('/daftar_buku/delete/{id}',[BukuController::class,'destroy'])->name('buku.destroy');

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
