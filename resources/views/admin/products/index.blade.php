@extends('admin.layouts.dashboard')

@section('title', 'Kelola Harga Produk')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
  
  <!-- Header Atas Tabel -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-brand-dark tracking-tight">Manajemen Harga Produk</h1>
      <p class="text-sm text-gray-500 font-medium">Sesuaikan nilai rupiah varian komponen scaffolding Ringlock secara real-time.</p>
    </div>
  </div>

  <!-- Notifikasi Sukses Jika Berhasil Mengubah Harga -->
  @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl text-sm font-semibold flex items-center gap-2">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  <!-- PANEL TABEL DATA HARGA PRODUK -->
  <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50/70 border-b border-gray-200">
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-20 text-center">No</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Komponen Scaffolding</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-48">Ukuran / Varian</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-52 text-right">Harga Sekarang</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-36 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 font-medium text-sm text-gray-700">
          @forelse($products as $index => $product)
            <tr class="hover:bg-gray-50/40 transition-colors">
              <!-- Nomor Urut -->
              <td class="px-6 py-4 text-center font-bold text-gray-400 w-20">
                {{ $index + 1 }}
              </td>
              
              <!-- Nama Komponen -->
              <td class="px-6 py-4">
                <div class="font-extrabold text-brand-dark max-w-md line-clamp-1">{{ $product->name }}</div>
              </td>
              
              <!-- Ukuran / Varian -->
              <td class="px-6 py-4">
                @if($product->variant)
                  <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                    {{ $product->variant }}
                  </span>
                @else
                  <span class="text-xs text-gray-400 font-normal italic">Tanpa Varian</span>
                @endif
              </td>
              
              <!-- Harga Sekarang -->
              <td class="px-6 py-4 text-right font-black text-brand-dark">
                Rp {{ number_format($product->price, 0, ',', '.') }}
              </td>
              
              <!-- Tombol Aksi Pemicu Modal -->
              <td class="px-6 py-4 text-center">
                <button 
                  type="button" 
                  class="px-3 py-1.5 bg-gray-100 hover:bg-brand-dark hover:text-white rounded-lg text-xs font-bold text-brand-dark transition-colors cursor-pointer"
                  onclick="openEditModal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->variant ?: 'Tanpa Varian' }}', '{{ $product->price }}')">
                  Edit Harga
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-12 text-center text-gray-400 font-normal">
                Belum ada data produk di dalam database. Silakan jalankan seeder.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- ==============================================
     MODAL POPUP EDIT HARGA (SERASI DENGAN TEMA)
     ============================================== -->
<div id="edit-modal-backdrop" class="fixed inset-0 bg-gray-900/40 backdrop-blur-xs hidden transition-opacity duration-200 z-40" onclick="closeEditModal()"></div>

<div id="edit-modal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-200 hidden transition-all duration-200 z-50">
    <!-- Modal Header -->
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ubah Nilai Produk</p>
            <h3 id="modal-product-name" class="font-black text-brand-dark text-base leading-tight mt-0.5">Nama Komponen</h3>
        </div>
        <button type="button" class="w-7 h-7 bg-gray-100 hover:bg-gray-200 text-gray-500 rounded-full flex items-center justify-center transition-colors cursor-pointer" onclick="closeEditModal()">
            ✕
        </button>
    </div>

    <!-- Form Pembaruan Harga -->
    <form id="edit-product-form" method="POST" action="">
        @csrf
        <div class="p-6">
            <!-- Info Varian Aktif -->
            <div class="mb-4 bg-gray-50 border border-gray-100 rounded-xl px-4 py-2.5 flex items-center justify-between text-xs font-medium">
                <span class="text-gray-500">Ukuran Terpilih:</span>
                <span id="modal-product-variant" class="font-bold text-brand-dark bg-white px-2 py-0.5 rounded-md border border-gray-200">Standard</span>
            </div>

            <!-- Input Nominal Rupiah -->
            <div class="mb-1">
                <label for="input-price" class="block text-xs font-bold text-gray-400 uppercase tracking-wide mb-1.5">Nominal Harga Baru (Rp)</label>
                <div class="relative rounded-xl shadow-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 font-extrabold text-xs">
                        Rp
                    </div>
                    <input 
                        type="number" 
                        name="price" 
                        id="input-price" 
                        required
                        min="0"
                        class="block w-full pl-10 pr-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-extrabold text-brand-dark focus:outline-none focus:border-brand-dark transition-all"
                        placeholder="0">
                </div>
            </div>
        </div>

        <!-- Tombol Konfirmasi Bawah -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-2 rounded-b-2xl">
            <button type="button" class="px-4 py-2 text-xs font-bold text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-xl transition-colors cursor-pointer" onclick="closeEditModal()">
                Batal
            </button>
            <button type="submit" class="px-4 py-2 text-xs font-bold text-white bg-brand-dark hover:bg-blue-900 rounded-xl shadow-md shadow-brand-dark/10 transition-colors cursor-pointer">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<!-- Script Logika Modal Box -->
<script>
    const backdrop = document.getElementById('edit-modal-backdrop');
    const modal = document.getElementById('edit-modal');
    const form = document.getElementById('edit-product-form');
    const labelName = document.getElementById('modal-product-name');
    const labelVariant = document.getElementById('modal-product-variant');
    const inputPrice = document.getElementById('input-price');

    function openEditModal(id, name, variant, currentPrice) {
        labelName.textContent = name;
        labelVariant.textContent = variant;
        inputPrice.value = currentPrice;

        // Set form agar mengarah ke route update produk admin
        form.action = `/admin/products/update/${id}`;

        backdrop.classList.remove('hidden');
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        backdrop.classList.add('hidden');
        modal.classList.add('hidden');
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeEditModal();
    });
</script>
@endsection