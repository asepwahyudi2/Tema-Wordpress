document.addEventListener('DOMContentLoaded', function () {
  var menuToggle = document.querySelector('.menu-toggle');
  var mainNav = document.querySelector('.main-nav');
  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', function () {
      mainNav.classList.toggle('active');
      var icon = this.querySelector('i');
      if (icon) {
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
      }
    });
  }

  var scrollBtn = document.querySelector('.scroll-top');
  if (scrollBtn) {
    window.addEventListener('scroll', function () {
      scrollBtn.classList.toggle('visible', window.pageYOffset > 300);
    });
    scrollBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  var lightbox = document.querySelector('.lightbox-overlay');
  var lightboxImg = lightbox ? lightbox.querySelector('img') : null;
  var screenshotImages = document.querySelectorAll('.screenshots-grid img, .post-content img');
  if (lightbox && lightboxImg) {
    screenshotImages.forEach(function (img) {
      img.style.cursor = 'pointer';
      img.addEventListener('click', function () {
        lightboxImg.src = this.src;
        lightbox.classList.add('active');
      });
    });
    lightbox.addEventListener('click', function () {
      this.classList.remove('active');
      lightboxImg.src = '';
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && lightbox.classList.contains('active')) {
        lightbox.classList.remove('active');
        lightboxImg.src = '';
      }
    });
  }

  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.widget, .system-req, .game-info-box, .download-section, .changelog-box, .official-links-box, .rating-box, .disclaimer-box, .report-link-box, .tutorial-card').forEach(function (el) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'all 0.5s ease';
      observer.observe(el);
    });
  }

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  var header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.style.boxShadow = window.pageYOffset > 100 ? '0 4px 20px rgba(0,0,0,0.5)' : 'none';
    });
  }

  var searchInput = document.querySelector('.header-search input');
  if (searchInput) {
    searchInput.addEventListener('focus', function () { this.parentElement.style.transform = 'scale(1.02)'; });
    searchInput.addEventListener('blur', function () { this.parentElement.style.transform = 'scale(1)'; });
  }

  document.querySelectorAll('.copy-link').forEach(function (button) {
    button.addEventListener('click', function () {
      var url = this.getAttribute('data-copy-url') || window.location.href;
      var btn = this;
      var label = btn.querySelector('span');
      var originalText = label ? label.textContent : 'Copy Link';
      function successState() {
        btn.classList.add('copied');
        if (label) label.textContent = 'Copied';
        setTimeout(function () {
          btn.classList.remove('copied');
          if (label) label.textContent = originalText;
        }, 1800);
      }
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(successState).catch(function () {
          window.prompt('Copy this link:', url);
        });
      } else {
        window.prompt('Copy this link:', url);
      }
    });
  });


  // Mobile Scroll Fix v1.4.1
  // Beberapa browser mobile dapat menyimpan body dalam keadaan terkunci
  // setelah menu/overlay berubah. Guard ini memaksa scroll kembali normal.
  function gameRepackUnlockScroll() {
    document.documentElement.style.height = 'auto';
    document.documentElement.style.minHeight = '100%';
    document.documentElement.style.overflowY = 'auto';
    document.body.style.height = 'auto';
    document.body.style.minHeight = '100%';
    document.body.style.overflowY = 'auto';
    document.body.style.position = 'relative';
  }

  gameRepackUnlockScroll();
  window.addEventListener('load', gameRepackUnlockScroll);
  window.addEventListener('resize', gameRepackUnlockScroll);
  window.addEventListener('orientationchange', function () {
    setTimeout(gameRepackUnlockScroll, 250);
  });

  if (mainNav) {
    mainNav.addEventListener('transitionend', gameRepackUnlockScroll);
  }

  document.querySelectorAll('.lightbox-overlay').forEach(function (overlay) {
    if (!overlay.classList.contains('active')) {
      overlay.style.display = 'none';
      overlay.style.pointerEvents = 'none';
    }
    overlay.addEventListener('click', function () {
      setTimeout(gameRepackUnlockScroll, 50);
    });
  });

});