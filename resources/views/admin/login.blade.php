<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Dashboard Admin — Ringlock Indonesia</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;800&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS CDN -->
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
<body class="h-full font-sans antialiased flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-dark/5 to-gray-100">

  <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-xl border border-gray-100">
    
    <!-- Bagian Logo & Judul -->
    <div class="text-center">
      <img src="{{ asset('assets/logoringlock(blue).png') }}" alt="Logo Ringlock Indonesia" class="mx-auto h-16 w-auto object-contain" />
      <h2 class="mt-6 text-2xl font-extrabold text-brand-dark tracking-tight">
        Dashboard Admin
      </h2>
      <p class="mt-1.5 text-sm text-gray-500 font-medium">
        Silakan masuk untuk mengelola artikel dan produk
      </p>
    </div>

    <!-- Menampilkan Alert Error dari Laravel Jika Login Gagal -->
    @if($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-semibold flex items-start gap-2 animate-pulse">
        <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <span>{{ $errors->first() }}</span>
      </div>
    @endif

    <!-- Form Login -->
    <form class="mt-8 space-y-6" action="{{ url('/admin/login') }}" method="POST">
      <!-- CSRF Token: Wajib di setiap Form Laravel demi keamanan dari hacker -->
      @csrf

      <div class="space-y-4">
        <!-- Input Email -->
        <div>
          <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Alamat Email</label>
          <input 
            id="email" 
            name="email" 
            type="email" 
            autocomplete="email" 
            required 
            value="{{ old('email') }}"
            class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark focus:border-brand-dark focus:z-10 text-sm transition-all shadow-sm" 
            placeholder="admin@ringlock.id"
          />
        </div>

        <!-- Input Password -->
        <div>
          <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Kata Sandi</label>
          <input 
            id="password" 
            name="password" 
            type="password" 
            autocomplete="current-password" 
            required 
            class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 font-medium focus:outline-none focus:ring-2 focus:ring-brand-dark focus:border-brand-dark focus:z-10 text-sm transition-all shadow-sm" 
            placeholder="••••••••"
          />
        </div>
      </div>

      <!-- Tombol Submit Login -->
      <div>
        <button 
          type="submit" 
          class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-brand-dark hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-dark transition-colors duration-200 shadow-md shadow-brand-dark/10"
        >
          Masuk ke Dashboard
        </button>
      </div>
    </form>

  </div>

</body>
</html>