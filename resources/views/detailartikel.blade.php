<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $article->title }} — Ringlock Indonesia</title>

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

  <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>
<body class="font-sans bg-white text-gray-800 antialiased">


<header id="navbar" class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-[68px]">

      <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
        <img src="{{ asset('assets/logoringlock(blue).png') }}" alt="Logo Web" class="w-auto h-12 object-contain">
      </a>

      <nav class="hidden md:flex items-center gap-7">
        <a href="{{ url('/') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Beranda</a>
        <a href="{{ url('/tentang') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Tentang Kami</a>
        <a href="{{ url('/produk') }}" class="nav-link text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors">Produk</a>
        <a href="{{ url('/artikel') }}" class="nav-link text-[14px] font-semibold text-brand-dark transition-colors border-b-2 border-brand-dark pb-0.5">Artikel</a>
      </nav>

      <a href="#contact" class="hidden md:inline-flex items-center gap-1.5 bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200 shadow-sm">
        Minta Penawaran
      </a>

      <button id="hamburger" aria-label="Toggle menu" class="md:hidden flex flex-col justify-center items-center w-9 h-9 gap-[5px]">
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-6 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
        <span class="ham-line block w-5 h-[2px] bg-brand-dark rounded transition-all duration-300"></span>
      </button>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-100 px-5">
    <nav class="flex flex-col py-4 gap-1">
      <a href="{{ url('/') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Beranda</a>
      <a href="{{ url('/tentang') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Tentang Kami</a>
      <a href="{{ url('/produk') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Produk</a>
      <a href="{{ route('artikel.index') }}" class="py-2.5 text-[14px] font-semibold text-gray-700 hover:text-brand-dark transition-colors border-b border-gray-50">Artikel</a>
      <a href="#contact" class="mt-3 inline-flex justify-center bg-brand-dark hover:bg-blue-900 text-white text-[13px] font-semibold px-5 py-2.5 rounded-full transition-colors duration-200">Minta Penawaran</a>
    </nav>
  </div>
</header>
    

<section class="pt-14 pb-0 px-5 lg:px-8">
  <div class="max-w-3xl mx-auto text-center">

  <div class="flex justify-start mb-6 -mt-4">
      <a href="{{ url('/artikel') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-brand-dark transition-colors group">
        <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>

    <span class="inline-block bg-brand-dark text-white text-[11px] font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-5">
      @if($article->category == 'edukasi-k3') Edukasi K3 &amp; Teknik
      @elseif($article->category == 'proyek') Proyek Strategis
      @else Panduan Instalasi @endif
    </span>

    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-extrabold text-brand-dark leading-[1.15] tracking-tight mb-5">
      {{ $article->title }}
    </h1>

    <p class="text-gray-500 text-[15px] sm:text-base leading-relaxed max-w-xl mx-auto mb-10">
      {{ $article->excerpt }}
    </p>
  </div>

  <div class="max-w-5xl mx-auto">
    <div class="relative rounded-2xl overflow-hidden aspect-[16/7] shadow-xl">
      <img
        src="{{ asset('storage/' . $article->thumbnail) }}"
        alt="{{ $article->title }}"
        class="w-full h-full object-cover object-center"
        onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&q=80&auto=format&fit=crop'"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none"></div>
    </div>
  </div>
</section>

<section class="py-14 px-5 lg:px-8">
  <div class="max-w-3xl mx-auto">
    <article class="prose-article text-gray-700 leading-relaxed text-[16px]">
      {!! $article->body !!}
    </article>
  </div>
</section>

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
        </ul>
      </div>

      <div class="grid grid-cols-2 gap-8 lg:justify-end">

        <div>
          <h4 class="text-white font-bold text-[13px] tracking-widest uppercase mb-5">Menu Cepat</h4>
          <ul class="space-y-3">
            <li><a href="{{ url('/') }}"     class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Beranda</a></li>
            <li><a href="{{ url('/#about') }}"    class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Tentang Kami</a></li>
            <li><a href="{{ url('/produk') }}"  class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Produk Scaffolding</a></li>
            <li><a href="{{ url('/artikel') }}" class="text-blue-200/70 hover:text-white text-[13px] transition-colors">Artikel</a></li>
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

<a id="cart-fab"
  href="https://wa.me/628123651717?text=halo%20ringlock%20indonesia%20jabodetabek,%20buatkan%20saya%20penawaran%20terbaik"
  target="_blank"
  rel="noopener"
  class="fixed bottom-6 right-6 z-40 w-14 h-14 bg-green-600 hover:bg-green-900 text-white rounded-full shadow-xl flex items-center justify-center transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-brand-dark/30"
  aria-label="Hubungi WhatsApp Ringlock Indonesia">
  
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>

  <span id="cart-badge"
    class="hidden absolute -top-1 -right-1 min-w-[20px] h-5 px-1 bg-red-500 text-white text-[11px] font-extrabold rounded-full flex items-center justify-center leading-none">
    0
  </span>
</a>

<script src="{{ asset('main.js') }}"></script>
</body>
</html>