/* =========================================================
   OUTDO SYSTEM — about.js
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  /* ---- Preloader ---- */
  setTimeout(() => {
    const pre = document.getElementById("preloader");
    if (pre) pre.classList.add("hide");
  }, 1600);

  /* ---- AOS ---- */
  AOS.init({ duration: 700, easing: "ease-out-cubic", once: true, offset: 60 });

  /* ---- Navbar Scroll ---- */
  const nav = document.getElementById("mainNav");
  const btt = document.getElementById("backToTop");
  window.addEventListener(
    "scroll",
    () => {
      if (window.scrollY > 60) {
        nav.classList.add("scrolled");
        btt && btt.classList.add("visible");
      } else {
        nav.classList.remove("scrolled");
        btt && btt.classList.remove("visible");
      }
    },
    { passive: true },
  );

  /* ---- Smooth scroll ---- */
  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
      const t = document.querySelector(a.getAttribute("href"));
      if (!t) return;
      e.preventDefault();
      window.scrollTo({
        top: t.getBoundingClientRect().top + window.scrollY - 80,
        behavior: "smooth",
      });
      const nc = document.getElementById("navbarNav");
      if (nc && nc.classList.contains("show")) {
        const b = bootstrap.Collapse.getInstance(nc);
        if (b) b.hide();
      }
    });
  });

  /* ---- Counter Animation ---- */
  const counters = document.querySelectorAll(".counter");
  const cObs = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (!e.isIntersecting) return;
        const el = e.target;
        const target = parseInt(el.dataset.target);
        const step = target / (2000 / 16);
        let cur = 0;
        const tick = () => {
          cur += step;
          if (cur >= target) {
            el.textContent = target;
            return;
          }
          el.textContent = Math.floor(cur);
          requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
        cObs.unobserve(el);
      });
    },
    { threshold: 0.5 },
  );
  counters.forEach((c) => cObs.observe(c));

  /* ---- Skill Bars Animation ---- */
  const fills = document.querySelectorAll(".si-fill");
  const sObs = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add("animated");
          sObs.unobserve(e.target);
        }
      });
    },
    { threshold: 0.4 },
  );
  fills.forEach((f) => sObs.observe(f));

  /* ---- Testimonial Swiper ---- */
  new Swiper(".testiSwiper", {
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: {
      prevEl: ".swiper-button-prev",
      nextEl: ".swiper-button-next",
    },
    slidesPerView: 1,
    spaceBetween: 24,
    breakpoints: {
      768: { slidesPerView: 2 },
      1200: { slidesPerView: 3 },
    },
  });

  /* ---- Active nav style injection ---- */
  const s = document.createElement("style");
  s.textContent = `
    .navbar-nav .nav-link.active { color: #e31e24 !important; }
    .navbar-nav .nav-link.active::after { width: calc(100% - 28px); }
  `;
  document.head.appendChild(s);
});

document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname.split("/").pop();

  document.querySelectorAll(".navbar .nav-link").forEach((link) => {
    const linkPage = link.getAttribute("href");

    if (linkPage === currentPage) {
      link.classList.add("active");
    }
  });
});

function handleLogoFormSubmit(e) {
  e.preventDefault();
  const btn = document.getElementById("contactSubmitBtn");
  const original = btn.innerHTML;
  btn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Message Sent!';
  btn.style.background = "linear-gradient(135deg,#22c55e,#15803d)";
  btn.disabled = true;
  setTimeout(() => {
    btn.innerHTML = original;
    btn.style.background = "";
    btn.disabled = false;
    document
      .querySelector(".contact-form")
      .querySelectorAll("input, textarea, select")
      .forEach((el) => (el.value = ""));
  }, 3500);
}

  // FAQ accordion (from service-web-development.js pattern)
  document.querySelectorAll('.faq-item').forEach(item => {
    item.querySelector('.faq-question').addEventListener('click', () => {
      document.querySelectorAll('.faq-item').forEach(o => { if (o !== item) o.classList.remove('active'); });
      item.classList.toggle('active');
    });
  });