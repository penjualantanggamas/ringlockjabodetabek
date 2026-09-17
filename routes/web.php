<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Models\Article;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CheckoutController;

// ==========================================
// --- ROUTE PENGUNJUNG / USER (TIDAK WAJIB LOGIN) ---
// ==========================================

// 1. Beranda Utama
Route::get('/', function () {
    return view('index');
});

// 2. Katalog Produk (DIUBAH: Aman tanpa kueri tabel karena tabel sudah di-drop)
Route::get('/produk', function () {
    // 1. Setel array kosong secara manual agar halaman tidak crash mencari tabel yang hilang
    $products = []; 
    
    // 2. Ambil data session customer yang baru saja login
    $user = \Illuminate\Support\Facades\Auth::user(); 
    
    // 3. Lemparkan ke view produk.blade.php
    return view('produk', compact('products', 'user'));
});

// 3. Tentang Kami
Route::get('/tentang', function () {
    return view('tentang');
});

// 4. Halaman Artikel untuk Pengunjung (Menampilkan Semua & Detail Artikel)
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');


// ==========================================
// --- ROUTE AUTENTIKASI (LOGIN ADMIN) ---
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login']);
});


// ==========================================
// --- ROUTE PROTECTIONS ADMIN (WAJIB LOGIN) ---
// ==========================================
Route::middleware('auth')->prefix('admin')->group(function () {
    
    // 1. Dashboard Utama Admin
    Route::get('/dashboard', function () {
        $articles = Article::all();
        return view('admin.index', compact('articles'));
    })->name('admin.dashboard');

    // 2. Modul CRUD Artikel Admin (Mengelola Artikel)
    Route::resource('/articles', AdminArticleController::class);

    // >>> TAMBAHKAN BARIS INI <
    Route::post('/articles/upload-image', [AdminArticleController::class, 'uploadImage'])->name('articles.upload-image');

    // 3. Tombol Logout Admin
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Rute Halaman Manajemen Customer untuk Admin
Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
Route::post('/admin/customers/{id}/reset-password', [AdminCustomerController::class, 'updatePassword'])->name('admin.customers.reset-password');


// Route Autentikasi Customer
Route::get('/customer/register', [CustomerAuthController::class, 'showRegister'])->name('customer.register.form');
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register');

Route::get('/customer/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login.form');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');

Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');

// Route edit profil
Route::middleware('auth')->group(function () {
    Route::get('/profil/edit', [CustomerAuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profil/update', [CustomerAuthController::class, 'updateProfile'])->name('profile.update');
});

//Route Post Melayani Permintaan Harga Produk
Route::post('/produk/get-prices', [ProductController::class, 'getPrices'])->name('produk.get-prices');

// Bagian di dalam group admin web.php disesuaikan menjadi seperti ini:
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Rute manajemen produk admin
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/update/{id}', [AdminProductController::class, 'updatePrice'])->name('admin.products.update');
    
});

 Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// Pastikan masuk ke dalam kelompok rute yang terproteksi login
// Route::middleware(['auth'])->group(function () {
   
// });