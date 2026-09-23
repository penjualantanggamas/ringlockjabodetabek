/* ==============================================
   cart.js — Ringlock Indonesia
   Shopping Cart: Add to Cart, Cart UI, WA Checkout,
   + Variant Picker Modal untuk produk bervarian.

   Dependensi DOM (produk.html):
   Cart  : #cart-fab, #cart-badge, #cart-drawer,
           #cart-overlay, #cart-close-btn, #cart-body,
           #wa-checkout-btn, #cart-empty-hint
   Produk: #vertical-title, #panjang-aktif,
           #btn-add-vertical, #ledger-title,
           #panjang-ledger-aktif, #btn-add-ledger,
           .other-cart-btn, .card-title, #lainnya
   Picker: #vp-backdrop, #vp-modal
   ============================================== */

'use strict';

/* -----------------------------------------------
   STATE
----------------------------------------------- */
let cart = JSON.parse(localStorage.getItem('ringlock_cart')) || [];  // [{ id, name, variant, qty }]

/* -----------------------------------------------
   DOM REFS — resolved setelah DOMContentLoaded
----------------------------------------------- */
let DOM = {};

/* -----------------------------------------------
   VARIANT PICKER STATE
----------------------------------------------- */
let pickerContext = {
  name:     '',   // nama produk
  variants: [],   // array string ukuran
  triggerBtn: null, // tombol yang membuka picker (untuk feedback)
};

/* -----------------------------------------------
   LOCALSTORAGE STORAGE ENGINE
----------------------------------------------- */
function saveCartToStorage() {
    localStorage.setItem('ringlock_cart', JSON.stringify(cart));
}

function clearCartStorage() {
    localStorage.removeItem('ringlock_cart');
    cart = [];
    updateCartUI();
}

/* -----------------------------------------------
   VARIANT PICKER: showVariantPicker
----------------------------------------------- */
function showVariantPicker(name, variants, triggerBtn) {
  pickerContext = { name, variants, triggerBtn };

  const backdrop = document.getElementById('vp-backdrop');
  const modal    = document.getElementById('vp-modal');
  if (!backdrop || !modal) return;

  /* Render isi modal */
  modal.innerHTML = `
    <div class="sm:hidden w-10 h-1 bg-gray-200 rounded-full mx-auto mt-3 mb-1"></div>

    <div class="flex items-center justify-between px-5 pt-4 pb-3 border-b border-gray-100">
      <div>
        <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-widest mb-0.5">Pilih Ukuran</p>
        <h3 id="vp-title" class="font-extrabold text-brand-dark text-[17px] leading-tight">${escHtml(name)}</h3>
      </div>
      <button id="vp-close"
        class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 transition-colors shrink-0"
        aria-label="Tutup">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <div class="px-5 py-4">
      <div class="grid grid-cols-2 gap-2.5" id="vp-variant-grid">
        ${variants.map(v => `
          <button
            class="vp-variant-option w-full py-3 px-3 rounded-xl border-2 border-gray-200
                   hover:border-brand-dark hover:bg-brand-light
                   text-[13px] font-bold text-gray-700 hover:text-brand-dark
                   transition-all duration-150 text-center leading-snug"
            data-variant="${escHtml(v)}">
            ${escHtml(v)}
          </button>`).join('')}
      </div>
    </div>

    <p class="text-center text-[11px] text-gray-400 pb-5 px-5">
      Pilih ukuran untuk menambahkan ke keranjang permintaan.
    </p>`;

  backdrop.style.removeProperty('display');
  modal.style.removeProperty('display');

  requestAnimationFrame(() => {
    modal.classList.add('translate-y-0');
    modal.classList.remove('translate-y-full');
  });

  document.getElementById('vp-close')?.addEventListener('click', closeVariantPicker);

  modal.querySelectorAll('.vp-variant-option').forEach(optBtn => {
    optBtn.addEventListener('click', () => {
      const selectedVariant = optBtn.dataset.variant;

      modal.querySelectorAll('.vp-variant-option').forEach(b => {
        b.classList.remove('border-brand-dark', 'bg-brand-light', 'text-brand-dark');
        b.classList.add('border-gray-200', 'text-gray-700');
      });
      optBtn.classList.add('border-brand-dark', 'bg-brand-light', 'text-brand-dark');
      optBtn.classList.remove('border-gray-200', 'text-gray-700');

      /* FIX URUTAN LOGIKA DISINI */
      setTimeout(() => {
        const namaProdukTerpilih = pickerContext.name;
        const tombolPemicu = pickerContext.triggerBtn;

        closeVariantPicker();
        addToCart(namaProdukTerpilih, selectedVariant, tombolPemicu);
      }, 200);
    });
  });
}

