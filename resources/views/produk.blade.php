<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk Scaffolding — Ringlock Indonesia</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon" />

  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-dark':  'rgb(0, 35, 111)',
            'brand-light': 'rgb(229, 238, 255)',
            'brand-bg':    'rgb(248, 249, 255)',
          },
          fontFamily: {
            'sans': ['"Hanken Grotesk"', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <link class="main-css" rel="stylesheet" href="{{ asset('style.css') }}" />

  <style>
    /* -----------------------------------------------
       PRODUCT CARD (Lainnya) — hover lift
    ----------------------------------------------- */
    .other-card {
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .other-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 36px rgba(0, 35, 111, 0.14);
    }

    /* -----------------------------------------------
       FEATURED MODULE CARD — image zoom on hover
    ----------------------------------------------- */
    .module-img-wrap img {
      transition: transform 0.5s ease;
    }
    .module-img-wrap:hover img {
      transform: scale(1.04);
    }

    /* -----------------------------------------------
       Page hero breadcrumb divider
    ----------------------------------------------- */
    .breadcrumb-sep::before {
      content: '/';
      margin: 0 6px;
      opacity: 0.4;
    }

    /* -----------------------------------------------
       CART DRAWER — slide-in from right
    ----------------------------------------------- */
    #cart-drawer {
      transform: translateX(100%);
      transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    #cart-drawer.open {
      transform: translateX(0);
    }
    #cart-overlay {
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.35s ease;
    }
    #cart-overlay.open {
      opacity: 1;
      pointer-events: auto;
    }

    /* Cart badge pulse on add */
    @keyframes badge-pop {
      0%   { transform: scale(1); }
      40%  { transform: scale(1.45); }
      100% { transform: scale(1); }
    }
    .badge-pop { animation: badge-pop 0.3s ease; }

    /* Add-to-cart button feedback flash */
    .btn-added {
      background-color: #16a34a !important;
      color: #fff !important;
    }
  </style>
</head>
<body class="font-sans bg-white text-gray-800">


