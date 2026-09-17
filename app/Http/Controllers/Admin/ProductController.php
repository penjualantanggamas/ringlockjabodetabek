<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Wajib diimpor karena berada di dalam subfolder
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman daftar produk & harga untuk admin
     */
    public function index()
    {
        // Ambil semua data produk dari database, urutkan berdasarkan nama
        $products = DB::table('products')->orderBy('name', 'asc')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Memperbarui harga produk via form dashboard
     */
    public function updatePrice(Request $request, $id)
    {
        // Validasi input harga harus berupa angka bulat dan minimal 0
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        // Update nominal harga di database berdasarkan ID produk
        DB::table('products')->where('id', $id)->update([
            'price' => $request->input('price'),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Harga produk berhasil diperbarui!');
    }
}