<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Permintaan - Ringlock Indonesia</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Gaya visual pelengkap untuk radio button kustom */
        .method-radio:checked + div {
            border-color: rgb(0, 35, 111);
            background-color: rgba(0, 35, 111, 0.04);
            color: rgb(0, 35, 111);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans">

    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-gray-200 pb-5 mb-8">
            <div>
                <h1 class="text-2xl font-black text-[rgb(0,35,111)] tracking-tight">Formulir Permintaan Penawaran</h1>
                <p class="text-sm text-gray-500 mt-1">Lengkapi informasi pemesanan komponen scaffolding Anda.</p>
            </div>
            <a href="javascript:history.back()" class="inline-flex items-center justify-center gap-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-xs font-bold px-4 py-2.5 rounded-xl shadow-xs transition-colors shrink-0 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Katalog
            </a>
        </div>

        <form id="checkout-form" method="POST" action="#" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @csrf
            
            <div class="md:col-span-2 space-y-5">
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide border-b border-gray-100 pb-2">Informasi Kontak & Metode</h2>

                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nama Lengkap</label>
                        <input type="name" name="name" id="name" required class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Isi Nama Lengkap">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Alamat Email</label>
                        <input type="email" name="email" id="email" required class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Isi Email Aktif">
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nomor Telepon / WhatsApp (Aktif)</label>
                        <input type="tel" name="phone" id="phone" required class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Isi Nomor Telepon Aktif">
                    </div>

                    <div class="pt-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Metode Penyerahan Barang</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="metode_pengiriman" value="diambil" class="sr-only method-radio" id="radio-diambil">
                                <div class="flex flex-col items-center justify-center p-4 bg-white border-2 border-gray-200 rounded-2xl text-center transition-all hover:border-gray-300 select-none">
                                    <!-- <span class="text-xl mb-1">📦</span> -->
                                    <span class="text-xs font-extrabold uppercase tracking-wide">Diambil Sendiri</span>
                                    <span class="text-[10px] text-gray-400 font-medium mt-0.5">Ambil ke gudang utama</span>
                                </div>
                            </label>

                            <label class="relative block cursor-pointer">
                                <input type="radio" name="metode_pengiriman" value="dikirim" class="sr-only method-radio" id="radio-dikirim">
                                <div class="flex flex-col items-center justify-center p-4 bg-white border-2 border-gray-200 rounded-2xl text-center transition-all hover:border-gray-300 select-none">
                                    <!-- <span class="text-xl mb-1">🚚</span> -->
                                    <span class="text-xs font-extrabold uppercase tracking-wide">Dikirim Kargo</span>
                                    <span class="text-[10px] text-gray-400 font-medium mt-0.5">Kirim ke lokasi proyek</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div id="container-diambil" class="hidden space-y-4 bg-blue-50/60 border border-blue-100 rounded-2xl p-5 animate-fade-in">
                        <div class="flex items-start gap-3">
                            <!-- <span class="text-lg mt-0.5">📍</span> -->
                            <div>
                                <h4 class="text-xs font-bold text-[rgb(0,35,111)] uppercase tracking-wider mb-1">Lokasi Gudang Penjarangan Ringlock</h4>
                                <p class="text-xs font-bold text-gray-700 leading-relaxed">
                                    Sudut Jl. Raya Curug No. 01. RT 003, RW 003, Kp. Cakung, Babat, Kec. Legok, Kabupaten Tangerang, Banten 15820
                                </p>
                            </div>
                        </div>
                        
                        <div class="w-full h-48 rounded-xl overflow-hidden border border-blue-200 shadow-xs">
                            <iframe 
                                class="w-full h-full border-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.55094188279!2d106.5433806746619!3d-6.322558761867301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3f7ef24f297%3A0xe6a41e7a6394f94a!2sRINGLOCK%20INDONESIA%20-%20Pusat%20Scaffolding%20Jabodetabek!5e0!3m2!1sen!2sid!4v1782111812257!5m2!1sen!2sid"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                    <div id="container-dikirim" class="hidden space-y-4 pt-2">
                        <hr class="border-gray-100 mb-2">
                        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Detail Alamat Tujuan Proyek</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Contoh: Jawa Timur">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Kota / Kabupaten</label>
                                <input type="text" name="kota" id="kota" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Contoh: Surabaya">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Contoh: Lakarsantri">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Kelurahan / Desa</label>
                                <input type="text" name="kelurahan" id="kelurahan" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Contoh: Lidah Kulon">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all" placeholder="Contoh: 60213">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Detail Alamat (Nama Jalan, Blok, RT/RW)</label>
                            <textarea name="detail_alamat" id="detail_alamat" rows="3" class="block w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-900 focus:outline-none focus:border-[rgb(0,35,111)] transition-all resize-none" placeholder="Contoh: Jl. Raya Kali Rungkut No.25, RT.02/RW.03, Gudang Blok B-5"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="space-y-4">
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-xs space-y-4 sticky top-6">
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide border-b border-gray-100 pb-2">Ringkasan Permintaan</h2>
                    
                    <div id="checkout-items-list" class="max-h-64 overflow-y-auto space-y-3 pr-1 text-xs">
                        </div>

                    <div class="border-t border-gray-100 pt-4 space-y-2">
                        <div class="flex items-center justify-between text-xs text-gray-500 font-medium">
                            <span>Total Qty:</span>
                            <span id="summary-qty-total" class="font-bold text-gray-900">0 pcs</span>
                        </div>
                        <div class="flex flex-col gap-0.5 pt-2 border-t border-gray-100">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Estimasi Total Biaya:</span>
                            <span id="summary-price-total" class="text-lg font-black text-[rgb(0,35,111)]">Rp 0</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-[rgb(0,35,111)] hover:bg-blue-900 text-white text-xs font-bold rounded-xl shadow-md transition-colors duration-200 uppercase tracking-wider cursor-pointer mt-2">
                        Kirim Permintaan Harga
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            /* -----------------------------------------------
               LOGIKA DINAMIS: DI AMBIL VS DI KIRIM
            ----------------------------------------------- */
            const radioDiambil = document.getElementById('radio-diambil');
            const radioDikirim = document.getElementById('radio-dikirim');
            const boxDiambil   = document.getElementById('container-diambil');
            const boxDikirim   = document.getElementById('container-dikirim');

            // Ambil seluruh field input alamat kargo untuk manipulasi status required
            const addressFields = boxDikirim.querySelectorAll('input, textarea');

            function updateLogisticsView() {
                if (radioDiambil.checked) {
                    // Tampilkan info gudang & map, sembunyikan grid alamat kirim
                    boxDiambil.classList.remove('hidden');
                    boxDikirim.classList.add('hidden');

                    // Matikan status required agar form bisa dikirim tanpa isi alamat
                    addressFields.forEach(field => {
                        field.required = false;
                        field.value = ''; // Reset isi jika sebelumnya sempat mengetik
                    });
                } else if (radioDikirim.checked) {
                    // Tampilkan grid alamat kirim, sembunyikan info gudang
                    boxDikirim.classList.remove('hidden');
                    boxDiambil.classList.add('hidden');

                    // Wajibkan seluruh kolom diisi (Required) demi kevalidan data ekspedisi
                    addressFields.forEach(field => {
                        field.required = true;
                    });
                }
            }

            // Dengarkan perubahan pada kedua tombol opsi radio kustom
            radioDiambil.addEventListener('change', updateLogisticsView);
            radioDikirim.addEventListener('change', updateLogisticsView);


            /* -----------------------------------------------
               BACA DATA KERANJANG DARI STORAGE
            ----------------------------------------------- */
            const cart = JSON.parse(localStorage.getItem('ringlock_cart')) || [];
            const itemsListWrapper = document.getElementById('checkout-items-list');
            const summaryQty = document.getElementById('summary-qty-total');
            const summaryPrice = document.getElementById('summary-price-total');

            function formatRupiah(angka) {
                return String(angka).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            async function renderCheckoutSummary() {
                if (cart.length === 0) {
                    itemsListWrapper.innerHTML = `<p class="text-gray-400 italic text-center py-4">Tidak ada item di keranjang.</p>`;
                    return;
                }

                try {
                    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const response = await fetch('/produk/get-prices', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token || '' },
                        body: JSON.stringify({ items: cart })
                    });

                    const dbPrices = await response.json();
                    let totalQty = 0;
                    let totalCost = 0;

                    itemsListWrapper.innerHTML = cart.map(item => {
                        const match = dbPrices.find(db => 
                            db.name.toLowerCase().trim() === item.name.toLowerCase().trim() &&
                            (db.variant || '').toLowerCase().trim() === (item.variant || '').toLowerCase().trim()
                        );

                        const priceUnit = match ? match.price : 0;
                        const subTotal = priceUnit * item.qty;

                        totalQty += item.qty;
                        totalCost += subTotal;

                        return `
                            <div class="flex items-center justify-between p-2.5 bg-gray-50 rounded-lg border border-gray-100 gap-2">
                                <div class="min-w-0 flex-1">
                                    <p class="font-bold text-gray-900 truncate">${item.name}</p>
                                    ${item.variant ? `<p class="text-[10px] text-gray-400 font-medium">${item.variant}</p>` : ''}
                                    <p class="text-[10px] text-gray-400 font-normal mt-0.5">${item.qty} pcs x Rp ${formatRupiah(priceUnit)}</p>
                                </div>
                                <span class="font-bold text-gray-900 shrink-0">Rp ${formatRupiah(subTotal)}</span>
                            </div>
                        `;
                    }).join('');

                    summaryQty.textContent = `${totalQty} pcs`;
                    summaryPrice.textContent = `Rp ${formatRupiah(totalCost)}`;

                } catch (error) {
                    console.error("Gagal memuat ringkasan harga checkout:", error);
                }
            }

            renderCheckoutSummary();
        });
    </script>
</body>
</html>