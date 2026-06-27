@extends('admin.layouts.dashboard')

@section('title', 'Edit Artikel')

@section('content')
<!-- Core Themes Quill.js Rich Text Editor -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<div class="max-w-4xl mx-auto space-y-6">
  
  <!-- Tombol Kembali & Judul -->
  <div>
    <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-gray-400 hover:text-brand-dark transition-colors mb-3">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
      Kembali ke Manajemen Artikel
    </a>
    <h1 class="text-2xl font-black text-brand-dark tracking-tight">Edit Artikel</h1>
    <p class="text-sm text-gray-500 font-medium">Perbarui informasi, judul, atau isi materi artikel Anda.</p>
  </div>

  <!-- Tampilkan Error Validasi Jika Ada -->
  @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-semibold space-y-1">
      <p class="font-bold">Mohon perbaiki kesalahan berikut:</p>
      <ul class="list-disc pl-5 font-normal text-xs">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('articles.update', $article->id) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="bg-white p-6 lg:p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6" 
      id="articleForm">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Input Judul -->
      <div class="md:col-span-2">
        <label for="title" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Judul Artikel</label>
        <input 
          type="text" name="title" id="title" required value="{{ old('title', $article->title) }}"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm transition-all"
        />
      </div>

      <!-- Pilihan Kategori -->
      <div>
        <label for="category" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
        <select 
          name="category" id="category" required
          class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm bg-white transition-all"
        >
          <option value="edukasi-k3" {{ old('category', $article->category) == 'edukasi-k3' ? 'selected' : '' }}>Ekedukasi K3</option>
          <option value="proyek" {{ old('category', $article->category) == 'proyek' ? 'selected' : '' }}>Proyek</option>
          <option value="instalasi" {{ old('category', $article->category) == 'instalasi' ? 'selected' : '' }}>Instalasi</option>
        </select>
      </div>

    </div>

    <!-- Input Ringkasan -->
    <div>
      <label for="excerpt" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Ringkasan Pendek</label>
      <textarea 
        name="excerpt" id="excerpt" rows="3" required max="500"
        class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm transition-all resize-none"
      >{{ old('excerpt', $article->excerpt) }}</textarea>
    </div>

    <!-- Preview & Upload Gambar Thumbnail -->
    <div>
      <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Gambar Sampul / Thumbnail saat ini</label>
      <div class="w-40 h-24 rounded-xl overflow-hidden mb-3 border border-gray-200 bg-gray-50 shrink-0">
        <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=200&q=80'">
      </div>
      <input 
        type="file" name="thumbnail" id="thumbnail" accept="image/*"
        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-light file:text-brand-dark hover:file:bg-blue-200 transition-all"
      />
      <p class="text-[11px] text-gray-400 mt-1.5 font-normal">*Biarkan kosong jika Anda tidak ingin mengganti gambar artikel utama.</p>
    </div>

    <!-- Input Isi Konten (Quill.js) -->
    <div>
      <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Isi Konten Utama Artikel</label>
      <div id="editor" class="h-80 rounded-b-xl border border-gray-300 bg-gray-50/20 text-sm">
        {!! old('body', $article->body) !!}
      </div>
      <input type="hidden" name="body" id="body-content">
    </div>

    <!-- Tombol Aksi -->
    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
      <a href="{{ route('articles.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-xl transition-colors">
        Batal
      </a>
      <button type="submit" class="px-6 py-2.5 bg-brand-dark hover:bg-blue-900 text-white text-sm font-bold rounded-xl transition-colors shadow-md shadow-brand-dark/10">
        Simpan Perubahan
      </button>
    </div>

  </form>

</div>

<!-- Memuat Skrip Pustaka Quill.js -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
  const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['blockquote', 'code-block'],
        ['clean']
      ]
    }
  });

  const form = document.getElementById('articleForm');
  form.addEventListener('submit', function() {
    const bodyContent = quill.getSemanticHTML();
    document.getElementById('body-content').value = bodyContent;
  });
</script>
@endsection