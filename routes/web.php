<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController; // Admin ProdukController
use App\Http\Controllers\Customer\ProdukController as CustomerProdukController; 
use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard admin → redirect ke produk.index
Route::get('/dashboard', function () {
    return redirect()->route('produk.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes profile (untuk user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin: Resource CRUD Produk
Route::middleware('auth')->group(function () {
    Route::resource('produk', ProdukController::class);
});

// Customer: halaman lihat produk
Route::middleware('auth')->group(function () {
    Route::get('/customer/produk', function () {
        $user = Auth::user();
        if (strtolower($user->role) === 'customer') {
            return app(CustomerProdukController::class)->index();
        }
        abort(403, 'Akses ditolak.');
    })->name('customer.produk');
});

// ---------------------
// CART SYSTEM CUSTOMER
// ---------------------
Route::middleware('auth')->group(function () {

    // Menampilkan keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Menambah produk ke keranjang
    Route::post('/cart/{produkId}', [CartController::class, 'store'])->name('cart.store');

    // Update jumlah item
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

    // Hapus item
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

// Logout
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';
