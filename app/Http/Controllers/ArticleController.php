<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar artikel di halaman publik blog (+ data kategori dinamis)
     */
    public function index(Request $request)
    {
        $query = Article::latest();

        // Filter jika ada kategori yang dipilih
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        $articles = $query->get();

        // Ambil daftar kategori unik dari tabel articles
        $categories = Article::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return (object) [
                    'slug' => $item->category,
                    'name' => ucwords(str_replace('-', ' ', $item->category))
                ];
            });

        // Pastikan $categories dan $articles dikirim bersamaan ke view
        return view('homeartikel', compact('articles', 'categories'));
    }

    /**
     * Menampilkan isi detail satu artikel
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $relatedArticles = Article::where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();

        return view('detailartikel', compact('article', 'relatedArticles'));
    }
}