@extends('admin.layouts.dashboard')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h3 class="text-gray-700 text-3xl font-medium">Tambah Produk Baru</h3>
    </div>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Produk *</label>
                <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Ringlock Standard Vertical">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Kategori *</label>
                    <select name="category" id="category" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Vertical">Vertical (Standard)</option>
                        <option value="Ledger">Ledger (Horizontal)</option>
                        <option value="Aksesoris">Aksesoris (Jackbase/U-Head)</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="size">Ukuran (Opsional)</label>
                    <input type="text" name="size" id="size" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 2.0m / 1.2m / 0.5m">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="stock_status">Status Stok *</label>
                    <select name="stock_status" id="stock_status" required class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="available">Tersedia (Available)</option>
                        <option value="pre_order">Pre Order (PO)</option>
                        <option value="out_of_stock">Habis (Out of Stock)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Foto Produk</label>
                    <input type="file" name="image" id="image" class="shadow border rounded w-full py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Deskripsi Produk *</label>
                <textarea name="description" id="description" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Tulis deskripsi detail produk perancah..."></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="specifications">Spesifikasi Teknis (Opsional)</label>
                <textarea name="specifications" id="specifications" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: Ketebalan pipa 3.2mm, Finishing Hot Dip Galvanized, Standar K3"></textarea>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" checked class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="is_active" class="ml-2 text-sm text-gray-700 font-medium">Aktifkan produk (Langsung tampil di website katalog utama)</label>
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-[#F8B90F] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection