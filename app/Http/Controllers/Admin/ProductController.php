<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data produk dari database, urut dari yang terbaru
        $products = \App\Models\Product::latest()->get();
        
        // Mengirim data produk ke file view admin.products.index
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
    {
        // 1. Validasi data yang diinput user agar aman
        $request->validate([
            'name' => 'required|string|max|255',
            'category' => 'required|string',
            'description' => 'required',
            'stock_status' => 'required|in:available,out_of_stock,pre_order',
        ]);

        // 2. Membuat Slug otomatis dari nama produk untuk URL (contoh: "Ledger 1.2m" jadi "ledger-12m")
        $slug = \Illuminate\Support\Str::slug($request->name) . '-' . time();

        // 3. Proses upload gambar jika ada admin memasukkan foto produk
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Disimpan ke folder public/products
            $file->move(public_path('products'), $fileName);
            $imagePath = 'products/' . $fileName;
        }

        // 4. Simpan seluruh data ke tabel database products
        \App\Models\Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'category' => $request->category,
            'size' => $request->size,
            'description' => $request->description,
            'specifications' => $request->specifications,
            'image' => $imagePath,
            'stock_status' => $request->stock_status,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        // 5. Kembali ke halaman utama daftar produk dengan pesan sukses kuning/hijau
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
