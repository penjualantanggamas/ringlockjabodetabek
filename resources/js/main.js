/* ==============================================
   main.js — Ringlock Indonesia
   Fungsionalitas interaktif: mobile menu toggle
   dan navbar shadow on scroll.
   ============================================== */


/* -----------------------------------------------
   MOBILE MENU TOGGLE
   Animasi hamburger → X saat menu dibuka.
   ----------------------------------------------- */

const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const hamLines   = hamburger.querySelectorAll('.ham-line');
let menuOpen = false;

hamburger.addEventListener('click', () => {
  menuOpen = !menuOpen;
  mobileMenu.classList.toggle('open', menuOpen);

  // Animasi ikon hamburger → X
  if (menuOpen) {
    hamLines[0].style.transform = 'translateY(7px) rotate(45deg)';
    hamLines[1].style.opacity   = '0';
    hamLines[2].style.transform = 'translateY(-7px) rotate(-45deg)';
    hamLines[2].style.width     = '24px';
  } else {
    hamLines[0].style.transform = '';
    hamLines[1].style.opacity   = '';
    hamLines[2].style.transform = '';
    hamLines[2].style.width     = '';
  }
});

// Tutup menu otomatis saat salah satu link diklik
mobileMenu.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    menuOpen = false;
    mobileMenu.classList.remove('open');
    hamLines[0].style.transform = '';
    hamLines[1].style.opacity   = '';
    hamLines[2].style.transform = '';
    hamLines[2].style.width     = '';
  });
});


/* -----------------------------------------------
   NAVBAR SCROLL SHADOW
   Tambah shadow lebih tebal saat halaman di-scroll.
   ----------------------------------------------- */

const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
  if (window.scrollY > 10) {
    navbar.classList.add('shadow-md');
    navbar.classList.remove('shadow-sm');
  } else {
    navbar.classList.remove('shadow-md');
    navbar.classList.add('shadow-sm');
  }
});


  const variantButtons = document.querySelectorAll('.variant-btn');
  const panjangAktifText = document.getElementById('panjang-aktif');
  const mainProductImg = document.getElementById('main-product-img');

  variantButtons.forEach(button => {
    button.addEventListener('click', function() {
      // 1. Ambil data yang sedang aktif di atas sebelum ditukar
      const ukuranLama = panjangAktifText.getAttribute('data-ukuran');
      const gambarLamaFull = panjangAktifText.getAttribute('data-gambar');
      const srcGambarKecilLama = mainProductImg.src;

      // 2. Ambil data baru dari varian yang di-klik
      const ukuranBaru = this.getAttribute('data-ukuran');
      const gambarBaruFull = this.getAttribute('data-gambar');
      const imgTargetKecil = this.querySelector('.variant-img');
      const txtTargetKecil = this.querySelector('.variant-txt');

      // 3. Efek Animasi Transisi Memudar
      mainProductImg.style.opacity = '0.3';
      
      setTimeout(() => {
        // Taruh data baru ke display utama (Atas dan Kanan)
        panjangAktifText.textContent = ukuranBaru;
        panjangAktifText.setAttribute('data-ukuran', ukuranBaru);
        panjangAktifText.setAttribute('data-gambar', gambarBaruFull);
        mainProductImg.src = gambarBaruFull;
        mainProductImg.style.opacity = '1';

        // Taruh data lama ke kotak varian bawah yang diklik (Tukar Tempat)
        this.setAttribute('data-ukuran', ukuranLama);
        this.setAttribute('data-gambar', gambarLamaFull);
        txtTargetKecil.textContent = ukuranLama;
        imgTargetKecil.src = srcGambarKecilLama;
      }, 150);
    });
  });


  (function () {
    const mainImg      = document.getElementById('main-ledger-img');
    const panjangLabel = document.getElementById('panjang-ledger-aktif');
    const variantBtns  = document.querySelectorAll('.ledger-variant-btn');
 
    // Helper: set active state on a button's thumb wrapper
    function setActive(btn) {
      variantBtns.forEach(b => {
        b.querySelector('.variant-thumb').classList.remove('border-blue-500');
        b.querySelector('.variant-thumb').classList.add('border-transparent');
        b.querySelector('.variant-txt').classList.remove('text-blue-600');
        b.querySelector('.variant-txt').classList.add('text-gray-500');
      });
      btn.querySelector('.variant-thumb').classList.add('border-blue-500');
      btn.querySelector('.variant-thumb').classList.remove('border-transparent');
      btn.querySelector('.variant-txt').classList.add('text-blue-600');
      btn.querySelector('.variant-txt').classList.remove('text-gray-500');
    }
 
    variantBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const ukuran = btn.dataset.ukuran;
        const gambar = btn.dataset.gambar;
 
        // Swap main image with fade
        mainImg.style.opacity = '0';
        setTimeout(() => {
          mainImg.src = gambar;
          mainImg.alt = 'Ringlock Ledger ' + ukuran;
          mainImg.style.opacity = '1';
        }, 150);
 
        // Update spec label
        panjangLabel.textContent = ukuran;
 
        // Update active state
        setActive(btn);
      });
    });
 
    // Set first variant active on load
    if (variantBtns.length) setActive(variantBtns[0]);
  })();