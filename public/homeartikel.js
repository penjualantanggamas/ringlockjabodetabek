/* ==============================================
   homeartikel.js — Ringlock Indonesia Blog Index
   Features:
   1. Navbar mobile menu toggle + scroll shadow
   2. Category filter (pill buttons ↔ article cards)
   3. Reading progress bar
   4. Scroll-to-top button
   ============================================== */

'use strict';

/* -----------------------------------------------
   1. NAVBAR — Mobile menu toggle
----------------------------------------------- */
const hamburger  = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const hamLines   = hamburger ? hamburger.querySelectorAll('.ham-line') : [];
let menuOpen = false;

function openMenu() {
  menuOpen = true;
  mobileMenu.classList.add('open');
  if (hamLines[0]) {
    hamLines[0].style.transform = 'translateY(7px) rotate(45deg)';
    hamLines[1].style.opacity   = '0';
    hamLines[2].style.transform = 'translateY(-7px) rotate(-45deg)';
    hamLines[2].style.width     = '24px';
  }
}
function closeMenu() {
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
  hamburger.addEventListener('click', () => menuOpen ? closeMenu() : openMenu());
}
if (mobileMenu) {
  mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));
}


/* -----------------------------------------------
   NAVBAR — Scroll shadow
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
   2. CATEGORY FILTER
   Each .filter-btn has data-filter attribute.
   Each .article-card has data-category attribute.
   "semua" shows all cards.
----------------------------------------------- */
const filterBtns   = document.querySelectorAll('.filter-btn');
const articleCards = document.querySelectorAll('.article-card');
const emptyState   = document.getElementById('empty-state');

function applyFilter(selectedFilter) {
  let visibleCount = 0;

  articleCards.forEach(card => {
    const category = card.dataset.category;
    const matches  = selectedFilter === 'semua' || category === selectedFilter;

    if (matches) {
      card.classList.remove('hiding');
      // Re-trigger animation
      card.style.animation = 'none';
      card.offsetHeight;  // force reflow
      card.style.animation = '';
      visibleCount++;
    } else {
      card.classList.add('hiding');
    }
  });

  // Show/hide empty state
  if (emptyState) {
    emptyState.classList.toggle('hidden', visibleCount > 0);
  }

  // Update active button styles
  filterBtns.forEach(btn => {
    if (btn.dataset.filter === selectedFilter) {
      btn.classList.add('active-filter');
    } else {
      btn.classList.remove('active-filter');
    }
  });
}

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => applyFilter(btn.dataset.filter));
});

// Init: show all
applyFilter('semua');


/* -----------------------------------------------
   3. READING PROGRESS BAR
----------------------------------------------- */
const progressBar = document.createElement('div');
progressBar.id = 'reading-progress';
document.body.prepend(progressBar);

function updateProgress() {
  const scrollTop  = window.scrollY;
  const docHeight  = document.documentElement.scrollHeight - window.innerHeight;
  const pct        = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
  progressBar.style.width = Math.min(pct, 100) + '%';
}
window.addEventListener('scroll', updateProgress, { passive: true });
updateProgress();


/* -----------------------------------------------
   4. SCROLL-TO-TOP BUTTON
----------------------------------------------- */
const scrollBtn = document.createElement('button');
scrollBtn.id          = 'scroll-top';
scrollBtn.ariaLabel   = 'Kembali ke atas';
scrollBtn.innerHTML   = `
  <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
  </svg>`;
document.body.appendChild(scrollBtn);

window.addEventListener('scroll', () => {
  scrollBtn.classList.toggle('visible', window.scrollY > 400);
}, { passive: true });

scrollBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});