<header id="navbar" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-[68px]">

      <a href="#" class="flex items-center gap-2 shrink-0">
        <img src="./assets/logoringlock(blue).png" alt="Logo Web" class="w-auto h-12 object-contain">
      </a>

      <nav class="hidden md:flex items-center gap-7">
        <a href="{{ url('/') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Beranda</a>
        <a href="{{ url('/tentang') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Tentang Kami</a>
        <a href="{{ url('/produk') }}" class="nav-link text-[14px] font-semibold text-brand-dark transition-colors border-b-2 border-brand-dark pb-0.5">Produk</a>
        <a href="{{ url('/artikel') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Artikel</a>
      </nav>

      @auth
        <div class="relative hidden md:block" id="profile-dropdown-wrapper">
          <button onclick="toggleProfileDropdown()" class="flex items-center gap-2 bg-gray-50 hover:bg-gray-100 border border-gray-200 px-4 py-2 rounded-full transition-colors focus:outline-none">
            <div class="w-7 h-7 rounded-full bg-[rgb(0,35,111)] text-white flex items-center justify-center font-bold text-xs uppercase shadow-sm">
              {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <span class="text-[13px] font-semibold text-gray-700 max-w-[100px] truncate">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>

          <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 hidden animate-in fade-in slide-in-from-top-2 duration-150 z-50">
            <div class="px-4 py-2 border-b border-gray-50 mb-1">
              <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">Status Akun</p>
              <p class="text-xs text-green-600 font-semibold mt-0.5 flex items-center gap-1">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full inline-block animate-pulse"></span> Terautentikasi
              </p>
            </div>
            <a href="{{ url('/profil/edit') }}" class="flex items-center gap-2 px-4 py-2.5 text-[13px] font-medium text-gray-700 hover:bg-gray-50 hover:text-[rgb(0,35,111)] transition-colors">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              Edit Profil
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="border-t border-gray-50 mt-1">
              @csrf
              <button type="submit" class="w-full flex items-center gap-2 px-4 py-2.5 text-[13px] font-bold text-red-600 hover:bg-red-50 transition-colors text-left">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Keluar Akun
              </button>
            </form>
          </div>
        </div>
      @else
        <a href="#contact" class="hidden md:inline-flex items-center gap-1.5 bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">
          Minta Penawaran
        </a>
      @endauth

      <button id="hamburger" aria-label="Toggle menu" class="md:hidden flex flex-col justify-center items-center w-9 h-9 gap-[5px]">
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-5 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
      </button>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-100 px-5 hidden">
    <nav class="flex flex-col py-4 gap-1">
      <a href="{{ url('/') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Beranda</a>
      <a href="{{ url('/tentang') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Tentang Kami</a>
      <a href="{{ url('/produk') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Produk</a>
      <a href="{{ route('artikel.index') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Artikel</a>
      
      @auth
        <a href="{{ url('/profil/edit') }}" class="py-2.5 text-[14px] font-semibold text-blue-700 border-b border-gray-50 flex items-center gap-2">📱 Edit Profil ({{ Auth::user()->name }})</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
          @csrf
          <button type="submit" class="w-full text-center bg-red-50 text-red-600 text-[13px] font-bold py-2.5 rounded-xl">Keluar Akun</button>
        </form>
      @else
        <a href="#contact" class="mt-3 inline-flex justify-center bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200">Minta Penawaran</a>
      @endauth
    </nav>
  </div>
</header>


<section id="product" class="bg-brand-light py-20 lg:py-28">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden min-h-[450px] lg:h-full p-4 lg:p-5 flex items-center justify-center">
        <img 
          id="main-product-img"
          src="assets/ringlockvertical.svg" 
          alt="Ringlock Scaffolding Pipe" 
          class="w-full h-full object-cover object-center transition-all duration-300"
        />
      </div>
      <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12 flex flex-col justify-between border border-gray-100">
        <div>
          <span class="inline-block bg-blue-100 text-blue-700 text-[11px] font-bold tracking-wider uppercase px-3 py-1 rounded-full mb-4">
            Produk Kami
          </span>

          <h2 class="text-3xl lg:text-4xl font-extrabold text-brand-dark tracking-tight mb-3">Ringlock Standard</h2>
          <p class="text-gray-500 text-[14px] leading-relaxed mb-6">
            Komponen dasar dengan presisi tinggi & komponen vertikal dari rangkaian scaffolding ringlock system.
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
            <button
              id="btn-add-vertical"
              class="add-to-cart-btn inline-flex items-center justify-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-bold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200 shadow-md"
              data-source="vertical">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/>
              </svg>
              Masukkan Keranjang
            </button>
            <a href="#contact" class="inline-flex items-center justify-center text-brand-dark font-bold text-[14px] px-6 py-3 rounded-lg bg-[#F8B90F] hover:bg-gray-100 transition-all duration-200">
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
                <img src="assets/vertical0.5m.svg" alt="Ringlock 0.5 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">0.5 m</span>
            </div>
            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="1 m" data-gambar="assets/vertical1m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="assets/vertical1m.svg" alt="Ringlock 1 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">1 m</span>
            </div>
            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="2 m" data-gambar="assets/vertical2m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="assets/vertical2m.svg" alt="Ringlock 2 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">2 m</span>
            </div>
            <div class="variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="2.5 m" data-gambar="assets/vertical2.5m.svg">
              <div class="bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200">
                <img src="assets/vertical2.5m.svg" alt="Ringlock 2.5 m" class="w-full h-auto object-contain aspect-square variant-img">
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">2.5 m</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="horizontal" class="bg-white py-16 lg:py-24">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="text-center mb-10">
      <h2 class="text-2xl lg:text-3xl font-extrabold text-brand-dark tracking-tight">Modul Horizontal Ringlock</h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="bg-white rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden min-h-[450px] lg:h-full p-4 lg:p-5 flex items-center justify-center">
        <img
          id="main-ledger-img"
          src="assets/ledger1.5.svg"
          alt="Ringlock Ledger"
          class="w-full h-full object-contain transition-opacity duration-300"
        />
      </div>
      <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12 flex flex-col justify-between border border-gray-100">
        <div>
          <span class="inline-block bg-blue-100 text-blue-700 text-[11px] font-bold tracking-wider uppercase px-3 py-1 rounded-full mb-4">
            Produk Kami
          </span>
          <h3 id="ledger-title" class="text-3xl lg:text-4xl font-extrabold text-brand-dark tracking-tight mb-3">Ringlock Ledger</h3>
          <p class="text-gray-500 text-[14px] leading-relaxed mb-6">
            Komponen horizontal dari rangkaian scaffolding ringlock system yang berfungsi sebagai penghubung antar tiang vertikal (standards).
          </p>

          <div class="space-y-0 border border-gray-100 rounded-xl overflow-hidden mb-6">
            <div class="spec-row flex items-center justify-between px-4 py-3.5 bg-gray-50/60 border-b border-gray-100">
              <span class="text-[13px] font-medium text-gray-500">Panjang Horizontal</span>
              <span id="panjang-ledger-aktif" class="text-[14px] font-bold text-brand-dark">1.5 m</span>
            </div>
            <div class="spec-row flex items-center justify-between px-4 py-3.5 border-b border-gray-100">
              <span class="text-[13px] font-medium text-gray-500">Tebal Pipa</span>
              <span class="text-[14px] font-bold text-brand-dark">3.2 mm</span>
            </div>
            <div class="spec-row flex items-center justify-between px-4 py-3.5 bg-gray-50/60">
              <span class="text-[13px] font-medium text-gray-500">Material</span>
              <span class="text-[14px] font-bold text-brand-dark">Hot Dip Galvanized</span>
            </div>
          </div>

          <div class="flex flex-wrap gap-3 mb-8">
            <button
              id="btn-add-ledger"
              class="add-to-cart-btn inline-flex items-center justify-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-bold text-[14px] px-6 py-3 rounded-lg transition-colors duration-200 shadow-md"
              data-source="ledger">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/>
              </svg>
              Masukkan Keranjang
            </button>
            <a href="#contact" class="inline-flex items-center justify-center text-brand-dark font-bold text-[14px] px-6 py-3 rounded-lg bg-[#F8B90F] hover:bg-gray-100 transition-all duration-200">
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
          <div class="grid grid-cols-4 gap-3" id="ledger-variants">
            <div class="ledger-variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="0.9 m" data-gambar="assets/ledger0.9.svg">
              <div class="variant-thumb bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200 w-full">
                <img src="assets/ledger0.9.svg" alt="Ledger 0.9 m" class="w-full h-auto object-contain aspect-square variant-img" />
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">0.9 m</span>
            </div>
            <div class="ledger-variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="1.2 m" data-gambar="assets/ledger1.2.svg">
              <div class="variant-thumb bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200 w-full">
                <img src="assets/ledger1.2.svg" alt="Ledger 1.2 m" class="w-full h-auto object-contain aspect-square variant-img" />
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">1.2 m</span>
            </div>
            <div class="ledger-variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="1.5 m" data-gambar="assets/ledger1.5.svg">
              <div class="variant-thumb bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200 w-full">
                <img src="assets/ledger1.5.svg" alt="Ledger 1.5 m" class="w-full h-auto object-contain aspect-square variant-img" />
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">1.5 m</span>
            </div>
            <div class="ledger-variant-btn flex flex-col items-center cursor-pointer group" data-ukuran="1.8 m" data-gambar="assets/ledger1.8.svg">
              <div class="variant-thumb bg-white border-2 border-transparent group-hover:border-blue-500 rounded-lg p-2 shadow-sm transition-all duration-200 w-full">
                <img src="assets/ledger1.8.svg" alt="Ledger 1.8 m" class="w-full h-auto object-contain aspect-square variant-img" />
              </div>
              <span class="text-[12px] font-bold text-gray-500 group-hover:text-blue-600 mt-2 variant-txt">1.8 m</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="lainnya" class="bg-brand-bg py-16 lg:py-24">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-2xl lg:text-3xl font-extrabold text-brand-dark tracking-tight">Produk Lainnya</h2>
      <p class="text-gray-500 text-[14px] mt-2 max-w-2xl mx-auto">Komponen lengkap sistem scaffolding Ringlock untuk berbagai kebutuhan konstruksi.</p>
    </div>
 
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/diagonal brace.svg" alt="Diagonal Brace Ringlock" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Diagonal Brace</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">0.9x1.5m | 1.2x1.5m | 1.5x1.5m | 1.8x1.5m</p>
          <button
            class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto"
            data-has-variants="true"
            data-variants='["Diagonal 0.9×1.5 m","Diagonal 1.2×1.5 m","Diagonal 1.5×1.5 m","Diagonal 1.8×1.5 m"]'>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Pilih Ukuran
          </button>
        </div>
      </div>
 
      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/catwalk.svg" alt="Ringlock Catwalk" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Catwalk</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">0.9m | 1.2m | 1.5m | 1.8m</p>
          <button
            class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto"
            data-has-variants="true"
            data-variants='["Catwalk 0.9 m","Catwalk 1.2 m","Catwalk 1.5 m","Catwalk 1.8 m"]'>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Pilih Ukuran
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/ringself.svg" alt="Ringlock Ringself" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Ringself</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Diameter Ring 12.2cm | Diameter Cincin 5cm</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/jackbase.svg" alt="Jackbase M38" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Jackbase M38</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Tinggi 60cm | Tebal Stud 38mm</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/uhead.svg" alt="Uhead M38" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Uhead M38</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Tinggi 60cm | Tebal Stud 38mm</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/wedge.svg" alt="Ringlock Wedge" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Wedge</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Pengunci Rangkaian Ringlock</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/stair.svg" alt="Ringlock Stair" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Stair</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Tinggi 170cm | Lebar 60cm</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/diagonal head.svg" alt="Ringlock Diagonal Brace Head" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Diagonal Brace Head</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Penghubung Diagonal Brace Dengan Ring</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Penghubung Diagonal Brace Dengan Ring
          </button>
        </div>
      </div>

      <div class="other-card bg-white rounded-2xl overflow-hidden shadow-md group flex flex-col">
        <div class="bg-gradient-to-br from-brand-light/60 to-blue-50 flex flex-col items-center min-h-[200px] w-full overflow-hidden">
          <div class="w-full h-full flex-1 flex items-center justify-center">
            <img src="assets/ledgerhead.svg" alt="Ringlock Ledger Head" class="w-full h-full object-cover object-center" />
          </div>
        </div>
        <div class="p-5 flex flex-col flex-1 bg-brand-dark text-white">
          <h4 class="card-title font-extrabold text-[16px] mb-1">Ringlock Ledger Head</h4>
          <p class="text-blue-200/70 text-[12px] mb-4 leading-relaxed">Penghubung Standard Dengan Ring</p>
          <button class="other-cart-btn inline-flex items-center justify-center gap-2 border-2 border-white/20 hover:border-white bg-white/5 hover:bg-white text-white hover:text-brand-dark font-bold text-[13px] px-5 py-2.5 rounded-xl transition-all duration-200 mt-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
            Masukkan Keranjang
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="contact" class="bg-brand-light py-16 lg:py-20">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
      <div class="text-center lg:text-left">
        <span class="inline-block bg-blue-100 text-blue-700 text-[11px] font-bold tracking-wider uppercase px-3 py-1 rounded-full mb-4">Hubungi Kami</span>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-brand-dark mb-4 tracking-tight leading-tight">Siap Mulai Proyek Anda Bersama Kami?</h2>
        <p class="text-gray-600 text-[15px] leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">Dapatkan penawaran harga terbaik dan konsultasikan kebutuhan scaffolding Ringlock Anda langsung dengan tim ahli kami.</p>
        <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
          <a href="https://wa.me/628123651717?text=halo%20ringlock%20indonesia%20jabodetabek,%20buatkan%20saya%20penawaran%20terbaik" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold text-[14px] px-7 py-3.5 rounded-xl transition-colors duration-200 shadow-md">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Chat WhatsApp
          </a>
          <a href="mailto:tanggamasjayamakmur@yahoo.com?subject=Tanya%20Harga%20Ringlock%20Scaffolding" class="inline-flex items-center gap-2 bg-brand-dark hover:bg-blue-900 text-white font-semibold text-[14px] px-7 py-3.5 rounded-xl transition-colors duration-200 shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"/></svg>
            Kirim Email
          </a>
        </div>
      </div>
      <div class="w-full h-[280px] sm:h-[350px] rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.55094188279!2d106.5433806746619!3d-6.322558761867301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3f7ef24f297%3A0xe6a41e7a6394f94a!2sRINGLOCK%20INDONESIA%20-%20Pusat%20Scaffolding%20Jabodetabek!5e0!3m2!1sen!2sid!4v1782111812257!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full rounded-2xl border-0" title="Lokasi Kantor Ringlock Indonesia"></iframe>
      </div>
    </div>
  </div>
</section>


<footer class="bg-brand-dark text-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 py-14 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div class="max-w-sm">
        <div class="flex items-center gap-2 mb-5">
          <img src="./assets/logoringlockwihte.svg" alt="Ringlock Indonesia" class="h-10 w-auto object-contain" />
        </div>
        <p class="text-blue-100/80 text-[15px] font-semibold leading-snug mb-6">Bangun Lebih Aman, Lebih Cepat dengan Ringlock Indonesia.</p>
        <ul class="space-y-3">
          <li class="flex items-start gap-3 text-blue-200/70 text-[13px]">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Sudut Jl. Raya Curug No. 01. RT 003, RW 003, Kp. Cakung, Babat, Kec. Legok, Kabupaten Tangerang, Banten 15820
          </li>
          <li class="flex items-center gap-3 text-blue-200/70 text-[13px]">
            <svg class="w-4 h-4 shrink-0 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            0812365 1717
          </li>
        </ul>
      </div>
      <div class="grid grid-cols-2 gap-8">
        <div>
          <h4 class="text-white font-bold text-[13px] tracking-widest uppercase mb-5">Menu Cepat</h4>
          <ul class="space-y-3">
            <li><a href="{{ url('/') }}" class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Beranda</a></li>
            <li><a href="{{ url('/tentang') }}"class="text-blue-200/70 font-semibold hover:text-white text-[13px] ">Tentang Kami</a></li>
            <li><a href="{{ url('/produk') }}" class="text-white font-semibold text-[13px] transition-colors">Produk Scaffolding</a></li>
            <li><a href="{{ route('artikel.index') }}" class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Artikel</a></li>
            <li><a href="#contact" class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Kontak</a></li>
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


<div id="cart-overlay" class="fixed inset-0 bg-black/40 z-40 backdrop-blur-sm"></div>

<div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-sm bg-white z-50 shadow-2xl flex flex-col">
  <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-brand-dark text-white shrink-0">
    <div class="flex items-center gap-3">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/>
      </svg>
      <h2 class="font-bold text-[16px]">Keranjang Permintaan</h2>
    </div>
    <button id="cart-close-btn" aria-label="Tutup keranjang"
      class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>

  <div id="cart-body" class="flex-1 overflow-y-auto px-5 py-4 space-y-3">
  </div>

  <div class="px-5 py-4 border-t border-gray-100 bg-gray-50 shrink-0">
    <p id="cart-empty-hint" class="text-center text-gray-400 text-[13px] mb-3 hidden">
      Belum ada produk dipilih.
    </p>

    <a href="javascript:void(0)" id="wa-checkout-btn"
      class="w-full inline-flex items-center justify-center gap-2.5 bg-brand-dark hover:bg-blue-900 text-white font-bold text-[14px] px-6 py-3.5 rounded-xl transition-colors duration-200 shadow-md">
      Lanjutkan Pembayaran
    </a>
  </div>
</div>


<button id="cart-fab"
  class="fixed bottom-6 right-6 z-40 w-14 h-14 bg-brand-dark hover:bg-blue-900 text-white rounded-full shadow-xl flex items-center justify-center transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-brand-dark/30"
  aria-label="Buka keranjang belanja">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/>
  </svg>
  <span id="cart-badge" class="hidden absolute -top-1 -right-1 min-w-[20px] h-5 px-1 bg-red-500 text-white text-[11px] font-extrabold rounded-full flex items-center justify-center leading-none">0</span>
</button>

<div id="vp-backdrop" class="fixed inset-0 z-[60] bg-black/50 backdrop-blur-sm flex items-end sm:items-center justify-center p-4" style="display:none!important"></div>
<div id="vp-modal" class="fixed z-[70] bottom-0 sm:bottom-auto sm:top-1/2 left-0 right-0 sm:left-1/2 sm:-translate-x-1/2 sm:-translate-y-1/2 sm:max-w-sm w-full bg-white rounded-t-3xl sm:rounded-2xl shadow-2xl transition-transform duration-300 ease-out" style="display:none!important" role="dialog" aria-modal="true" aria-labelledby="vp-title"></div>

<script src="main.js"></script>
<script src="{{ asset('cart.js') }}"></script>

<div id="authModal" class="fixed inset-0 z-[80] flex items-center justify-center p-5 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleAuthModal()"></div>
    
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 z-10 animate-in fade-in zoom-in-95 duration-200">
        <button onclick="toggleAuthModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div id="loginPanel">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-[rgb(0,35,111)]">Selamat Datang Kembali</h2>
                <p class="text-gray-500 text-xs mt-1">Masuk untuk melanjutkan pembelian komponen scaffolding Anda.</p>
            </div>

            @if($errors->has('auth_error'))
                <div class="bg-red-50 text-red-600 text-xs p-3 rounded-xl mb-4 font-semibold">
                    {{ $errors->first('auth_error') }}
                </div>
            @endif

            <form action="{{ route('customer.login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Masukkan password">
                </div>
                <button type="submit" class="w-full bg-[rgb(0,35,111)] hover:bg-blue-900 text-white font-semibold py-3 rounded-xl transition-colors text-sm shadow-md mt-2">
                    Masuk Sekarang
                </button>
            </form>

            <div class="text-center mt-6 pt-4 border-t border-gray-100">
                <p class="text-xs text-gray-500">Belum mempunyai akun? <button onclick="switchPanel('register')" class="text-[rgb(0,35,111)] font-bold hover:underline">Daftar sekarang</button></p>
            </div>
        </div>

        <div id="registerPanel" class="hidden">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-[rgb(0,35,111)]">Mulai Buat Akun</h2>
                <p class="text-gray-500 text-xs mt-1">Daftar cepat untuk mengaktifkan fitur checkout & pelacakan pesanan.</p>
            </div>

            <form action="{{ route('customer.register') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Contoh: Budi Santoso">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" name="phone_number" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Contoh: 08123456789">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Ketik ulang password">
                </div>
                <button type="submit" class="w-full bg-[rgb(0,35,111)] hover:bg-blue-900 text-white font-semibold py-2.5 rounded-xl transition-colors text-sm shadow-md mt-2">
                    Daftar Akun Baru
                </button>
            </form>

            <div class="text-center mt-6 pt-4 border-t border-gray-100">
                <p class="text-xs text-gray-500">Sudah memiliki akun? <button onclick="switchPanel('login')" class="text-[rgb(0,35,111)] font-bold hover:underline">Masuk di sini</button></p>
            </div>
        </div>
    </div>
</div>

<script>
    // ==========================================================================
    // KONTROL NAVBAR PROFILE DROPDOWN
    // ==========================================================================
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profile-dropdown');
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    }

    document.addEventListener('click', function(event) {
        const wrapper = document.getElementById('profile-dropdown-wrapper');
        const dropdown = document.getElementById('profile-dropdown');
        
        if (wrapper && dropdown && !wrapper.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    function toggleAuthModal() {
        const modal = document.getElementById('authModal');
        modal.classList.toggle('hidden');
    }

    function switchPanel(panel) {
        const loginPanel = document.getElementById('loginPanel');
        const registerPanel = document.getElementById('registerPanel');
        
        if (panel === 'register') {
            loginPanel.classList.add('hidden');
            registerPanel.classList.remove('hidden');
        } else {
            registerPanel.classList.add('hidden');
            loginPanel.classList.remove('hidden');
        }
    }

    function tutupKeranjangDanBukaAuth() {
        const drawer = document.getElementById('cart-drawer');
        const overlay = document.getElementById('cart-overlay');
        if (drawer && overlay) {
            drawer.classList.remove('open');
            overlay.classList.remove('open');
        }

        const modalAuth = document.getElementById('authModal');
        if (modalAuth) {
            modalAuth.classList.remove('hidden');
        }
    }

    // ==========================================================================
    // MUTILASI PERINTAH: Mematikan Total Fungsi sendToWhatsApp Dari cart.js
    // ==========================================================================
    document.addEventListener("DOMContentLoaded", function() {
        const oldBtn = document.getElementById('wa-checkout-btn');
        
        if (oldBtn) {
            const newBtn = oldBtn.cloneNode(true);
            oldBtn.parentNode.replaceChild(newBtn, oldBtn);
            
            newBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (this.hasAttribute('disabled') || this.classList.contains('disabled')) {
                    return false;
                }

                @auth
                    window.location.href = "{{ url('/checkout') }}";
                @else
                    tutupKeranjangDanBukaAuth();
                @endauth
            });
        }
    });
</script>

@if(session('open_auth_modal'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        toggleAuthModal();
    });
</script>
@endif

</body>
</html>