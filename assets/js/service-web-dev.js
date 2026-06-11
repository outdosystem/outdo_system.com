/* =========================================================
   OUTDO SYSTEM — service-web-dev.js
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Preloader ---- */
  setTimeout(() => {
    const pre = document.getElementById('preloader');
    if (pre) pre.classList.add('hide');
  }, 1600);

  /* ---- AOS ---- */
  AOS.init({ duration: 700, easing: 'ease-out-cubic', once: true, offset: 60 });

  /* ---- Navbar + Back-to-top on scroll ---- */
  const nav = document.getElementById('mainNav');
  const btt = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
      nav.classList.add('scrolled');
      btt && btt.classList.add('visible');
    } else {
      nav.classList.remove('scrolled');
      btt && btt.classList.remove('visible');
    }
  }, { passive: true });

  /* ---- Smooth scroll ---- */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      window.scrollTo({ top: target.getBoundingClientRect().top + window.scrollY - 80, behavior: 'smooth' });
      // close mobile nav
      const nc = document.getElementById('navbarNav');
      if (nc && nc.classList.contains('show')) {
        const b = bootstrap.Collapse.getInstance(nc);
        if (b) b.hide();
      }
    });
  });

  /* ---- Counter Animation ---- */
  const counters = document.querySelectorAll('.counter');
  const cObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const target = parseInt(el.dataset.target);
      const step = target / (2000 / 16);
      let cur = 0;
      const tick = () => {
        cur += step;
        if (cur >= target) { el.textContent = target; return; }
        el.textContent = Math.floor(cur);
        requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
      cObs.unobserve(el);
    });
  }, { threshold: 0.5 });
  counters.forEach(c => cObs.observe(c));

  /* ---- Testimonial Swiper ---- */
  new Swiper('.testiSwiper', {
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { prevEl: '.swiper-button-prev', nextEl: '.swiper-button-next' },
    slidesPerView: 1,
    spaceBetween: 24,
    breakpoints: {
      768: { slidesPerView: 2 },
      1200: { slidesPerView: 3 },
    },
  });

  /* ---- Active nav style ---- */
  const s = document.createElement('style');
  s.textContent = `.navbar-nav .nav-link.active{color:#e31e24!important}.navbar-nav .nav-link.active::after{width:calc(100% - 28px)}`;
  document.head.appendChild(s);

});
