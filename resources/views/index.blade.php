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
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
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
        <img src="{{ asset('assets/logoringlock(blue).png') }}" alt="Logo Web" class="w-auto h-12 object-contain">
      </a>
        <!-- <div class="leading-tight">
          <span class="block font-extrabold text-brand-dark text-[15px] tracking-tight">RINGLOCK</span>
          <span class="block font-semibold text-[10px] text-gray-500 tracking-widest uppercase -mt-0.5">Indonesia</span>
        </div> -->
      

      <!-- Desktop Nav Links -->
      <nav class="hidden md:flex items-center gap-7">
        <a href="{{ url('/') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Beranda</a>
        <a href="{{ url('/tentang') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Tentang Kami</a>
        <a href="{{ url('/produk') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Produk</a>
        <a href="{{ url('/artikel') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Artikel</a>
      </nav>

      <!-- Desktop CTA Button -->
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

  <!-- Mobile Menu (toggle via main.js) -->
  <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-100 px-5">
    <nav class="flex flex-col py-4 gap-1">
      <a href="#hero"     class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Beranda</a>
      <a href="{{ url('/tentang') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Tentang Kami</a>
      <a href="#produk.html"  class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Produk Scaffolding</a>
      <a href="#homeartikel.html" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Artikel</a>
      <a href="#contact"  class="mt-3 inline-flex justify-center bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200">Minta Penawaran</a>
    </nav>
  </div>
</header>


<!-- =============================================
     HERO SECTION
     ============================================= -->
<section id="hero" class="relative min-h-[88vh] flex items-center overflow-hidden">
  <!-- Background Image -->
  <div class="absolute inset-0 bg-gray-900">
    <img
      src="{{ asset('assets/buildringlock1.svg') }}"
      alt="Proyek konstruksi gedung bertingkat dengan sistem scaffolding"
      class="w-full h-full object-cover object-center opacity-55"
    />
  </div>
  <!-- Gradient overlay -->
  <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/45 to-transparent"></div>

  <!-- Content -->
  <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 py-24 lg:py-32">
    <div class="max-w-2xl">

      <!-- Eyebrow label -->
      <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-sm text-white text-xs font-semibold tracking-widest uppercase px-3.5 py-1.5 rounded-full mb-6">
        <span class="w-1.5 h-1.5 bg-blue-300 rounded-full animate-pulse"></span>
        Jual Scaffolding
      </div>

      <!-- H1 -->
      <h1 class="hero-text-shadow text-4xl sm:text-5xl lg:text-[58px] font-extrabold text-white leading-[1.1] tracking-tight mb-5">
        Pusat Scaffolding Ringlock Terbaik Di-Jabodetabek
      </h1>

      <!-- Sub-headline -->
      <p class="hero-text-shadow text-white/85 text-base sm:text-lg font-light leading-relaxed max-w-lg mb-10">
        Solusi Scaffolding Modular Berkualitas Tinggi dan Bersertifikat Keamanan untuk konstruksi presisi Anda.
      </p>

      <!-- CTA Buttons -->
      <div class="flex flex-wrap gap-3.5">
        <a href="#about" class="inline-flex items-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-semibold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200 shadow-lg">
          Tentang Kami
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        <a href="#projects" class="inline-flex items-center gap-2 border-2 border-white/80 text-white hover:bg-white hover:text-brand-dark font-semibold text-[14px] px-6 py-3 rounded-lg transition-all duration-200">
          Proyek Kami
        </a>
      </div>

      <!-- Trust stats row -->
      <div class="mt-14 flex flex-wrap gap-8">
        <div>
          <div class="text-white font-extrabold text-2xl">10th</div>
          <div class="text-white/60 text-xs font-medium mt-0.5">Pengalaman Industri</div>
        </div>
        <div class="w-px bg-white/20"></div>
        <div>
          <div class="text-white font-extrabold text-2xl">100+</div>
          <div class="text-white/60 text-xs font-medium mt-0.5">Proyek Selesai</div>
        </div>
        <div class="w-px bg-white/20"></div>
        <div>
          <div class="text-white font-extrabold text-2xl">15+</div>
          <div class="text-white/60 text-xs font-medium mt-0.5">Kota Besar Tercover</div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- =============================================
     ABOUT US SECTION
     ============================================= -->
