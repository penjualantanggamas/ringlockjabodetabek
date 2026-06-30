<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profil — Ringlock Indonesia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: { 'brand-dark': 'rgb(0, 35, 111)', 'brand-light': 'rgb(229, 238, 255)' },
          fontFamily: { 'sans': ['"Hanken Grotesk"', 'sans-serif'] }
        }
      }
    }
  </script>
</head>
<body class="font-sans bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">

  <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-4xl mx-auto px-5 h-16 flex items-center justify-between">
      <a href="{{ url('/produk') }}" class="flex items-center gap-2 text-gray-600 hover:text-brand-dark transition-colors text-sm font-bold">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Produk
      </a>
      <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Pengaturan Akun</span>
    </div>
  </header>

  <main class="flex-1 max-w-4xl w-full mx-auto px-5 py-10">
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden p-8 lg:p-12">
      <div class="mb-8 border-b border-gray-100 pb-5">
        <h1 class="text-3xl font-extrabold text-brand-dark tracking-tight">Lengkapi Profil Anda</h1>
        <p class="text-gray-500 text-sm mt-1">Data ini digunakan untuk keperluan pengiriman komponen scaffolding dan penerbitan nota invoice.</p>
      </div>

      <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark/20 focus:border-brand-dark">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Nomor WhatsApp</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark/20 focus:border-brand-dark">
          </div>
        </div>

        <div class="pt-4 border-t border-gray-100">
          <h3 class="text-sm font-bold text-brand-dark uppercase tracking-wide mb-4">Alamat</h3>
        </div>

        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Provinsi</label>
          <select id="provinsi" name="provinsi" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-dark/20">
            @if($user->provinsi)
                <option value="{{ $user->provinsi }}" selected>{{ $user->provinsi }}</option>
            @else
                <option value="">Pilih Provinsi...</option>
            @endif
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Kota / Kabupaten</label>
          <select id="kota" name="kota" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-dark/20">
            @if($user->kota)
                <option value="{{ $user->kota }}" selected>{{ $user->kota }}</option>
            @else
                <option value="">Pilih Kota/Kabupaten...</option>
            @endif
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Kecamatan</label>
          <select id="kecamatan" name="kecamatan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-dark/20">
            @if($user->kecamatan)
                <option value="{{ $user->kecamatan }}" selected>{{ $user->kecamatan }}</option>
            @else
                <option value="">Pilih Kecamatan...</option>
            @endif
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Kelurahan / Desa</label>
          <select id="kelurahan" name="kelurahan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-dark/20">
            @if($user->kelurahan)
                <option value="{{ $user->kelurahan }}" selected>{{ $user->kelurahan }}</option>
            @else
                <option value="">Pilih Kelurahan...</option>
            @endif
          </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
          <div class="md:col-span-2">
            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Nama Jalan / Detail Lokasi</label>
            <input type="text" name="detail_alamat" placeholder="Contoh: Jl. Raya Legok Kp. Cakung RT 03/03 No. 12" value="{{ old('detail_alamat', $user->detail_alamat) }}" required 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark/20 focus:border-brand-dark">
          </div>
          <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">Kode Pos</label>
            <input type="text" name="kode_pos" placeholder="15820" value="{{ old('kode_pos', $user->kode_pos) }}" required 
              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-dark/20 focus:border-brand-dark">
          </div>
        </div>

        <div class="pt-6 border-t border-gray-100 flex justify-end">
          <button type="submit" class="bg-brand-dark hover:bg-blue-900 text-white font-bold text-sm px-8 py-3.5 rounded-xl transition-all duration-200 shadow-md">
            Simpan Perubahan Profil
          </button>
        </div>
      </form>
    </div>
  </main>

  <footer class="bg-white border-t border-gray-100 py-4 text-center text-xs text-gray-400">
    &copy; 2026 Ringlock Indonesia — Tangga Mas Jaya Makmur. All rights reserved.
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
  const provSelect = document.getElementById('provinsi');
  const kotaSelect = document.getElementById('kota');
  const kecSelect  = document.getElementById('kecamatan');
  const kelSelect  = document.getElementById('kelurahan');

  // ==========================================================================
  // 1. AMBIL DATA PROVINSI (Menggunakan API Publik Emsifa yang Stabil & Aman CORS)
  // ==========================================================================
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => {
      if (!response.ok) throw new Error("Gagal memuat data provinsi");
      return response.json();
    })
    .then(provinces => {
      // Bersihkan & isi ulang dropdown provinsi
      provSelect.innerHTML = '<option value="">Pilih Provinsi...</option>';
      provinces.forEach(prov => {
        let opt = document.createElement('option');
        opt.value = prov.name;     // Disimpan ke database berbentuk teks nama
        opt.dataset.id = prov.id;   // Disimpan di DOM sebagai ID pencarian anak
        opt.textContent = prov.name;
        provSelect.appendChild(opt);
      });
    })
    .catch(error => {
      console.error("Error:", error);
      provSelect.innerHTML = '<option value="">Gagal memuat data, coba refresh...</option>';
    });

  // ==========================================================================
  // 2. EVENT LISTENER: KOTA / KABUPATEN
  // ==========================================================================
  provSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const provId = selectedOption.dataset.id;

    resetDropdown(kotaSelect, 'Pilih Kota/Kabupaten...');
    resetDropdown(kecSelect, 'Pilih Kecamatan...');
    resetDropdown(kelSelect, 'Pilih Kelurahan...');

    if (!provId) return;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
      .then(response => response.json())
      .then(regencies => {
        bukaKunciDropdown(kotaSelect);
        regencies.forEach(reg => {
          let opt = document.createElement('option');
          opt.value = reg.name;
          opt.dataset.id = reg.id;
          opt.textContent = reg.name;
          kotaSelect.appendChild(opt);
        });
      })
      .catch(err => console.error("Gagal memuat kota:", err));
  });

  // ==========================================================================
  // 3. EVENT LISTENER: KECAMATAN
  // ==========================================================================
  kotaSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const kotaId = selectedOption.dataset.id;

    resetDropdown(kecSelect, 'Pilih Kecamatan...');
    resetDropdown(kelSelect, 'Pilih Kelurahan...');

    if (!kotaId) return;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`)
      .then(response => response.json())
      .then(districts => {
        bukaKunciDropdown(kecSelect);
        districts.forEach(dist => {
          let opt = document.createElement('option');
          opt.value = dist.name;
          opt.dataset.id = dist.id;
          opt.textContent = dist.name;
          kecSelect.appendChild(opt);
        });
      })
      .catch(err => console.error("Gagal memuat kecamatan:", err));
  });

  // ==========================================================================
  // 4. EVENT LISTENER: KELURAHAN / DESA
  // ==========================================================================
  kecSelect.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const kecId = selectedOption.dataset.id;

    resetDropdown(kelSelect, 'Pilih Kelurahan...');

    if (!kecId) return;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecId}.json`)
      .then(response => response.json())
      .then(villages => {
        bukaKunciDropdown(kelSelect);
        villages.forEach(vill => {
          let opt = document.createElement('option');
          opt.value = vill.name;
          opt.textContent = vill.name;
          kelSelect.appendChild(opt);
        });
      })
      .catch(err => console.error("Gagal memuat kelurahan:", err));
  });

  // ==========================================================================
  // UTILITY HELPERS
  // ==========================================================================
  function resetDropdown(element, placeholderText) {
    element.innerHTML = `<option value="">${placeholderText}</option>`;
    element.setAttribute('disabled', 'true');
    element.classList.add('bg-gray-50');
  }

  function bukaKunciDropdown(element) {
    element.removeAttribute('disabled');
    element.classList.remove('bg-gray-50');
  }
});
  </script>
</body>
</html>