function closeVariantPicker() {
  const backdrop = document.getElementById('vp-backdrop');
  const modal    = document.getElementById('vp-modal');
  if (backdrop) backdrop.style.display = 'none';
  if (modal)    modal.style.display    = 'none';
  pickerContext = { name: '', variants: [], triggerBtn: null };
}

/* -----------------------------------------------
   HELPERS
----------------------------------------------- */
function makeId(name, variant) {
  return (name + '||' + (variant || '')).toLowerCase().trim();
}

function totalQty() {
  return cart.reduce((sum, item) => sum + item.qty, 0);
}

/* -----------------------------------------------
   CORE LOGIC
----------------------------------------------- */
function addToCart(name, variant, btn) {
  const id = makeId(name, variant);
  const existing = cart.find(item => item.id === id);

  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ id, name, variant: variant || '', qty: 1 });
  }

  saveCartToStorage();
  updateCartUI();
  flashButton(btn);
  animateBadge();
}

function removeFromCart(id) {
  cart = cart.filter(item => item.id !== id);
  saveCartToStorage();
  updateCartUI();
}

function changeQty(id, delta) {
  const item = cart.find(i => i.id === id);
  if (!item) return;
  item.qty += delta;
  if (item.qty <= 0) removeFromCart(id);
  else {
    saveCartToStorage();
    updateCartUI();
  }
}

/* -----------------------------------------------
   UI: updateCartUI
   (Catatan: harga TIDAK ditampilkan di keranjang — sudah tidak lagi
   fetch ke /produk/get-prices, cukup render nama produk, varian, & qty)
----------------------------------------------- */
function updateCartUI() {
  const qty = totalQty();

  if (qty > 0) {
    DOM.badge.textContent = qty > 99 ? '99+' : qty;
    DOM.badge.classList.remove('hidden');
  } else {
    DOM.badge.classList.add('hidden');
  }

  if (cart.length === 0) {
    DOM.cartBody.innerHTML = `
      <div class="flex flex-col items-center justify-center h-full py-16 gap-4 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
          <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 9h12.6
                 M9 22a1 1 0 100-2 1 1 0 000 2zm10 0a1 1 0 100-2 1 1 0 000 2z"/>
          </svg>
        </div>
        <p class="text-gray-400 text-[14px] font-medium">Keranjang masih kosong.</p>
        <p class="text-gray-300 text-[12px]">Tambahkan produk dari halaman ini.</p>
      </div>`;
    DOM.emptyHint.classList.remove('hidden');
    DOM.waBtn.disabled = true;
    return;
  }

  DOM.emptyHint.classList.add('hidden');
  DOM.waBtn.disabled = false;

  DOM.cartBody.innerHTML = cart.map(item => {
    return `
      <div class="cart-item flex items-start gap-3 bg-gray-50 rounded-xl p-3 border border-gray-100" data-id="${escHtml(item.id)}">
        <div class="w-10 h-10 bg-brand-light rounded-lg flex items-center justify-center shrink-0">
          <svg class="w-5 h-5 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 3h4v18H3V3zm7 0h4v18h-4V3zm7 4h4v14h-4V7z"/>
          </svg>
        </div>

        <div class="flex-1 min-w-0">
          <p class="font-bold text-brand-dark text-[13px] leading-snug truncate">${escHtml(item.name)}</p>
          ${item.variant ? `<p class="text-[11px] text-gray-400 font-medium mt-0.5">${escHtml(item.variant)}</p>` : ''}

          <div class="flex items-center gap-2 mt-2">
            <button class="qty-btn w-6 h-6 rounded-md bg-white border border-gray-200 hover:border-brand-dark flex items-center justify-center text-gray-600 hover:text-brand-dark transition-colors text-[14px] font-bold" data-action="dec" data-id="${escHtml(item.id)}">−</button>
            <input type="number" min="1" class="qty-input w-12 h-6 rounded-md bg-white border border-gray-200 text-center text-[13px] font-extrabold text-brand-dark focus:outline-none focus:border-brand-dark" data-id="${escHtml(item.id)}" value="${item.qty}">
            <button class="qty-btn w-6 h-6 rounded-md bg-white border border-gray-200 hover:border-brand-dark flex items-center justify-center text-gray-600 hover:text-brand-dark transition-colors text-[14px] font-bold" data-action="inc" data-id="${escHtml(item.id)}">+</button>
            <span class="text-[11px] text-gray-400 ml-0.5">pcs</span>
          </div>
        </div>

        <button class="remove-btn w-7 h-7 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-400 hover:text-red-600 transition-colors shrink-0" data-id="${escHtml(item.id)}">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
        </button>
      </div>`;
  }).join('');

  DOM.cartBody.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const delta = btn.dataset.action === 'inc' ? 1 : -1;
      changeQty(btn.dataset.id, delta);
    });
  });

  DOM.cartBody.querySelectorAll('.qty-input').forEach(input => {
    input.addEventListener('change', (e) => {
      let val = parseInt(e.target.value);
      const id = input.dataset.id;
      if (isNaN(val) || val < 1) val = 1;

      const item = cart.find(i => i.id === id);
      if (item) {
        item.qty = val;
        saveCartToStorage();
        updateCartUI();
      }
    });

    input.addEventListener('keydown', (e) => {
      if (['-', '+', 'e', 'E'].includes(e.key)) e.preventDefault();
    });
  });

  DOM.cartBody.querySelectorAll('.remove-btn').forEach(btn => {
    btn.addEventListener('click', () => removeFromCart(btn.dataset.id));
  });
}