<section id="about" class="bg-brand-bg py-20 lg:py-28">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

      <!-- Col Left: Image + floating card -->
      <div class="relative">
        <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-[4/3]">
          <img
            src="{{ asset('assets/orangkantor.svg') }}"
            alt="Tim profesional Ringlock Indonesia"
            class="w-full h-full object-cover"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
        </div>

        <!-- Floating stat card -->
        <div class="absolute -bottom-5 right-6 lg:right-0 lg:-right-5 bg-brand-dark text-white rounded-2xl px-6 py-5 shadow-2xl min-w-[200px]">
          <div class="text-4xl font-extrabold leading-none">10th</div>
          <div class="text-xs font-semibold text-blue-200 mt-1.5 leading-tight">Pengalaman Industri</div>
          <div class="text-[11px] text-blue-300/70 mt-1">Siap mendukung proyek infrastruktur Jabodetabek.</div>
          <div class="mt-3 flex gap-1">
            <span class="w-5 h-1 bg-blue-300 rounded-full"></span>
            <span class="w-2 h-1 bg-blue-500 rounded-full"></span>
            <span class="w-2 h-1 bg-blue-500 rounded-full"></span>
          </div>
        </div>

        <!-- Decorative blobs -->
        <div class="absolute -top-5 -left-5 w-28 h-28 bg-brand-light rounded-full -z-10 opacity-70"></div>
        <div class="absolute -bottom-10 left-8 w-16 h-16 bg-blue-100 rounded-full -z-10"></div>
      </div>

      <!-- Col Right: Text content -->
      <div class="lg:pl-6">
        <!-- Eyebrow -->
        <!-- <div class="inline-flex items-center gap-2 mb-4">
          <div class="w-6 h-[2px] bg-brand-dark"></div>
          <span class="text-brand-dark text-xs font-bold tracking-widest uppercase">Tentang Kami</span>
        </div> -->

        <h2 class="text-3xl lg:text-4xl font-extrabold text-brand-dark leading-tight tracking-tight mb-5">
          Supplier Scaffolding Ringlock Terpercaya di Jabodetabek
        </h2>

        <p class="text-gray-600 text-[15px] leading-relaxed mb-4">
          Dengan pengalaman bertahun-tahun dalam industri konstruksi, Ringlock Indonesia menghadirkan scaffolding ringlock untuk setiap proyek di Indonesia. Kami bukan sekadar penyedia alat, tapi mitra terpercaya dalam setiap proyek pembangunan Anda.
        </p>
        <p class="text-gray-600 text-[15px] leading-relaxed mb-8">
          Kami memahami dinamika pembangunan Jakarta yang cepat. Oleh karena itu, efisiensi alat kerja dengan standar keamanan K3 adalah prioritas utama kami dalam setiap pengiriman komponen.
        </p>

        <!-- Feature bullets -->
        <ul class="space-y-3 mb-8">
          <li class="flex items-start gap-3 text-[14px] text-gray-700">
            <span class="mt-0.5 w-5 h-5 shrink-0 bg-brand-light rounded-full flex items-center justify-center">
              <svg class="w-3 h-3 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </span>
            Stok lengkap &amp; siap kirim se-Jabodetabek
          </li>
          <li class="flex items-start gap-3 text-[14px] text-gray-700">
            <span class="mt-0.5 w-5 h-5 shrink-0 bg-brand-light rounded-full flex items-center justify-center">
              <svg class="w-3 h-3 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </span>
            Material Hot Dip Galvanized, Kokoh & Berkualitas
          </li>
          <li class="flex items-start gap-3 text-[14px] text-gray-700">
            <span class="mt-0.5 w-5 h-5 shrink-0 bg-brand-light rounded-full flex items-center justify-center">
              <svg class="w-3 h-3 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </span>
            Telah Dipercaya 100+ Jasa Di Indonesia
          </li>
        </ul>

        <a href="#contact" class="inline-flex items-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-semibold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200 shadow-md">
          Hubungi Kami
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- =============================================
     FEATURED PRODUCT SECTION
     ============================================= -->
