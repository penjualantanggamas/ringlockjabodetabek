<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Menampilkan tabel daftar semua artikel di panel admin.
     */
    public function index()
    {
        // Mengambil semua artikel, diurutkan dari yang paling baru dibuat
        $articles = Article::latest()->get();

        // Mengarahkan ke file view admin/articles/index.blade.php
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:edukasi-k3,proyek,instalasi',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,svg', // Maksimal 2MB
        ]);
    // 2. Proses Pengunggahan Gambar Thumbnail
        $imagePath = null;
        if ($request->hasFile('thumbnail')) {
            // Menyimpan ke folder storage/app/public/articles
            $imagePath = $request->file('thumbnail')->store('articles', 'public');
        }

        // 3. Simpan Data ke Tabel Articles
        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(), // Mencegah duplikasi slug
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'thumbnail' => $imagePath,
        ]);
    // 4. Alihkan kembali ke halaman tabel dengan notifikasi sukses
        return redirect()->route('articles.index')->with('success', 'Artikel baru berhasil diterbitkan!');
    }
    /**
     * Menampilkan halaman form edit artikel berdasarkan ID.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Memproses pembaruan data artikel ke database.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        // 1. Validasi Input Form (Thumbnail bersifat opsional saat edit)
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|in:edukasi-k3,proyek,instalasi',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg', 
        ]);

        // 2. Cek apakah admin mengunggah gambar baru
        $imagePath = $article->thumbnail; // Default pakai gambar lama
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama dari folder lokal agar tidak memenuhi memori penyimpanan
            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            // Simpan gambar baru
            $imagePath = $request->file('thumbnail')->store('articles', 'public');
        }

        // 3. Update Data di Database
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(), // Opsional: perbarui slug agar tetap rapi sesuai judul baru
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'thumbnail' => $imagePath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel dari database secara permanen.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        // Hapus file gambarnya terlebih dahulu dari folder lokal
        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        // Hapus baris data dari database
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}