/* -----------------------------------------------
   UI: Drawer open / close
----------------------------------------------- */
function openDrawer() {
  DOM.drawer.classList.add('open');
  DOM.overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeDrawer() {
  DOM.drawer.classList.remove('open');
  DOM.overlay.classList.remove('open');
  document.body.style.overflow = '';
}

/* -----------------------------------------------
   UI: Button feedback
----------------------------------------------- */
function flashButton(btn) {
  if (!btn) return;
  const originalHTML = btn.innerHTML;
  const originalClass = btn.className;

  btn.innerHTML = `
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
    </svg>
    Ditambahkan!`;
  btn.classList.add('btn-added');
  btn.disabled = true;

  setTimeout(() => {
    btn.innerHTML = originalHTML;
    btn.className = originalClass;
    btn.disabled = false;
  }, 1500);
}

function animateBadge() {
  DOM.badge.classList.remove('badge-pop');
  void DOM.badge.offsetWidth;
  DOM.badge.classList.add('badge-pop');
}

/* -----------------------------------------------
   CHECKOUT: sendToWhatsApp
   Klik tombol keranjang -> buka WhatsApp dengan daftar produk
   yang sudah dipilih, BUKAN redirect ke halaman checkout/login.
----------------------------------------------- */
function sendToWhatsApp(e) {
  if (e) e.preventDefault(); // batalkan navigasi bawaan tag <a href="...">

  if (cart.length === 0) return;

  const nomorWhatsApp = '628123651717'; // sama dengan tombol WA lain di halaman ini

  const daftarProduk = cart.map((item, index) => {
    const variantText = item.variant ? ` (${item.variant})` : '';
    return `${index + 1}. ${item.name}${variantText} - ${item.qty} pcs`;
  }).join('\n');

  const pesan =
    `Halo Scaffolding Ringlock Tangerang, saya ingin menanyakan produk berikut:\n\n` +
    `${daftarProduk}\n\n` +
    `Mohon informasi selanjutnya. Terima kasih.`;

  const url = `https://wa.me/${nomorWhatsApp}?text=${encodeURIComponent(pesan)}`;
  window.open(url, '_blank', 'noopener');
}

/* -----------------------------------------------
   SECURITY: escape HTML
----------------------------------------------- */
function escHtml(str) {
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

/* -----------------------------------------------
   VARIANT SELECTOR: Vertical (Ringlock Standard)
----------------------------------------------- */
function initVerticalVariants() {
  const mainImg       = document.getElementById('main-product-img');
  const panjangLabel  = document.getElementById('panjang-aktif');
  const variantBtns   = document.querySelectorAll('.variant-btn');

  if (!mainImg || !variantBtns.length) return;

  variantBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      const ukuranBaru  = this.dataset.ukuran;
      const gambarBaru  = this.dataset.gambar;
      const imgKecil    = this.querySelector('.variant-img');
      const txtKecil    = this.querySelector('.variant-txt');

      const ukuranLama  = panjangLabel.textContent.trim();
      const gambarLama  = mainImg.src;

      mainImg.style.opacity = '0.2';
      setTimeout(() => {
        mainImg.src           = gambarBaru;
        mainImg.style.opacity = '1';
        panjangLabel.textContent = ukuranBaru;
      }, 150);

      this.dataset.ukuran = ukuranLama;
      this.dataset.gambar = gambarLama;
      imgKecil.src        = gambarLama;
      txtKecil.textContent= ukuranLama;
    });
  });
}

