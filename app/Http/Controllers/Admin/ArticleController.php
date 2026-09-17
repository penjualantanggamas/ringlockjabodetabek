<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateArticle($request);

        $prefix = Str::slug($validated['prefix']);
        $manualSlug = ! empty($validated['slug']);
        $slug = $manualSlug ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        if ($slug === '') {
            $slug = 'artikel';
        }

        if ($manualSlug) {
            $exists = Article::where('prefix', $prefix)->where('slug', $slug)->exists();
            if ($exists) {
                throw ValidationException::withMessages([
                    'slug' => 'Kombinasi prefix + slug sudah digunakan artikel lain.',
                ]);
            }
        } else {
            $slug = $this->generateUniqueSlug($slug, $prefix);
        }

        $categorySlug = $this->resolveCategory($validated);
        $thumbnailPath = $request->file('thumbnail')->store('articles/thumbnails', 'public');

        Article::create([
            'title' => $validated['title'],
            'prefix' => $prefix,
            'slug' => $slug,
            'category' => $categorySlug,
            'thumbnail' => $thumbnailPath,
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'] ?? null,
            'faqs' => $this->parseFaqs($request),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_author' => $validated['meta_author'] ?? 'PT. Tangga Mas Jaya Makmur',
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        // prefix & slug DIKUNCI setelah published — sengaja tidak divalidasi/diupdate
        $validated = $this->validateArticle($request, lockPermalink: true);

        $categorySlug = $this->resolveCategory($validated);

        $updateData = [
            'title' => $validated['title'],
            'category' => $categorySlug,
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'] ?? null,
            'faqs' => $this->parseFaqs($request),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_author' => $validated['meta_author'] ?? 'PT. Tangga Mas Jaya Makmur',
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ];

        // Thumbnail cuma diganti kalau admin upload file baru.
        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $updateData['thumbnail'] = $request->file('thumbnail')->store('articles/thumbnails', 'public');
        }

        $article->update($updateData);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    /**
     * Endpoint upload gambar untuk CKEditor 5.
     * Response mengikuti format SimpleUploadAdapter / CKFinder.
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'uploaded' => 0,
                'error' => ['message' => $validator->errors()->first('upload')],
            ], 422);
        }

        $path = $request->file('upload')->store('articles/content', 'public');

        return response()->json([
            'uploaded' => 1,
            'fileName' => basename($path),
            'url' => Storage::disk('public')->url($path),
        ]);
    }

    private function validateArticle(Request $request, bool $lockPermalink = false): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'new_category' => ['nullable', 'string', 'max:255', 'required_if:category,new'],
            'excerpt' => ['required', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string', 'max:500'],
            'faqs.*.answer' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_author' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:500'],
            'meta_description' => ['nullable', 'string', 'max:160'],
        ];

        // Saat create: thumbnail wajib upload baru.
        // Saat edit: thumbnail opsional (boleh tidak diganti, pakai yang lama).
        $rules['thumbnail'] = $lockPermalink
            ? ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10048']
            : ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:10048'];

        if (! $lockPermalink) {
            $rules['prefix'] = ['required', 'string', 'max:100', 'regex:/^[a-zA-Z0-9\-\s]+$/'];
            $rules['slug'] = ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\-\s]+$/'];
        }

        return $request->validate($rules);
    }

    /**
     * Jika admin memilih "+ Tambah Kategori Baru...", buat record Category baru
     * (atau pakai yang sudah ada jika slug-nya sama), lalu kembalikan slug-nya.
     * Jika bukan, kembalikan value yang dipilih dari dropdown apa adanya (sudah berupa slug).
     */
    private function resolveCategory(array $validated): string
    {
        if ($validated['category'] !== 'new') {
            return $validated['category'];
        }

        $name = trim($validated['new_category']);
        $slug = Str::slug($name);

        $category = Category::firstOrCreate(
            ['slug' => $slug],
            ['name' => $name]
        );

        return $category->slug;
    }

    /**
     * Ambil FAQ dari input repeater, buang item kosong, return null jika tidak ada.
     */
    private function parseFaqs(Request $request): ?array
    {
        $faqs = collect($request->input('faqs', []))
            ->map(fn ($faq) => [
                'question' => trim($faq['question'] ?? ''),
                'answer' => trim($faq['answer'] ?? ''),
            ])
            ->filter(fn ($faq) => $faq['question'] !== '')
            ->values()
            ->all();

        return $faqs === [] ? null : $faqs;
    }

    /**
     * Tambahkan suffix angka jika slug auto-generate sudah dipakai pada prefix yang sama.
     */
    private function generateUniqueSlug(string $slug, string $prefix): string
    {
        $candidate = $slug;
        $counter = 2;

        while (Article::where('prefix', $prefix)->where('slug', $candidate)->exists()) {
            $candidate = $slug.'-'.$counter;
            $counter++;
        }

        return $candidate;
    }
}