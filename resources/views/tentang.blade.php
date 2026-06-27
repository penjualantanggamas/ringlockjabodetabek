<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ringlock Indonesia Pusat Scaffolding Terbesar Se-Jabodetabek</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="./assets/logo.png"/>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Custom Config: warna brand & font -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-dark':  'rgb(0, 35, 111)',   /* #00236F — Ubah di sini untuk ganti warna utama */
            'brand-light': 'rgb(229, 238, 255)', /* #E5EEFF — Warna latar muda */
            'brand-bg':    'rgb(248, 249, 255)', /* #F8F9FF — Warna background section */
          },
          fontFamily: {
            'sans': ['"Hanken Grotesk"', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <!-- Custom CSS (animasi, efek hover, background image quote, dll) -->
  <link rel="stylesheet" href="style.css" />
</head>
<body class="font-sans bg-white text-gray-800">


<!-- =============================================
     NAVBAR
     ============================================= -->
<header id="navbar" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-[68px]">

      <!-- Logo -->
      <a href="#" class="flex items-center gap-2 shrink-0">
        <img src="./assets/logoringlock(blue).png" alt="Logo Web" class="w-auto h-12 object-contain">
      </a>

      <!-- Desktop Nav Links -->
      <nav class="hidden md:flex items-center gap-7">
        <a href="{{ url('/') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Beranda</a>
        <a href="{{ url('/tentang') }}" class="nav-link text-[14px] font-semibold text-brand-dark transition-colors border-b-2 border-brand-dark pb-0.5">Tentang Kami</a>
        <a href="{{ url('/produk') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Produk</a>
        <a href="{{ url('/artikel') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Artikel</a>
      </nav>

      <!-- Desktop CTA -->
      <a href="#contact" class="hidden md:inline-flex items-center gap-1.5 bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">
        Minta Penawaran
      </a>

      <!-- Hamburger (Mobile) -->
      <button id="hamburger" aria-label="Toggle menu" class="md:hidden flex flex-col justify-center items-center w-9 h-9 gap-[5px]">
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-5 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-100 px-5">
    <nav class="flex flex-col py-4 gap-1">
      <a href="index.html"  class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Beranda</a>
      <a href="index.html#about" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Tentang Kami</a>
      <a href="produk.html" class="class="mt-3 inline-flex justify-center bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200">Produk</a>
      <a href="index.html#projects" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Kontak</a>
      <a href="artikel.html"  class="font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Minta Penawaran</a>
    </nav>
  </div>
</header>

<!-- =========================================================================
     1. HERO SECTION HALAMAN TENTANG KAMI
     ========================================================================= -->
<section class="relative bg-[rgb(0,35,111)] text-white py-20 lg:py-28 overflow-hidden">
  <!-- Efek Dekoratif Latar Belakang -->
  <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
  <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500 rounded-full blur-3xl opacity-20"></div>

  <div class="max-w-7xl mx-auto px-5 lg:px-8 relative z-10 text-center">
    <span class="inline-block bg-white/10 text-blue-200 text-[11px] font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4">
      Mengenal Lebih Dekat
    </span>
    <h1 class="text-3xl sm:text-5xl font-black tracking-tight max-w-3xl mx-auto leading-tight">
      Supplier Scaffolding Ringlock Terpercaya di Jabodetabek
    </h1>
    <p class="text-blue-100/80 text-[15px] sm:text-base max-w-2xl mx-auto mt-6 leading-relaxed">
      Ringlock Indonesia Merupakan supplier Sekaligus Produsen scaffolding ringlock terkemuka yang melayani kebutuhan proyek konstruksi skala kecil hingga besar di seluruh wilayah Jabodetabek. Dengan pengalaman lebih dari 10 tahun, kami menjadi mitra terpercaya bagi kontraktor, developer, dan kontraktor jasa di Jakarta, Tangerang, Depok, Bekasi, dan Bogor.
    </p>
  </div>
</section>


<!-- =========================================================================
     2. SECTION KILAS SEJARAH & VISI (PENGEMBANGAN)
     ========================================================================= -->
<section class="bg-white py-16 lg:py-24">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
      
      <!-- Kolom Kiri: Visual Interaktif (Diadaptasi dari Beranda) -->
      <div class="relative">
        <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-[4/3]">
          <img
            src="assets/orangkantor.svg"
            alt="Tim profesional Ringlock Indonesia"
            class="w-full h-full object-cover"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>

        <!-- Floating Badge Komitmen dengan warna kustom #F8B90F -->
        <div class="absolute -bottom-5 right-6 lg:-right-5 bg-brand-dark text-white rounded-2xl px-6 py-5 shadow-2xl min-w-[220px]">
          <div class="text-4xl font-extrabold leading-none">10th</div>
          <div class="text-xs font-bold text-white/80 mt-1.5 leading-tight">Pengalaman Industri</div>
          <div class="text-[11px] text-white/70 mt-1">Konsisten mendukung pembangunan di Jabodetabek dan sekitarnya.</div>
        </div>
      </div>

      <!-- Kolom Kanan: Narasi Kedalaman Perusahaan -->
      <div class="space-y-6">
        <div class="w-12 h-1 bg-[#F8B90F]"></div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[rgb(0,35,111)] tracking-tight">
          Tentang Ringlock Indonesia — Lebih dari Sekadar Supplier & Produsen Scaffolding
        </h2>
        <p class="text-gray-600 text-[15px] leading-relaxed">
          Kami bukan sekadar penjual alat scaffolding. Ringlock Indonesia hadir sebagai mitra kerja yang memahami kebutuhan teknis di lapangan. Mulai dari perencanaan kebutuhan material hingga pengiriman tepat waktu ke lokasi proyek Anda, kami siap mendukung setiap tahap pembangunan Anda.
        </p>
        <p class="text-gray-600 text-[15px] leading-relaxed">
          Dinamika konstruksi di Jakarta dan kota-kota penyangga bergerak cepat. Oleh karena itu, efisiensi alat, ketersediaan stok, dan kepatuhan standar keselamatan kerja (K3) menjadi hal yang tidak bisa dikompromikan — dan itulah yang kami junjung tinggi dalam setiap transaksi.
        </p>
        
        <!-- Blok Visi Singkat -->
        <div class="p-5 bg-[rgb(229,238,255)]/30 rounded-xl border-l-4 border-[rgb(0,35,111)]">
          <h4 class="font-bold text-[rgb(0,35,111)] text-sm mb-1">Visi Utama Kami</h4>
          <p class="text-xs text-gray-600 leading-relaxed">Menjadi kiblat utama penyediaan solusi perancah modular ringlock yang mengawinkan ketahanan material fisik tertinggi dengan zero-accident di area kerja konstruksi.</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- =========================================================================
     3. SECTION PILAR UTAMA & NILAI UNGGULAN (K3)
     ========================================================================= -->
<section class="bg-gray-50 py-16 lg:py-24 border-t border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    
    <div class="text-center max-w-2xl mx-auto mb-16">
      <span class="text-[#F8B90F] text-xs font-bold uppercase tracking-wider">Mengapa Memilih Kami</span>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-[rgb(0,35,111)] mt-2 tracking-tight">Tiga Pilar Standar Kerja Ringlock Indonesia</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- Pilar 1: Hot Dip Galvanized -->
      <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-4">
        <div class="w-12 h-12 bg-[rgb(229,238,255)] rounded-xl flex items-center justify-center text-[rgb(0,35,111)]">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 class="font-extrabold text-[rgb(0,35,111)] text-base">Material Hot Dip Galvanized</h3>
        <p class="text-gray-500 text-xs leading-relaxed font-medium">
          Seluruh pipa perancah kami dilapisi dengan sistem galvanisasi celup panas besi cor kokoh, memastikan komponen tahan terhadap korosi ekstrem di berbagai cuaca buruk proyek terbuka.
        </p>
      </div>

      <!-- Pilar 2: Prioritas Utama K3 -->
      <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-4">
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <h3 class="font-extrabold text-[rgb(0,35,111)] text-base">Keamanan Standar K3</h3>
        <p class="text-gray-500 text-xs leading-relaxed font-medium">
          Setiap sambungan ring dan ledger didesain presisi mengacu pada standar regulasi Keselamatan dan Kesehatan Kerja (K3) konstruksi sipil demi keselamatan para pekerja di ketinggian.
        </p>
      </div>

      <!-- Pilar 3: Distribusi Tangkas -->
      <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-4">
        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="font-extrabold text-[rgb(0,35,111)] text-base">Ready Stock Se-Jabodetabek</h3>
        <p class="text-gray-500 text-xs leading-relaxed font-medium">
          Gudang pusat logistik kami yang strategis menjamin ketersediaan stok ratusan ribu unit siap kirim armada truk demi menjaga ketepatan waktu proyek konstruksi Anda.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- =========================================================================
     4. SECTION STATEMENT PENCAPAIAN ANGKA
     ========================================================================= -->
<section class="bg-[rgb(0,35,111)] text-white py-16">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-center">
      <div>
        <div class="text-3xl sm:text-4xl font-black text-white">100+</div>
        <div class="text-xs text-blue-200 mt-1 font-medium">Mitra Kontraktor Percaya</div>
      </div>
      <div>
        <div class="text-3xl sm:text-4xl font-black text-white">500K+</div>
        <div class="text-xs text-blue-200 mt-1 font-medium">Komponen Terdistribusi</div>
      </div>
      <div>
        <div class="text-3xl sm:text-4xl font-black text-white">100%</div>
        <div class="text-xs text-blue-200 mt-1 font-medium">Lolos Standar Uji Beban</div>
      </div>
    </div>
  </div>
</section>

<!-- =============================================
     CTA / CONTACT STRIP + MAPS
     ============================================= -->
<section id="contact" class="bg-brand-light py-16 lg:py-20">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
      
      <!-- Kolom Kiri: Teks CTA & Tombol Kontak -->
      <div class="text-center lg:text-left">
        <span class="inline-block bg-blue-100 text-blue-700 text-[11px] font-bold tracking-wider uppercase px-3 py-1 rounded-full mb-4">
          Hubungi Kami
        </span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-brand-dark mb-4 tracking-tight leading-tight">
          Siap Mulai Proyek Anda Bersama Kami?
        </h2>
        <p class="text-gray-600 text-[15px] leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
          Dapatkan penawaran harga terbaik dan konsultasikan kebutuhan scaffolding Ringlock Anda langsung dengan tim ahli kami.
        </p>
        <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
          <!-- Tombol WA -->
          <a href="https://wa.me/628123651717?text=halo%20ringlock%20indonesia%20jabodetabek,%20buatkan%20saya%20penawaran%20terbaik" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold text-[14px] px-7 py-3.5 rounded-xl transition-colors duration-200 shadow-md">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Chat WhatsApp
          </a>
          <!-- Tombol Email -->
          <a href="mailto:tanggamasjayamakmur@yahoo.com?subject=Tanya%20Harga%20Ringlock%20Scaffolding" class="inline-flex items-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-semibold text-[14px] px-7 py-3.5 rounded-xl transition-colors duration-200 shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Kirim Email
          </a>
        </div>
      </div>

      <!-- Kolom Kanan: Google Maps Embed (Legok, Tangerang) -->
      <div class="w-full h-[280px] sm:h-[350px] rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.55094188279!2d106.5433806746619!3d-6.322558761867301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3f7ef24f297%3A0xe6a41e7a6394f94a!2sRINGLOCK%20INDONESIA%20-%20Pusat%20Scaffolding%20Jabodetabek!5e0!3m2!1sen!2sid!4v1782111812257!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          class="w-full h-full rounded-2xl border-0"
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          title="Lokasi Kantor Ringlock Indonesia">
        </iframe>
      </div>

    </div>
  </div>
</section>

<!-- =============================================
     FOOTER
     ============================================= -->
<footer class="bg-brand-dark text-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 py-14 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

      <div class="max-w-sm">
        <div class="flex items-center gap-2 mb-5">
          <img 
            src="./assets/logoringlockwihte.svg" 
            alt="Ringlock Indonesia" 
            class="h-10 w-auto object-contain"
          />
        </div>

        <p class="text-blue-100/80 text-[14px] font-semibold leading-snug mb-6">
          Bangun Lebih Aman, Lebih Cepat dengan Ringlock Indonesia.
        </p>

        <ul class="space-y-3">
          <li class="flex items-start gap-3 text-blue-200/70 text-[13px]">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Sudut Jl. Raya Curug No. 01. RT 003, RW 003, Kp. Cakung, Babat, Kec. Legok, Kabupaten Tangerang, Banten 15820
          </li>
          <li class="flex items-center gap-3 text-blue-200/70 text-[13px]">
            <svg class="w-4 h-4 shrink-0 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            0812365 1717
          </li>
          <!-- <li class="flex items-center gap-3 text-blue-200/70 text-[13px]">
            <svg class="w-4 h-4 shrink-0 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            kontak@ringlock.id
          </li> -->
        </ul>
      </div>

      <div class="grid grid-cols-2 gap-8 lg:justify-end">

        <div>
          <h4 class="text-white font-bold text-[13px] tracking-widest uppercase mb-5">Menu Cepat</h4>
          <ul class="space-y-3">
            <li><a href="#hero"     class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Beranda</a></li>
            <li><a href="#about"    class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Tentang Kami</a></li>
            <li><a href="produk.html"  class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Produk Scaffolding</a></li>
            <li><a href="#project" class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Proyek</a></li>
            <li><a href="#contact"  class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Kontak</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-white font-bold text-[13px] tracking-widest uppercase mb-5">Sosial</h4>
          <div class="flex flex-col gap-3">
            <a href="https://www.instagram.com/ringlockindonesia/" aria-label="Instagram" class="flex items-center gap-2.5 text-blue-200/70 hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
              <span class="text-[13px]">Instagram</span>
            </a>
            <a href="#" aria-label="Facebook" class="flex items-center gap-2.5 text-blue-200/70 hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              <span class="text-[13px]">Facebook</span>
            </a>
            <!-- <a href="#" aria-label="LinkedIn" class="flex items-center gap-2.5 text-blue-200/70 hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              <span class="text-[13px]">LinkedIn</span>
            </a>
            <a href="#" aria-label="YouTube" class="flex items-center gap-2.5 text-blue-200/70 hover:text-white transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
              <span class="text-[13px]">YouTube</span>
            </a> -->
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="border-t border-white/10">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-2">
      <a href="https://ringlockindonesia.com" class="text-blue-200/40 hover:text-blue-200/70 text-[11px] transition-colors">Powered by Ringlock Indonesia</a>
      <div class="flex items-center gap-4">
        <a href="https://tanggamasjayamakmur.com" class="text-blue-200/40 hover:text-blue-200/70 text-[11px] transition-colors">Tangga Mas Jaya Makmur</a>
      </div>
    </div>
  </div>
</footer>

<!-- FLOATING FAB: Langsung Link ke WhatsApp dengan Pesan Otomatis -->
<a id="cart-fab"
  href="https://wa.me/628123651717?text=halo%20ringlock%20indonesia%20jabodetabek,%20buatkan%20saya%20penawaran%20terbaik"
  target="_blank"
  rel="noopener"
  class="fixed bottom-6 right-6 z-40 w-14 h-14 bg-green-600 hover:bg-green-900 text-white rounded-full shadow-xl flex items-center justify-center transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-brand-dark/30"
  aria-label="Hubungi WhatsApp Ringlock Indonesia">
  
  <!-- Ikon WhatsApp -->
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>

  <!-- Badge Jumlah Item (Sembunyikan/Hapus baris ini jika fitur keranjang ditiadakan) -->
  <span id="cart-badge"
    class="hidden absolute -top-1 -right-1 min-w-[20px] h-5 px-1 bg-red-500 text-white text-[11px] font-extrabold rounded-full flex items-center justify-center leading-none">
    0
  </span>
</a>

<script src="main.js"></script>
</body>
</html>