<section id="product" class="bg-brand-light py-20 lg:py-28">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="text-center mb-10">
      <span class="inline-block bg-brand-dark/10 text-brand-dark text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full">Produk Kami</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden min-h-[450px] lg:h-full p-4 lg:p-5 flex items-center justify-center">
        <div class="relative w-full h-full flex items-center justify-center"></div>
        <img 
          id="main-product-img"
          src="{{ asset('assets/ringlockvertical.svg') }}" 
          alt="Ringlock Scaffolding Pipe" 
          class="w-full h-full object-cover object-center transition-all duration-300"/>
      </div>
      <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12 flex flex-col justify-between border border-gray-100">
        <div>
          <span class="inline-block bg-blue-100 text-blue-700 text-[11px] font-bold tracking-wider uppercase px-3 py-1 rounded-full mb-4">
            Produk Kami
          </span>

          <h2 class="text-3xl lg:text-4xl font-extrabold text-brand-dark tracking-tight mb-3">Ringlock Standard</h2>
          <p class="text-gray-500 text-[14px] leading-relaxed mb-6">
            Komponen dasar dengan presisi tinggi &amp; komponen vertikal dari rangkaian scaffolding ringlock system.
          </p>
          
          <div class="space-y-0 border border-gray-100 rounded-xl overflow-hidden mb-6">
            <div class="spec-row flex items-center justify-between px-4 py-3.5 bg-gray-50/60 border-b border-gray-100">
              <span class="text-[13px] font-medium text-gray-500">Panjang Vertical</span>
              <span id="panjang-aktif" class="text-[14px] font-bold text-brand-dark" data-ukuran="1.5 m" data-gambar="assets/ringlockvertical.svg">1.5 m</span>
            </div>
            <div class="spec-row flex items-center justify-between px-4 py-3.5 border-b border-gray-100">
              <span class="text-[13px] font-medium text-gray-500">Tebal Pipa</span>
              <span class="text-[14px] font-bold text-brand-dark">2.4mm</span>
            </div>
            <div class="spec-row flex items-center justify-between px-4 py-3.5 bg-gray-50/60">
              <span class="text-[13px] font-medium text-gray-500">Material</span>
              <span class="text-[14px] font-bold text-brand-dark">Hot Dip Galvanized</span>
            </div>
          </div>

          <div class="flex flex-wrap gap-3 mb-8">
            <a href="produk.html" class="inline-flex items-center justify-center bg-brand-dark text-white font-bold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200 shadow-md">
              Lihat Produk
            </a>
            <a href="#contact" class="inline-flex items-center justify-center text-brand-dark font-bold text-[14px] px-6 py-3 rounded-lg hover:bg-gray-50 transition-all duration-200">
              Hubungi Kami
            </a>
          </div>
        </div>
          
        <div class="border-t border-gray-100 pt-6">
          <div class="text-center mb-5">
            <span class="bg-blue-100 text-blue-700 text-[11px] font-bold tracking-widest uppercase px-4 py-1 rounded-md">
              Varian Ukuran
            </span>
          </div>
          
          <div class="grid grid-cols-4 gap-3">
            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="0.5 m" data-gambar="assets/vertical0.5m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="{{ asset('assets/vertical0.5m.svg') }}" alt="Ringlock 0.5 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">0.5 m</span>
            </div>

            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="1 m" data-gambar="assets/vertical1m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="{{ asset('assets/vertical1m.svg') }}" alt="Ringlock 1 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">1 m</span>
            </div>

            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="2 m" data-gambar="assets/vertical2m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="{{ asset('assets/vertical2m.svg') }}" alt="Ringlock 2 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">2 m</span>
            </div>

            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="2.5 m" data-gambar="assets/vertical2.5m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="{{ asset('assets/vertical2.5m.svg') }}" alt="Ringlock 2.5 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">2.5 m</span>
            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="text-center mt-10">
      <a href="produk.html" class="inline-flex items-center gap-2 border-2 bg-brand-dark text-white font-bold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200">
        Selengkapnya
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- =============================================
     QUOTE / K3 BANNER
     Background image & overlay diatur di style.css
     (.quote-bg dan .quote-overlay)
     ============================================= -->
<section class="relative py-20 lg:py-28 quote-bg">
  <div class="absolute inset-0 quote-overlay"></div>
  <div class="relative z-10 max-w-4xl mx-auto px-5 lg:px-8 text-center">

    <!-- Quote mark icon -->
    <svg class="w-10 h-10 text-blue-300/40 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
      <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>

    <blockquote class="text-white text-xl sm:text-2xl lg:text-3xl font-semibold leading-relaxed italic tracking-tight">
      “Setiap sambungan adalah komitmen kami terhadap keselamatan pekerja. Menerapkan Standar pengecekan berlapis untuk setiap instalasi.”
    </blockquote>

    <div class="mt-8 flex items-center justify-center gap-3">
      <div class="w-10 h-[2px] bg-blue-300/50"></div>
      <span class="text-blue-200/70 text-xs font-semibold tracking-widest uppercase">Quality Control Ringlock Indonesia</span>
      <div class="w-10 h-[2px] bg-blue-300/50"></div>
    </div>

    <!-- K3 badge row -->
    <div class="mt-10 flex flex-wrap items-center justify-center gap-5">
      <div class="flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-2">
        <!-- <svg class="w-4 h-4 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg> -->
        <span class="text-white/80 text-xs font-semibold">Standard K3</span>
      </div>
      <div class="flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-2">
        <!-- <svg class="w-4 h-4 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg> -->
        <span class="text-white/80 text-xs font-semibold">Quality</span>
      </div>
      <div class="flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-2">
        <!-- <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg> -->
        <span class="text-white/80 text-xs font-semibold">Certified</span>
      </div>
    </div>
  </div>
</section>


<!-- =============================================
     SOLUTIONS / ARTIKEL GRID
     ============================================= -->
