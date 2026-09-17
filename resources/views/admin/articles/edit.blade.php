@extends('admin.layouts.dashboard')

@section('title', 'Edit Artikel')

@section('content')

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

      <!-- Pilihan Kategori (DINAMIS) -->
      <div>
        <label for="category" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
        <select 
          name="category" id="category" required
          class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm bg-white transition-all"
        >
          <option value="" disabled>Pilih Kategori</option>
          
          <!-- Loop Kategori dari Database -->
          @foreach($categories as $cat)
            <option value="{{ $cat->slug }}" {{ old('category', $article->category) == $cat->slug ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach

          <!-- Opsi Tambah Kategori Baru -->
          <option value="new" class="font-bold text-blue-600">+ Tambah Kategori Baru...</option>
        </select>
      </div>

    </div>

    <!-- Input Kategori Baru (Muncul Hanya Jika Opsi "new" Dipilih) -->
    <div id="newCategoryWrapper" class="hidden animate-fade-in">
      <label for="new_category" class="block text-xs font-bold text-blue-600 uppercase tracking-wider mb-2">Nama Kategori Baru</label>
      <input 
        type="text" name="new_category" id="new_category" value="{{ old('new_category') }}"
        class="w-full px-4 py-3 rounded-xl border border-blue-300 bg-blue-50/30 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600 text-sm transition-all"
        placeholder="Ketikkan nama kategori baru..."
      />
    </div>

    <!-- Pengaturan Permalink URL (READ-ONLY / TERKUNCI setelah publish) -->
    <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 space-y-4">
      <div>
        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
          Permalink URL (Terkunci)
        </p>
        <p class="text-xs text-gray-400 mt-1">
          Prefix dan slug tidak bisa diubah lagi setelah artikel diterbitkan, untuk menjaga URL tetap valid (mencegah broken link / duplikat SEO).
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
            Prefix / Sub-Folder URL
          </label>
          <input
            type="text" value="{{ $article->prefix }}" disabled readonly
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-100 text-gray-500 font-medium text-sm cursor-not-allowed"
          />
        </div>

        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
            Slug SEO
          </label>
          <input
            type="text" value="{{ $article->slug }}" disabled readonly
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-100 text-gray-500 font-medium text-sm cursor-not-allowed"
          />
        </div>
      </div>

      <p class="text-[11px] text-gray-400">
        URL saat ini: <span class="font-mono text-gray-500">/{{ $article->prefix }}/{{ $article->slug }}</span>
      </p>
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

    <!-- Input Isi Konten (CKEditor 5: mendukung gambar & tabel) -->
    <div>
      <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Isi Konten Utama Artikel</label>
      <textarea name="body" id="editor" rows="15">{!! old('body', $article->body) !!}</textarea>
    </div>

    <!-- Optimasi SEO (Meta Tags) -->
    <div class="pt-6 border-t border-gray-100">
      <div class="mb-4">
        <p class="text-base font-bold text-brand-dark flex items-center gap-2">
          <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/></svg>
          Optimasi SEO (Meta Tags)
        </p>
        <p class="text-xs text-gray-500 mt-1">
          Pengaturan meta tag untuk meningkatkan peringkat artikel di mesin pencari Google. Kosongkan jika ingin menggunakan bawaan sistem.
        </p>
      </div>

      <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="meta_title" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Title</label>
            <input
              type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $article->meta_title) }}" maxlength="255"
              class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all"
              placeholder="Kosongkan jika ingin menyamakan dengan Judul Artikel"
            />
          </div>
          <div>
            <label for="meta_author" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Author</label>
            <input
              type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', $article->meta_author) }}" maxlength="255"
              class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all"
            />
          </div>
        </div>

        <div>
          <label for="meta_keywords" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Keywords</label>
          <input
            type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $article->meta_keywords) }}" maxlength="500"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all"
            placeholder="Pisahkan dengan koma. Contoh: Jual Scaffolding, K3 Konstruksi, Tangga Mas"
          />
        </div>

        <div>
          <label for="meta_description" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Description</label>
          <textarea
            name="meta_description" id="meta_description" rows="3" maxlength="160"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all resize-none"
            placeholder="Ringkasan singkat 150-160 karakter untuk hasil pencarian Google..."
          >{{ old('meta_description', $article->meta_description) }}</textarea>
        </div>
      </div>
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

<!-- Memuat Skrip Pustaka CKEditor 5 (Classic Build: sudah termasuk fitur Tabel & Upload Gambar) -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>
  // 1. Inisialisasi CKEditor 5
  let editorInstance = null;

  ClassicEditor
    .create(document.querySelector('#editor'), {
      ckfinder: {
        uploadUrl: '{{ route('articles.upload-image') }}?_token={{ csrf_token() }}'
      },
      table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
      }
    })
    .then(editor => {
      editorInstance = editor;
    })
    .catch(error => {
      console.error('Gagal memuat editor:', error);
    });

  // 2. Logika Sembunyikan/Tampilkan Input Kategori Baru
  const categorySelect = document.getElementById('category');
  const newCatWrapper = document.getElementById('newCategoryWrapper');
  const newCatInput = document.getElementById('new_category');

  function checkCategoryOption() {
    if (categorySelect.value === 'new') {
      newCatWrapper.classList.remove('hidden');
      newCatInput.required = true;
    } else {
      newCatWrapper.classList.add('hidden');
      newCatInput.required = false;
    }
  }

  categorySelect.addEventListener('change', checkCategoryOption);
  checkCategoryOption();

  // 3. Sinkronisasi Data Editor ke Textarea Sebelum Form Dikirim
  const form = document.getElementById('articleForm');
  form.addEventListener('submit', function () {
    if (editorInstance) {
      document.getElementById('editor').value = editorInstance.getData();
    }
  });
</script>
@endsection