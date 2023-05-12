<?php

use App\Http\Controllers\ArmadaMobilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\roleCek;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard/users', [UsersController::class, 'index'])->name('users');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');


// sopir
Route::prefix('sopir')->group(function () {
    Route::get('/', [SopirController::class, 'list'])->name('sopir.list');
    Route::post('/', [SopirController::class, 'store'])->name('sopir.store');
    // Route::get('/{sopir}', [SopirController::class, 'edit'])->name('sopir.edit');
    Route::put('/{sopir}', [SopirController::class, 'update'])->name('sopir.update');
    Route::delete('/{sopir}', [SopirController::class, 'destroy'])->name('sopir.destroy');
});

// mobil
Route::prefix('mobil')->group(function () {
    Route::get('/', [MobilController::class, 'list'])->name('mobil.list');
    Route::post('/', [MobilController::class, 'store'])->name('mobil.store');
    Route::put('/{mobil}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/{mobil}', [MobilController::class, 'destroy'])->name('mobil.destroy');
});



Route::prefix('armada-mobil')->group(function () {
    Route::get('/', [ArmadaMobilController::class, 'list'])->name('armada-mobil.list');
    Route::put('/{mobil}', [ArmadaMobilController::class, 'update'])->name('armada-mobil.update');
});

Route::prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::put('/{id}/peminjaman', [TransaksiController::class, 'peminjaman'])->name('transaksi.peminjaman');
});