<section id="projects" class="bg-brand-bg py-20 lg:py-28">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- Section header Artikel 1 -->
    <div class="text-center mb-12">
      <span class="inline-block bg-brand-dark/10 text-brand-dark text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-4"> Artikel</span>
      <h2 class="text-3xl lg:text-4xl font-extrabold text-brand-dark tracking-tight">Solusi Cerdas Untuk Proyek Skala Besar</h2>
      <p class="text-gray-500 text-[15px] mt-3 max-w-xl mx-auto leading-relaxed">
        Dari gedung pencakar langit hingga infrastruktur publik,
        <br> kami hadir dengan solusi scaffolding yang tepat. </br>
      </p>
    </div>

    <!-- Projects grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Card 1: Gedung Bertingkat -->
      <div class="project-card bg-white rounded-2xl overflow-hidden shadow-md cursor-pointer group">
        <div class="aspect-[4/3] overflow-hidden relative">
          <img
            src="{{ asset('assets/gedungbertingkat.svg') }}"
            alt="Scaffolding gedung bertingkat"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>
        <div class="p-6">
          <span class="text-[11px] font-bold text-blue-500 tracking-widest uppercase">High-Rise Construction</span>
          <h3 class="text-lg font-extrabold text-brand-dark mt-1.5 mb-2">Gedung Bertingkat</h3>
          <p class="text-gray-500 text-[13px] leading-relaxed mb-4">
            Sistem perancah vertikal untuk struktur pencakar langit dengan stabilitas rotasi tinggi.
          </p>
          <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-brand-dark font-semibold text-[13px] hover:gap-2.5 transition-all">
            Baca Selengkapnya
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>

      <!-- Card 2: Ringlock Komponen Spesialis -->
      <div class="project-card bg-white rounded-2xl overflow-hidden shadow-md cursor-pointer group">
        <div class="aspect-[4/3] overflow-hidden relative">
          <img
            src="{{ asset('assets/detail.svg') }}"
            alt="Komponen spesialis ringlock"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>
        <div class="p-6">
          <span class="text-[11px] font-bold text-blue-500 tracking-widest uppercase">Technical Parts</span>
          <h3 class="text-lg font-extrabold text-brand-dark mt-1.5 mb-2">Ringlock Komponen Spesialis</h3>
          <p class="text-gray-500 text-[13px] leading-relaxed mb-4">
            Kustomisasi komponen untuk kebutuhan bangunan yang kompleks dan unik.
          </p>
          <a href= "{{ url('/') }}" class="inline-flex items-center gap-1.5 text-brand-dark font-semibold text-[13px] hover:gap-2.5 transition-all">
            Baca Selengkapnya
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>

      <!-- Card 3: Proyek Infrastruktur -->
      <div class="project-card bg-white rounded-2xl overflow-hidden shadow-md cursor-pointer group sm:col-span-2 lg:col-span-1">
        <div class="aspect-[4/3] sm:aspect-[16/7] lg:aspect-[4/3] overflow-hidden relative">
          <img
            src="{{ asset('assets/ringlockpanggung.svg') }}"
            alt="Proyek Panggung"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>
        <div class="p-6">
          <span class="text-[11px] font-bold text-blue-500 tracking-widest uppercase">Public Infrastructure</span>
          <h3 class="text-lg font-extrabold text-brand-dark mt-1.5 mb-2">Proyek Event</h3>
          <p class="text-gray-500 text-[13px] leading-relaxed mb-4">
            Dukungan scaffolding skala masif untuk panggung hiburan dan publik.
          </p>
          <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-brand-dark font-semibold text-[13px] hover:gap-2.5 transition-all">
            Baca Selengkapnya
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>

    </div>

    <!-- View all CTA -->
    <div class="text-center mt-10">
      <a href="homeartikel.html" class="inline-flex items-center gap-2 border-2 border-brand-dark text-brand-dark hover:bg-brand-dark hover:text-white font-semibold text-[14px] px-7 py-3 rounded-lg transition-all duration-200">
        Artikel Lainnya
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>

  </div>
</section>

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
            src="{{ asset('assets/logoringlockwihte.svg') }}" 
            alt="Ringlock Indonesia" 
            class="h-10 w-auto object-contain"
          />
        </div>

        <p class="text-blue-100/80 text-[15px] font-semibold leading-snug mb-6">
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
      <p class="text-blue-200/50 text-[12px]">© 2026 Ringlock Indonesia Jabodetabek. Powered by Tangga Mas Jaya Makmur</p>
      <div class="flex items-center gap-4">
        <a href="#" class="text-blue-200/40 hover:text-blue-200/70 text-[11px] transition-colors">Kebijakan Privasi</a>
        <a href="#" class="text-blue-200/40 hover:text-blue-200/70 text-[11px] transition-colors">Syarat &amp; Ketentuan</a>
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

<script src="{{ asset('main.js') }}"></script>
</body>
</html>