/* -----------------------------------------------
   VARIANT SELECTOR: Horizontal (Ringlock Ledger)
----------------------------------------------- */
function initLedgerVariants() {
  const mainImg      = document.getElementById('main-ledger-img');
  const panjangLabel = document.getElementById('panjang-ledger-aktif');
  const variantBtns  = document.querySelectorAll('.ledger-variant-btn');

  if (!mainImg || !variantBtns.length) return;

  function setActive(activeBtn) {
    variantBtns.forEach(b => {
      b.querySelector('.variant-thumb').classList.remove('border-blue-500');
      b.querySelector('.variant-thumb').classList.add('border-transparent');
      b.querySelector('.variant-txt').classList.remove('text-blue-600');
      b.querySelector('.variant-txt').classList.add('text-gray-500');
    });
    activeBtn.querySelector('.variant-thumb').classList.add('border-blue-500');
    activeBtn.querySelector('.variant-thumb').classList.remove('border-transparent');
    activeBtn.querySelector('.variant-txt').classList.add('text-blue-600');
    activeBtn.querySelector('.variant-txt').classList.remove('text-gray-500');
  }

  variantBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const ukuran = btn.dataset.ukuran;
      const gambar = btn.dataset.gambar;

      mainImg.style.opacity = '0';
      setTimeout(() => {
        mainImg.src           = gambar;
        mainImg.alt           = 'Ringlock Ledger ' + ukuran;
        mainImg.style.opacity = '1';
        panjangLabel.textContent = ukuran;
      }, 150);

      setActive(btn);
    });
  });

  setActive(variantBtns[0]);
}

/* -----------------------------------------------
   INIT
----------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {

  DOM = {
    fab:       document.getElementById('cart-fab'),
    badge:     document.getElementById('cart-badge'),
    drawer:    document.getElementById('cart-drawer'),
    overlay:   document.getElementById('cart-overlay'),
    closeBtn:  document.getElementById('cart-close-btn'),
    cartBody:  document.getElementById('cart-body'),
    waBtn:     document.getElementById('wa-checkout-btn'),
    emptyHint: document.getElementById('cart-empty-hint'),
  };

  DOM.fab.addEventListener('click', openDrawer);
  DOM.closeBtn.addEventListener('click', closeDrawer);
  DOM.overlay.addEventListener('click', closeDrawer);
  DOM.waBtn.addEventListener('click', sendToWhatsApp);

  const btnVertical = document.getElementById('btn-add-vertical');
  if (btnVertical) {
    btnVertical.addEventListener('click', () => {
      const name    = document.getElementById('vertical-title')?.textContent?.trim() || 'Ringlock Standard';
      const variant = document.getElementById('panjang-aktif')?.textContent?.trim() || '';
      addToCart(name, variant, btnVertical);
    });
  }

  const btnLedger = document.getElementById('btn-add-ledger');
  if (btnLedger) {
    btnLedger.addEventListener('click', () => {
      const name    = document.getElementById('ledger-title')?.textContent?.trim() || 'Ringlock Ledger';
      const variant = document.getElementById('panjang-ledger-aktif')?.textContent?.trim() || '';
      addToCart(name, variant, btnLedger);
    });
  }

  const lainnyaSection = document.getElementById('lainnya');
  if (lainnyaSection) {
    lainnyaSection.addEventListener('click', e => {
      const btn = e.target.closest('.other-cart-btn');
      if (!btn) return;

      const card = btn.closest('.other-card');
      const name = btn.dataset.name || card?.querySelector('.card-title')?.textContent?.trim() || 'Produk';

      if (btn.dataset.hasVariants === 'true') {
        let variants = [];
        try {
          variants = JSON.parse(btn.dataset.variants || '[]');
        } catch {
          variants = [];
        }
        showVariantPicker(name, variants, btn);
      } else {
        addToCart(name, '', btn);
      }
    });
  }

  const vpBackdrop = document.getElementById('vp-backdrop');
  if (vpBackdrop) {
    vpBackdrop.addEventListener('click', e => {
      if (e.target === vpBackdrop) closeVariantPicker();
    });
  }

  document.addEventListener('keydown', e => {
    if (e.key !== 'Escape') return;
    const modal = document.getElementById('vp-modal');
    if (modal && modal.style.display !== 'none') {
      closeVariantPicker();
    } else {
      closeDrawer();
    }
  });

  initVerticalVariants();
  initLedgerVariants();

  updateCartUI();
});