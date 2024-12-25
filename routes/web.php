<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// Route::controller(ProdukController::class)->prefix('produk')->group(function(){
//     Route::get('', 'index')->name('produk');
//     Route::get('insert', 'add')->name('produk.insert');
//     Route::post('insert', 'insert')->name('produk.add.insert');
//     Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
//     Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
//     Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');
// });
// Route::controller(KategoriController::class)->prefix('kategori')->group(function(){
//     Route::get('', 'index')->name('kategori');
//     Route::get('insert', 'add')->name('kategori.insert');
//     Route::post('insert', 'insert')->name('kategori.add.insert');
//     Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
//     Route::post('/kategori/edit/{id}', [KategoriController::class, 'update'])->name('kategori.update');
//     Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
// });

// Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');  // Halaman utama kasir
// Route::post('/kasir/tambah', [KasirController::class, 'addToCart'])->name('kasir.add');  // Menambah produk ke keranjang
// Route::get('/kasir/hapus/{id}', [KasirController::class, 'removeFromCart'])->name('kasir.remove');  // Menghapus produk dari keranjang
// Route::post('/kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');  // Proses checkout
// Route::get('/kasir/struk/{id}', [KasirController::class, 'receipt'])->name('kasir.receipt');  // Menampilkan struk transaksi

// Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Route Example
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export-excel');


Route::middleware(['auth','admin'])->group(function () {
    // Produk Routes
    Route::controller(ProdukController::class)->prefix('produk')->group(function () {
        Route::get('', 'index')->name('produk');
        Route::get('insert', 'add')->name('produk.insert');
        Route::post('insert', 'insert')->name('produk.add.insert');
        Route::get('/edit/{id}', 'edit')->name('produk.edit');
        Route::post('/edit/{id}', 'update')->name('produk.update');
        Route::post('/delete/{id}', 'destroy')->name('produk.delete');
    });

    // Kategori Routes
    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('', 'index')->name('kategori');
        Route::get('insert', 'add')->name('kategori.insert');
        Route::post('insert', 'insert')->name('kategori.add.insert');
        Route::get('/edit/{id}', 'edit')->name('kategori.edit');
        Route::post('/edit/{id}', 'update')->name('kategori.update');
        Route::post('/delete/{id}', 'destroy')->name('kategori.delete');
    });

    // User Routes
    Route::controller(UserController::class)->prefix('tables')->group(function () {
        Route::get('/tabel',  'index')->name('tables');
        Route::get('', 'index')->name('tables.index');
        Route::post('store', 'store')->name('tables.store');
        Route::put('{id}', 'update')->name('tables.update');
        Route::delete('{id}', 'destroy')->name('tables.destroy');
    });

    // Laporan Routes
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});


// Routes for Kasir
Route::middleware(['auth','kasir'])->group(function () {
    // Penjualan Routes
    Route::controller(PenjualanController::class)->prefix('penjualan')->group(function () {
        Route::get('', 'index')->name('penjualan');
        Route::get('insert', 'add')->name('penjualan.insert');
        Route::post('insert', 'insert')->name('penjualan.add.insert');
    });

    // Kasir Routes
    Route::controller(KasirController::class)->prefix('kasir')->group(function () {
        Route::get('', 'index')->name('kasir.index');  // Halaman utama kasir
        Route::post('tambah', 'addToCart')->name('kasir.add');  // Menambah produk ke keranjang
        Route::get('hapus/{id}', 'removeFromCart')->name('kasir.remove');  // Menghapus produk dari keranjang
        Route::post('checkout', 'checkout')->name('kasir.checkout');  // Proses checkout
        Route::get('struk/{id}', 'receipt')->name('kasir.receipt');  // Menampilkan struk transaksi
    });
});
