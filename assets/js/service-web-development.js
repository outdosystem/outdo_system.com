/* =========================================================
   OUTDO SYSTEM — service-web-development.js
   Web Development Service Page Interactions
   ========================================================= */

document.addEventListener('DOMContentLoaded', () => {
  // ========== PRELOADER ==========
  setTimeout(() => {
    const preloader = document.getElementById('preloader');
    if (preloader) {
      preloader.classList.add('hide');
    }
  }, 1600);

  // ========== AOS INITIALIZATION ==========
  AOS.init({
    duration: 700,
    easing: 'ease-out-cubic',
    once: true,
    offset: 60,
  });

  // ========== NAVBAR SCROLL EFFECT ==========
  const navbar = document.getElementById('mainNav');
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // ========== SMOOTH SCROLL ==========
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href === '#') return;

      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        window.scrollTo({
          top: target.getBoundingClientRect().top + window.scrollY - 80,
          behavior: 'smooth',
        });

        // Close mobile navbar
        const navbarCollapse = document.getElementById('navbarNav');
        if (navbarCollapse && navbarCollapse.classList.contains('show')) {
          const bsCollapse = new bootstrap.Collapse(navbarCollapse);
          bsCollapse.hide();
        }
      }
    });
  });

  // ========== FAQ ACCORDION ==========
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach((item) => {
    const question = item.querySelector('.faq-question');
    question.addEventListener('click', () => {
      // Close other items
      faqItems.forEach((otherItem) => {
        if (otherItem !== item && otherItem.classList.contains('active')) {
          otherItem.classList.remove('active');
        }
      });

      // Toggle current item
      item.classList.toggle('active');
    });
  });

  // ========== BACK TO TOP BUTTON ==========
  const backToTop = document.getElementById('backToTop');
  if (backToTop) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    });

    backToTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  }

  // ========== CONTACT FORM HANDLING ==========
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // Get form data
      const formData = new FormData(contactForm);
      const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        phone: formData.get('phone'),
        service: formData.get('service'),
        message: formData.get('message'),
      };

      // Validate
      if (!data.name || !data.email || !data.phone || !data.message) {
        showNotification('Please fill in all required fields', 'error');
        return;
      }

      // Simulate form submission
      // In production, this would send data to a backend server
      console.log('Form submitted with data:', data);

      // Show success message
      showNotification(
        'Thank you! Your message has been sent successfully. We will contact you soon.',
        'success'
      );

      // Reset form
      contactForm.reset();
    });
  }

  // ========== NOTIFICATION SYSTEM ==========
  function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.style.cssText = `
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
      color: white;
      padding: 16px 24px;
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      z-index: 10000;
      max-width: 400px;
      animation: slideIn 0.3s ease-out;
      font-size: 0.95rem;
      font-weight: 500;
    `;
    notification.textContent = message;

    document.body.appendChild(notification);

    // Remove after 4 seconds
    setTimeout(() => {
      notification.style.animation = 'slideOut 0.3s ease-out';
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 4000);
  }

  // ========== NAVBAR ACTIVE LINK ==========
  // Set active nav link based on current page
  const currentLocation = location.pathname;
  const menuItems = document.querySelectorAll('.navbar-nav a.nav-link');
  menuItems.forEach((menu) => {
    if (
      menu.getAttribute('href') === currentLocation ||
      menu.getAttribute('href').includes('service')
    ) {
      menu.classList.add('active');
    }
  });

  // ========== COUNTER ANIMATION ==========
  // Animate numbers on scroll into view
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length > 0) {
    const observerOptions = {
      threshold: 0.5,
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const target = entry.target;
          const startValue = 0;
          const endValue = parseInt(target.getAttribute('data-count'));
          const duration = 2000;
          const startTime = Date.now();

          const animate = () => {
            const now = Date.now();
            const progress = Math.min((now - startTime) / duration, 1);
            const current = Math.floor(startValue + (endValue - startValue) * progress);
            target.textContent = current.toLocaleString();

            if (progress < 1) {
              requestAnimationFrame(animate);
            }
          };

          animate();
          observer.unobserve(target);
        }
      });
    }, observerOptions);

    counters.forEach((counter) => {
      observer.observe(counter);
    });
  }

  // ========== GALLERY LIGHTBOX SIMULATION ==========
  const galleryItems = document.querySelectorAll('.gallery-item');
  galleryItems.forEach((item) => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      const img = item.querySelector('img');
      const title = item.querySelector('.gallery-overlay h4');
      const description = item.querySelector('.gallery-overlay p');

      // In production, this would open a proper lightbox
      console.log('Gallery item clicked:', {
        image: img.src,
        title: title.textContent,
        description: description.textContent,
      });

      showNotification(
        `Gallery preview: ${title.textContent} - In production, this would open in a lightbox.`,
        'info'
      );
    });
  });

  // ========== SCROLL ANIMATIONS FOR INTERACTIVE ELEMENTS ==========
  // Add subtle animation on hover for buttons
  const buttons = document.querySelectorAll(
    '.btn-red, .btn-outline-dark-custom, .btn-white-red, .btn-outline-cta'
  );
  buttons.forEach((button) => {
    button.addEventListener('mouseenter', function () {
      if (!this.classList.contains('no-hover-effect')) {
        this.style.transition = 'all 0.3s ease';
      }
    });
  });

  // ========== FORM SELECT STYLING ==========
  const selectElement = document.getElementById('service');
  if (selectElement) {
    selectElement.addEventListener('change', function () {
      if (this.value) {
        this.style.color = 'var(--text)';
      } else {
        this.style.color = 'var(--text-light)';
      }
    });
  }

  // ========== MOBILE MENU CLOSE ON LINK CLICK ==========
  const navLinks2 = document.querySelectorAll('.navbar-nav .nav-link');
  navLinks2.forEach((link) => {
    link.addEventListener('click', () => {
      const navbar = document.getElementById('navbarNav');
      if (navbar && navbar.classList.contains('show')) {
        const bsCollapse = new bootstrap.Collapse(navbar);
        bsCollapse.hide();
      }
    });
  });
});

// ========== ANIMATIONS & UTILITIES ==========
// Add keyframe animations dynamically
const style = document.createElement('style');
style.textContent = `
  @keyframes slideIn {
    from {
      transform: translateX(400px);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes slideOut {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(400px);
      opacity: 0;
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 768px) {
    .notification {
      right: 15px !important;
      left: 15px !important;
      max-width: none !important;
    }
  }
`;
document.head.appendChild(style);
