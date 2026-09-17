@extends('admin.layouts.dashboard')

@section('title', 'Tambah Artikel Baru')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
  
  <!-- Tombol Kembali & Judul -->
  <div>
    <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-gray-400 hover:text-brand-dark transition-colors mb-3">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
      Kembali ke Manajemen Artikel
    </a>
    <h1 class="text-2xl font-black text-brand-dark tracking-tight">Tulis Artikel Baru</h1>
    <p class="text-sm text-gray-500 font-medium">Buat pengumuman, panduan K3, atau berita proyek terbaru.</p>
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

  <!-- FORMULIR INPUT -->
  <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 lg:p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6" id="articleForm">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Input Judul Artikel -->
      <div class="md:col-span-2">
        <label for="title" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Judul Artikel</label>
        <input 
          type="text" name="title" id="title" required value="{{ old('title') }}"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm transition-all"
          placeholder="Contoh: Protokol K3 Pemasangan Ringlock Scaffolding"
        />
      </div>

      <!-- Pilihan Kategori (DINAMIS) -->
      <div>
        <label for="category" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
        <select 
          name="category" id="category" required
          class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm bg-white transition-all"
        >
          <option value="" disabled selected>Pilih Kategori</option>
          
          <!-- Loop Kategori dari Database -->
          @foreach($categories as $cat)
            <option value="{{ $cat->slug }}" {{ old('category') == $cat->slug ? 'selected' : '' }}>
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
        placeholder="Ketikkan nama kategori baru (misal: Sertifikasi K3)"
      />
    </div>

    <!-- Pengaturan Kustom Permalink URL -->
    <div class="rounded-2xl border border-emerald-200 bg-emerald-50/60 p-6 space-y-4">
      <div>
        <p class="text-xs font-bold text-emerald-700 uppercase tracking-wider flex items-center gap-2">
          🔗 Pengaturan Kustom Permalink URL
        </p>
        <p class="text-xs text-gray-500 mt-1">
          Atur lokasi sub-folder dan slug URL artikel. Jika slug dikosongkan, sistem membuat otomatis dari judul.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="prefix" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">
            Prefix / Sub-Folder URL <span class="text-red-500">*</span>
          </label>
          <input
            type="text" name="prefix" id="prefix" required
            value="{{ old('prefix', 'jualscaffolding') }}"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500"
            placeholder="jualscaffolding"
          />
          <p class="text-[11px] text-gray-400 mt-1">
            *Contoh: jual-scaffolding, scaffolding-murah, info-scaffolding, tips-k3, berita, edukasi
          </p>
        </div>

        <div>
          <label for="slug" class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">
            Slug SEO Kustom <span class="text-gray-400 font-normal normal-case">(Opsional)</span>
          </label>
          <input
            type="text" name="slug" id="slug"
            value="{{ old('slug') }}"
            class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500"
            placeholder="produsen-scaffolding-terpercaya-jakarta"
          />
          <p class="text-[11px] text-gray-400 mt-1">
            *Kosongkan jika ingin generate otomatis dari Judul Artikel
          </p>
        </div>
      </div>
    </div>

    <!-- Input Ringkasan (Excerpt) -->
    <div>
      <label for="excerpt" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Ringkasan Pendek (Muncul di Halaman Depan)</label>
      <textarea 
        name="excerpt" id="excerpt" rows="3" required max="500"
        class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm transition-all resize-none"
        placeholder="Tulis sinopsis atau paragraf pembuka artikel secara singkat di sini..."
      >{{ old('excerpt') }}</textarea>
    </div>

    <!-- Upload Gambar Thumbnail -->
    <div>
      <label for="thumbnail" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Gambar Sampul / Thumbnail (Maks. 2MB)</label>
      <input 
        type="file" name="thumbnail" id="thumbnail" required accept="image/*"
        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-light file:text-brand-dark hover:file:bg-blue-200 file:cursor-pointer transition-all"
      />
    </div>

    <!-- Input Isi Konten Utama (CKEditor 5: mendukung gambar & tabel) -->
    <div>
      <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Isi Konten Utama Artikel</label>
      <textarea name="body" id="editor" rows="15">{!! old('body') !!}</textarea>
    </div>

    <!-- FAQ Pertanyaan Sering Diajukan -->
    <div class="pt-6 border-t border-gray-100">
      <div class="flex items-center justify-between gap-4 mb-4">
        <div>
          <p class="text-base font-bold text-brand-dark flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            FAQ Pertanyaan Sering Diajukan
          </p>
          <p class="text-xs text-gray-500 mt-1">Pertanyaan umum mengenai isi artikel ini (akan tampil di bagian bawah artikel).</p>
        </div>
        <button type="button" id="addFaqBtn" class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 text-xs font-bold hover:bg-emerald-100 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
          Tambah Pertanyaan
        </button>
      </div>

      <div id="faqList" class="space-y-4">
        @foreach(old('faqs', []) as $i => $faq)
          <div class="faq-item rounded-xl border border-gray-200 bg-gray-50 p-4 space-y-3 relative">
            <button type="button" class="remove-faq absolute top-3 right-3 text-gray-400 hover:text-red-500" aria-label="Hapus pertanyaan">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div>
              <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">Pertanyaan</label>
              <input type="text" name="faqs[{{ $i }}][question]" value="{{ $faq['question'] ?? '' }}"
                class="w-full px-3 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark"
                placeholder="Contoh: Berapa lama masa sewa minimum scaffolding?" />
            </div>
            <div>
              <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">Jawaban</label>
              <textarea name="faqs[{{ $i }}][answer]" rows="2"
                class="w-full px-3 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark resize-none"
                placeholder="Tulis jawaban singkat dan jelas...">{{ $faq['answer'] ?? '' }}</textarea>
            </div>
          </div>
        @endforeach
      </div>
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
              type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" maxlength="255"
              class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all"
              placeholder="Kosongkan jika ingin menyamakan dengan Judul Artikel"
            />
          </div>
          <div>
            <label for="meta_author" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Author</label>
            <input
              type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', 'Ringlock Indonesia') }}" maxlength="255"
              class="w-full px-4 py-3 rounded-xl border border-gray-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark transition-all"
            />
          </div>
        </div>

        <div>
          <label for="meta_keywords" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Meta Keywords</label>
          <input
            type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}" maxlength="500"
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
          >{{ old('meta_description') }}</textarea>
        </div>
      </div>
    </div>

    <!-- Tombol Submit -->
    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
      <a href="{{ route('articles.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-xl transition-colors">
        Batal
      </a>
      <button type="submit" class="px-6 py-2.5 bg-brand-dark hover:bg-blue-900 text-white text-sm font-bold rounded-xl transition-colors shadow-md shadow-brand-dark/10">
        Terbitkan Artikel
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
      // Arahkan upload gambar ke endpoint uploadImage() di ArticleController.
      // ?_token=... dibutuhkan karena adapter bawaan CKFinder tidak mengirim header CSRF,
      // jadi token dikirim lewat query string (Laravel tetap membacanya untuk validasi CSRF).
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
  // 4. Repeater FAQ: tambah & hapus pertanyaan secara dinamis
  let faqIndex = {{ count(old('faqs', [])) }};
  const faqList = document.getElementById('faqList');
  const addFaqBtn = document.getElementById('addFaqBtn');

  function createFaqItem() {
    const div = document.createElement('div');
    div.className = 'faq-item rounded-xl border border-gray-200 bg-gray-50 p-4 space-y-3 relative';
    div.innerHTML = `
      <button type="button" class="remove-faq absolute top-3 right-3 text-gray-400 hover:text-red-500" aria-label="Hapus pertanyaan">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
      <div>
        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">Pertanyaan</label>
        <input type="text" name="faqs[${faqIndex}][question]"
          class="w-full px-3 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark"
          placeholder="Contoh: Berapa lama masa sewa minimum scaffolding?" />
      </div>
      <div>
        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">Jawaban</label>
        <textarea name="faqs[${faqIndex}][answer]" rows="2"
          class="w-full px-3 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark resize-none"
          placeholder="Tulis jawaban singkat dan jelas..."></textarea>
      </div>
    `;
    faqIndex++;
    return div;
  }

  addFaqBtn.addEventListener('click', function () {
    faqList.appendChild(createFaqItem());
  });

  faqList.addEventListener('click', function (e) {
    const btn = e.target.closest('.remove-faq');
    if (btn) {
      btn.closest('.faq-item').remove();
    }
  });
</script>
@endsection