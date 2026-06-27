<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="icon" type="icon" href="{{ asset('assets/logoringlock(blue).ico') }}">
  
  <title>@yield('title') — Admin Ringlock Indonesia</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;800&display=swap" rel="stylesheet" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-dark':  'rgb(0, 35, 111)',
            'brand-light': 'rgb(229, 238, 255)',
          },
          fontFamily: {
            'sans': ['"Hanken Grotesk"', 'sans-serif'],
          },
        }
      }
    }
  </script>
</head>
<body class="font-sans bg-gray-50 text-gray-800 antialiased flex h-screen overflow-hidden">

  <aside class="w-64 bg-brand-dark text-white flex flex-col shrink-0 hidden md:flex">
    <div class="h-16 flex items-center px-6 border-b border-white/10 gap-3">
      <div class="w-7 h-7 bg-white rounded-lg flex items-center justify-center font-black text-brand-dark text-sm">R</div>
      <span class="font-extrabold tracking-wider text-sm uppercase">Ringlock Admin</span>
    </div>
    
    <nav class="flex-1 p-4 space-y-1">
      <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold {{ Request::is('admin/dashboard') ? 'bg-white/10 text-white' : 'text-blue-100/70 hover:bg-white/5 hover:text-white' }} transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
        Dashboard Overview
      </a>
      
      <a href="{{ url('/admin/articles') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold {{ Request::is('admin/articles*') ? 'bg-white/10 text-white' : 'text-blue-100/70 hover:bg-white/5 hover:text-white' }} transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        Kelola Artikel
      </a>
    </nav>

    <div class="p-4 border-t border-white/10">
      <form action="{{ url('/admin/logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-semibold text-red-200/70 hover:bg-red-500/10 hover:text-red-300 transition-all text-left">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
          Keluar Sistem
        </button>
      </form>
    </div>
  </aside>

  <div class="flex-1 flex flex-col overflow-hidden">
    
    <header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between shrink-0">
      <h2 class="font-extrabold text-brand-dark text-[16px]">Selamat Datang, Admin</h2>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-brand-light flex items-center justify-center font-bold text-brand-dark text-xs border border-blue-200">
          A
        </div>
      </div>
    </header>

    <main class="flex-1 overflow-y-auto p-6 lg:p-8">
      @yield('content')
    </main>

  </div>

</body>
</html>