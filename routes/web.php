<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Models\Article;

Route::get('/', function () {
    return view('index');
});
Route::get('/produk', function () {
    return view('produk');
});
Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/artikel', [ArticleController::class, 'index']);
// Jalur untuk halaman detail tiap artikel secara dinamis menggunakan slug
Route::get('/artikel/{slug}', [ArticleController::class, 'show']);

// --- ROUTE AUTENTIKASI ---
// Pengunjung biasa tidak bisa melihat halaman ini, dan yang sudah login akan dialihkan
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login']);
});

// --- ROUTE PROTEKSI ADMIN (Wajib Login) ---
Route::middleware('auth')->prefix('admin')->group(function () {
    
    // Halaman utama dashboard setelah sukses login
    Route::get('/dashboard', function () {
        return view('admin.index'); // Nanti kita buat file tampilannya
    });

    // Tombol Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    // (Tempat rute CRUD Artikel & Produk Anda di masa depan akan ditaruh di dalam sini)
});

// --- ROUTE PROTEKSI ADMIN (Wajib Login) ---
    Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
    // Mengambil semua data artikel agar bisa dihitung jumlahnya di halaman dashboard
    $articles = Article::all();
    
    return view('admin.index', compact('articles'));
    });

    // ROUTE BARU: Menangani 7 fungsi CRUD artikel sekaligus secara otomatis
    Route::resource('/articles', AdminArticleController::class);

    // Tombol Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});