@extends('admin.layouts.dashboard')

@section('title', 'Manajemen Customer')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
  
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-black text-brand-dark tracking-tight">Daftar Akun Customer</h1>
      <p class="text-sm text-gray-500 mt-0.5">Memantau data akun customer terdaftar, kontak aktif, dan alamat pengiriman ringlock.</p>
    </div>
  </div>

  @if(session('success'))
    <div class="bg-emerald-50 text-emerald-600 p-4 rounded-xl text-sm font-semibold shadow-sm border border-emerald-100">
      🎉 {{ session('success') }}
    </div>
  @endif

  <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50 border-b border-gray-100 text-gray-400 font-bold text-xs uppercase tracking-wider">
            <th class="px-6 py-4">Nama Lengkap</th>
            <th class="px-6 py-4">Alamat Email</th>
            <th class="px-6 py-4">No. WhatsApp</th>
            <th class="px-6 py-4">Alamat Lengkap Tujuan</th>
            <th class="px-6 py-4 text-center">Keamanan Akun</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-50 text-sm text-gray-700">
          @forelse($customers as $customer)
            <tr class="hover:bg-gray-50/60 transition-colors">
              <td class="px-6 py-4 font-bold text-brand-dark">
                {{ $customer->name }}
              </td>
              <td class="px-6 py-4 font-medium text-gray-600">
                {{ $customer->email }}
              </td>
              <td class="px-6 py-4 font-semibold text-emerald-600">
                {{ $customer->phone_number ?? '-' }}
              </td>
              <td class="px-6 py-4 text-xs text-gray-500 max-w-xs truncate">
                @if($customer->provinsi)
                  {{ $customer->detail_alamat }}, KEL. {{ $customer->kelurahan }}, KEC. {{ $customer->kecamatan }}, {{ $customer->kota }}, {{ $customer->provinsi }} ({{ $customer->kode_pos }})
                @else
                  <span class="text-gray-400 italic">Belum mengisi profile alamat</span>
                @endif
              </td>
              <td class="px-6 py-4 text-center">
                <div class="flex items-center justify-center gap-3">
                  <span class="bg-gray-100 text-gray-400 px-2.5 py-1 rounded-lg text-[10px] font-mono tracking-widest select-none">ENCRYPTED</span>
                  <button onclick="bukaModalReset('{{ $customer->id }}', '{{ $customer->name }}')" class="text-xs font-bold text-blue-600 hover:text-blue-800 hover:underline">
                    Ganti Password
                  </button>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-16 text-center text-gray-400 italic">
                Belum ada customer yang terdaftar di sistem aplikasi.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="modalReset" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-5 hidden">
  <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-6 relative border border-gray-100">
    <button onclick="tutupModalReset()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>

    <h3 class="text-md font-extrabold text-brand-dark mb-1">Setel Ulang Password</h3>
    <p class="text-xs text-gray-400 mb-4">Customer: <span id="namaCustomerModal" class="font-bold text-gray-600"></span></p>
    
    <form id="formResetPassword" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-500 mb-1">Masukkan Password Baru</label>
        <input type="text" name="new_password" required minlength="8" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20" placeholder="Minimal 8 karakter">
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" onclick="tutupModalReset()" class="px-4 py-2 rounded-xl bg-gray-50 hover:bg-gray-100 text-xs font-bold text-gray-600">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-[rgb(0,35,111)] hover:bg-blue-900 text-white text-xs font-bold shadow-md">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<script>
  function bukaModalReset(id, name) {
    const modal = document.getElementById('modalReset');
    const labelNama = document.getElementById('namaCustomerModal');
    const form = document.getElementById('formResetPassword');
    
    labelNama.innerText = name;
    form.action = `/admin/customers/${id}/reset-password`;
    modal.classList.remove('hidden');
  }

  function tutupModalReset() {
    document.getElementById('modalReset').classList.add('hidden');
  }
</script>
@endsection