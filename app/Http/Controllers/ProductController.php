<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Mengambil harga produk secara dinamis berdasarkan isi keranjang customer.
     */
    public function getPrices(Request $request)
    {
        // 1. Ambil data keranjang yang dikirim oleh JavaScript
        $cartItems = $request->input('items', []);

        if (empty($cartItems)) {
            return response()->json([]);
        }

        // 2. Kumpulkan semua nama produk untuk kueri yang lebih cepat (Whitelisting)
        $productNames = array_column($cartItems, 'name');

        // 3. Ambil data harga yang cocok dari tabel products
        $dbProducts = DB::table('products')
            ->whereIn('name', $productNames)
            ->get(['name', 'variant', 'price']);

        // 4. Kembalikan data harga dalam bentuk JSON bersih ke frontend
        return response()->json($dbProducts);
    }
}