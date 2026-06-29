@extends('admin.layouts.dashboard')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-700 text-3xl font-medium">Daftar Produk Scaffolding</h3>
        <!-- Tombol Tambah Produk -->
        <a href="{{ route('products.create') }}" class="bg-[#F8B90F] hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-200">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Tabel Daftar Produk -->
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nama Produk</th>
                    <th class="py-3 px-6 text-left">SKU</th>
                    <th class="py-3 px-6 text-center">Kategori</th>
                    <th class="py-3 px-6 text-center">Ukuran</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-medium">
                            {{ $product->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-mono">{{ $product->sku }}</span>
                        </td>
                        <td class="py-3 px-6 text-center capitalize">
                            {{ $product->category }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $product->size ?? '-' }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if($product->stock_status == 'available')
                                <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Tersedia</span>
                            @elseif($product->stock_status == 'pre_order')
                                <span class="bg-yellow-200 text-yellow-800 py-1 px-3 rounded-full text-xs">PO</span>
                            @else
                                <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-xs">Habis</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                                <span class="text-gray-300">|</span>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 px-6 text-center text-gray-500 italic">
                            Belum ada data produk. Silakan tambah produk baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection