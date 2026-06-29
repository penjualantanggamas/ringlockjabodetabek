<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Models\Article;

// ==========================================
// --- ROUTE PENGUNJUNG / USER (TIDAK WAJIB LOGIN) ---
// ==========================================

// 1. Beranda Utama
Route::get('/', function () {
    return view('index');
});

// 2. Katalog Produk
Route::get('/produk', function () {
    return view('produk');
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

    // 3. Modul CRUD Produk Admin (Mengelola Produk Scaffolding)
    Route::resource('/products', AdminProductController::class);

    // 4. Tombol Logout Admin
    Route::post('/logout', [AuthController::class, 'logout']);
});