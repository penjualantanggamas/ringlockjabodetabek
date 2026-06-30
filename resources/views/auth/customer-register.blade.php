<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Ringlock Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen px-5 py-10">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-extrabold text-[rgb(0,35,111)]">Mulai Buat Akun</h2>
            <p class="text-gray-500 text-sm mt-1">Daftar sekarang untuk mengumpulkan komponen perancah ke keranjang belanja Anda.</p>
        </div>

        <form action="{{ url('/register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Contoh: Budi Santoso">
                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="nama@email.com">
                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Contoh: 08123456789">
                @error('phone_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Minimal 8 karakter">
                @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-[rgb(0,35,111)]/20 focus:border-[rgb(0,35,111)]" placeholder="Ketik ulang password">
            </div>

            <button type="submit" class="w-full bg-[rgb(0,35,111)] hover:bg-blue-900 text-white font-semibold py-3 rounded-xl transition-colors text-sm shadow-md mt-2">
                Daftar Akun Baru
            </button>
        </form>

        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-500">Sudah memiliki akun? <a href="{{ url('/login') }}" class="text-[rgb(0,35,111)] font-bold hover:underline">Masuk di sini</a></p>
        </div>
    </div>
</body>
</html>