/* ==============================================
   artikel.js — Ringlock Indonesia Blog Page
   Features:
   1. Navbar mobile menu toggle
   2. Navbar scroll shadow
   3. Reading progress bar
   4. Scroll-to-top button
   ============================================== */

'use strict';

/* -----------------------------------------------
   1. NAVBAR — Mobile Menu Toggle
----------------------------------------------- */
const hamburger  = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const hamLines   = hamburger ? hamburger.querySelectorAll('.ham-line') : [];
let menuOpen = false;

function openMobileMenu() {
  menuOpen = true;
  mobileMenu.classList.add('open');
  hamLines[0].style.transform = 'translateY(7px) rotate(45deg)';
  hamLines[1].style.opacity   = '0';
  hamLines[2].style.transform = 'translateY(-7px) rotate(-45deg)';
  if (hamLines[2]) hamLines[2].style.width = '24px';
}

function closeMobileMenu() {
  menuOpen = false;
  mobileMenu.classList.remove('open');
  if (hamLines[0]) {
    hamLines[0].style.transform = '';
    hamLines[1].style.opacity   = '';
    hamLines[2].style.transform = '';
    hamLines[2].style.width     = '';
  }
}

if (hamburger) {
  hamburger.addEventListener('click', () => menuOpen ? closeMobileMenu() : openMobileMenu());
}

if (mobileMenu) {
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });
}


/* -----------------------------------------------
   2. NAVBAR — Scroll shadow
----------------------------------------------- */
const navbar = document.getElementById('navbar');

if (navbar) {
  window.addEventListener('scroll', () => {
    navbar.style.boxShadow = window.scrollY > 10
      ? '0 2px 20px rgba(0,0,0,0.10)'
      : '0 1px 3px rgba(0,0,0,0.05)';
  }, { passive: true });
}


/* -----------------------------------------------
   3. READING PROGRESS BAR
   Inject a thin bar at the very top of the page.
----------------------------------------------- */
const progressBar = document.createElement('div');
progressBar.id = 'reading-progress';
document.body.prepend(progressBar);

function updateProgress() {
  const scrollTop    = window.scrollY;
  const docHeight    = document.documentElement.scrollHeight - window.innerHeight;
  const scrolled     = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
  progressBar.style.width = Math.min(scrolled, 100) + '%';
}

window.addEventListener('scroll', updateProgress, { passive: true });
updateProgress(); // init on load


/* -----------------------------------------------
   4. SCROLL-TO-TOP BUTTON
   Appears after scrolling 400px.
----------------------------------------------- */
const scrollTopBtn = document.createElement('button');
scrollTopBtn.id          = 'scroll-top';
scrollTopBtn.ariaLabel   = 'Kembali ke atas';
scrollTopBtn.innerHTML   = `
  <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
  </svg>`;
document.body.appendChild(scrollTopBtn);

window.addEventListener('scroll', () => {
  if (window.scrollY > 400) {
    scrollTopBtn.classList.add('visible');
  } else {
    scrollTopBtn.classList.remove('visible');
  }
}, { passive: true });

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});