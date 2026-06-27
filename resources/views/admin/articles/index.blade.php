@extends('admin.layouts.dashboard')

@section('title', 'Kelola Artikel')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
  
  <!-- Header Atas Tabel -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-brand-dark tracking-tight">Manajemen Artikel</h1>
      <p class="text-sm text-gray-500 font-medium">Tambah, perbarui, atau hapus konten artikel Ringlock Indonesia.</p>
    </div>
    <!-- Tombol Tambah Artikel Baru -->
    <a href="{{ route('articles.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-brand-dark hover:bg-blue-900 text-white text-sm font-bold rounded-xl transition-colors duration-200 shadow-md shadow-brand-dark/10 shrink-0">
      + Tambah Artikel Baru
    </a>
  </div>

  <!-- Notifikasi Sukses Jika Berhasil Tambah/Edit/Hapus -->
  @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl text-sm font-semibold flex items-center gap-2">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  <!-- PANEL TABEL DATA ARTIKEL -->
  <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50/70 border-b border-gray-200">
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-20 text-center">Gambar</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Judul Konten</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-40">Kategori</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-44">Tanggal Rilis</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-36 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 font-medium text-sm text-gray-700">
          @forelse($articles as $article)
            <tr class="hover:bg-gray-50/40 transition-colors">
              <!-- Thumbnail Mini -->
              <td class="px-6 py-4 text-center">
                <div class="w-14 h-10 rounded-lg overflow-hidden bg-gray-100 mx-auto border border-gray-200 shrink-0">
                  <img 
                    src="{{ asset('storage/' . $article->thumbnail) }}" 
                    alt="Cover" 
                    class="w-full h-full object-cover"
                    onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=150&q=80&auto=format&fit=crop'"
                  >
                </div>
              </td>
              <!-- Judul Artikel -->
              <td class="px-6 py-4">
                <div class="font-extrabold text-brand-dark max-w-md line-clamp-1">{{ $article->title }}</div>
                <div class="text-xs text-gray-400 mt-0.5 font-normal">slug: {{ $article->slug }}</div>
              </td>
              <!-- Kategori -->
              <td class="px-6 py-4 capitalize">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $article->category == 'edukasi-k3' ? 'bg-blue-50 text-blue-700' : ($article->category == 'proyek' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700') }}">
                  {{ str_replace('-', ' ', $article->category) }}
                </span>
              </td>
              <!-- Tanggal Buat -->
              <td class="px-6 py-4 text-gray-500 text-xs font-normal">
                {{ $article->created_at->translatedFormat('d F Y • H:i') }}
              </td>
              <!-- Tombol Aksi (Edit & Delete) -->
              <td class="px-6 py-4 text-center">
                <div class="flex items-center justify-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('articles.edit', $article->id) }}" class="px-3 py-1.5 bg-gray-100 hover:bg-brand-dark hover:text-white rounded-lg text-xs font-bold text-brand-dark transition-colors">
                    Edit
                  </a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-600 hover:text-white rounded-lg text-xs font-bold text-red-600 transition-colors">
                      Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-12 text-center text-gray-400 font-normal">
                Belum ada data artikel di dalam database.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection