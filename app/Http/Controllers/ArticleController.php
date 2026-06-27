<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Fungsi untuk menampilkan semua artikel di halaman utama blog
    public function index()
    {
        // Mengambil semua data artikel dari database, diurutkan dari yang terbaru
        $articles = Article::latest()->get();

        // Mengirim data artikel ke file view 'homeartikel.blade.php'
        return view('homeartikel', compact('articles'));
    }

    // Fungsi untuk menampilkan isi satu artikel secara utuh (Halaman Detail)
    public function show($slug)
    {
        // Mencari artikel berdasarkan slug URL-nya, jika tidak ada akan memunculkan error 404
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('detailartikel', compact('article'));
    }
}