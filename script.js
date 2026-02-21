(function () {
  'use strict';

  /* ===== STATE ===== */
  var currentScreen = 'screen-main';
  var focusedIndex = 0;
  var soundEnabled = localStorage.getItem('sound') !== 'off';
  var theme = localStorage.getItem('theme') || 'dark';
  var audioCtx = null;
  var isTransitioning = false;
  var crtActive = false;

  /* ===== DOM REFS ===== */
  var screens = document.querySelectorAll('.screen');
  var menuItems = document.querySelectorAll('#screen-main .menu-item');
  var pageWrap = document.getElementById('page-wrap');
  var crtOverlay = document.getElementById('crt-overlay');
  var btnTheme = document.getElementById('btn-theme');
  var btnSound = document.getElementById('btn-sound');
  var canvas = document.getElementById('particles');
  var ctx = canvas.getContext('2d');

  /* ===== INIT ===== */
  applyTheme(theme);
  applySound(soundEnabled);
  initParticles();
  updateMenuFocus();

  /* ===== SOUND ENGINE ===== */
  function getAudioCtx() {
    if (!audioCtx) {
      audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    }
    if (audioCtx.state === 'suspended') {
      audioCtx.resume();
    }
    return audioCtx;
  }

  function playSound(type) {
    if (!soundEnabled) return;
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;

    try {
      var ctx = getAudioCtx();
      var now = ctx.currentTime;
      var osc = ctx.createOscillator();
      var gain = ctx.createGain();
      osc.connect(gain);
      gain.connect(ctx.destination);

      switch (type) {
        case 'tick':
          osc.type = 'square';
          osc.frequency.setValueAtTime(800, now);
          osc.frequency.linearRampToValueAtTime(600, now + 0.06);
          gain.gain.setValueAtTime(0.08, now);
          gain.gain.linearRampToValueAtTime(0, now + 0.06);
          osc.start(now);
          osc.stop(now + 0.06);
          break;

        case 'confirm':
          osc.type = 'square';
          osc.frequency.setValueAtTime(440, now);
          osc.frequency.setValueAtTime(660, now + 0.1);
          gain.gain.setValueAtTime(0.08, now);
          gain.gain.linearRampToValueAtTime(0, now + 0.2);
          osc.start(now);
          osc.stop(now + 0.2);
          break;

        case 'back':
          osc.type = 'square';
          osc.frequency.setValueAtTime(660, now);
          osc.frequency.linearRampToValueAtTime(330, now + 0.18);
          gain.gain.setValueAtTime(0.08, now);
          gain.gain.linearRampToValueAtTime(0, now + 0.18);
          osc.start(now);
          osc.stop(now + 0.18);
          break;

        case 'whoosh':
          osc.type = 'sawtooth';
          osc.frequency.setValueAtTime(200, now);
          osc.frequency.linearRampToValueAtTime(80, now + 0.3);
          gain.gain.setValueAtTime(0.05, now);
          gain.gain.linearRampToValueAtTime(0, now + 0.3);
          osc.start(now);
          osc.stop(now + 0.3);
          break;

        case 'shutdown':
          osc.type = 'sine';
          osc.frequency.setValueAtTime(1000, now);
          osc.frequency.exponentialRampToValueAtTime(40, now + 1.2);
          gain.gain.setValueAtTime(0.12, now);
          gain.gain.linearRampToValueAtTime(0, now + 1.2);
          osc.start(now);
          osc.stop(now + 1.2);
          break;
      }
    } catch (e) {
      // Audio not supported or blocked
    }
  }

  /* ===== THEME ===== */
  function applyTheme(t) {
    theme = t;
    document.documentElement.setAttribute('data-theme', t);
    localStorage.setItem('theme', t);
  }

  btnTheme.addEventListener('click', function () {
    playSound('tick');
    applyTheme(theme === 'dark' ? 'light' : 'dark');
  });

  /* ===== SOUND TOGGLE ===== */
  function applySound(enabled) {
    soundEnabled = enabled;
    document.documentElement.setAttribute('data-sound', enabled ? 'on' : 'off');
    localStorage.setItem('sound', enabled ? 'on' : 'off');
  }

  btnSound.addEventListener('click', function () {
    applySound(!soundEnabled);
    playSound('tick');
  });

  /* ===== MENU FOCUS ===== */
  function updateMenuFocus() {
    menuItems.forEach(function (item, i) {
      if (i === focusedIndex) {
        item.classList.add('focused');
      } else {
        item.classList.remove('focused');
      }
    });
  }

  function navigateMenu(dir) {
    if (currentScreen !== 'screen-main' || isTransitioning || crtActive) return;
    var newIndex = focusedIndex + dir;
    if (newIndex < 0) newIndex = menuItems.length - 1;
    if (newIndex >= menuItems.length) newIndex = 0;
    if (newIndex !== focusedIndex) {
      focusedIndex = newIndex;
      updateMenuFocus();
      playSound('tick');
    }
  }

  function selectMenuItem() {
    if (currentScreen !== 'screen-main' || isTransitioning || crtActive) return;
    var item = menuItems[focusedIndex];
    var action = item.getAttribute('data-action');
    var targetScreen = item.getAttribute('data-screen');

    if (action === 'exit') {
      playSound('shutdown');
      triggerCRT();
      return;
    }

    if (action === 'cv') {
      playSound('confirm');
      window.open('https://zbinski.dev/assets/CV.pdf', '_blank');
      return;
    }

    if (targetScreen) {
      playSound('confirm');
      transitionTo(targetScreen);
    }
  }

  /* ===== SCREEN TRANSITIONS ===== */
  function transitionTo(screenId) {
    if (isTransitioning || screenId === currentScreen) return;
    isTransitioning = true;

    var currentEl = document.getElementById(currentScreen);
    var targetEl = document.getElementById(screenId);

    playSound('whoosh');

    currentEl.classList.remove('active');
    currentEl.classList.add('exiting');

    setTimeout(function () {
      currentEl.classList.remove('exiting');
      targetEl.classList.add('active');
      currentScreen = screenId;
      isTransitioning = false;

      // Focus the back button on sub-screens
      var backBtn = targetEl.querySelector('.back-btn');
      if (backBtn) {
        backBtn.focus();
      }

      // Scroll to top
      targetEl.scrollTop = 0;
    }, 350);
  }

  function goBack() {
    if (currentScreen === 'screen-main' || isTransitioning || crtActive) return;
    playSound('back');
    transitionTo('screen-main');
  }

  /* ===== CRT SHUTDOWN ===== */
  function triggerCRT() {
    if (crtActive) return;
    crtActive = true;
    pageWrap.classList.add('crt-off');

    setTimeout(function () {
      crtOverlay.classList.add('visible');
    }, 450);
  }

  /* ===== KEYBOARD NAVIGATION ===== */
  document.addEventListener('keydown', function (e) {
    if (crtActive) return;

    switch (e.key) {
      case 'ArrowUp':
      case 'w':
      case 'W':
        e.preventDefault();
        navigateMenu(-1);
        break;

      case 'ArrowDown':
      case 's':
      case 'S':
        e.preventDefault();
        navigateMenu(1);
        break;

      case 'Enter':
      case ' ':
        if (currentScreen === 'screen-main' && document.activeElement.tagName !== 'A') {
          e.preventDefault();
          selectMenuItem();
        }
        break;

      case 'Escape':
        e.preventDefault();
        goBack();
        break;
    }
  });

  /* ===== MOUSE/TOUCH MENU INTERACTION ===== */
  menuItems.forEach(function (item, i) {
    item.addEventListener('mouseenter', function () {
      if (focusedIndex !== i) {
        focusedIndex = i;
        updateMenuFocus();
        playSound('tick');
      }
    });

    item.addEventListener('click', function () {
      focusedIndex = i;
      updateMenuFocus();
      selectMenuItem();
    });
  });

  /* ===== BACK BUTTONS ===== */
  document.querySelectorAll('.back-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      goBack();
    });
  });

  /* ===== PARTICLE SYSTEM ===== */
  var particles = [];
  var particleCount = 30;
  var rafId = null;

  function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  function createParticle() {
    return {
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      r: Math.random() * 3 + 1,
      dx: (Math.random() - 0.5) * 0.3,
      dy: (Math.random() - 0.5) * 0.2 - 0.1,
      alpha: Math.random() * 0.3 + 0.05,
    };
  }

  function initParticles() {
    resizeCanvas();
    particles = [];
    for (var i = 0; i < particleCount; i++) {
      particles.push(createParticle());
    }
    if (!rafId) {
      drawParticles();
    }
  }

  function getParticleColor(alpha) {
    if (theme === 'light') {
      return 'rgba(0, 144, 160, ' + alpha + ')';
    }
    return 'rgba(0, 229, 255, ' + alpha + ')';
  }

  function drawParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (var i = 0; i < particles.length; i++) {
      var p = particles[i];
      p.x += p.dx;
      p.y += p.dy;

      // Wrap around
      if (p.x < -10) p.x = canvas.width + 10;
      if (p.x > canvas.width + 10) p.x = -10;
      if (p.y < -10) p.y = canvas.height + 10;
      if (p.y > canvas.height + 10) p.y = -10;

      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = getParticleColor(p.alpha);
      ctx.shadowBlur = p.r * 6;
      ctx.shadowColor = getParticleColor(p.alpha * 1.5);
      ctx.fill();
    }

    ctx.shadowBlur = 0;
    rafId = requestAnimationFrame(drawParticles);
  }

  window.addEventListener('resize', resizeCanvas);

  /* ===== CONSENT BANNER ===== */
  var consentBanner = document.getElementById('consent-banner');
  var consentChoice = localStorage.getItem('consent');

  if (consentChoice) {
    consentBanner.classList.add('hidden');
  }

  document.getElementById('consent-yes').addEventListener('click', function () {
    localStorage.setItem('consent', 'granted');
    consentBanner.classList.add('hidden');
    gtag('consent', 'update', {
      'analytics_storage': 'granted',
      'ad_storage': 'granted',
      'ad_user_data': 'granted',
      'ad_personalization': 'granted'
    });
  });

  document.getElementById('consent-no').addEventListener('click', function () {
    localStorage.setItem('consent', 'denied');
    consentBanner.classList.add('hidden');
  });

  // Apply stored consent on return visits
  if (consentChoice === 'granted') {
    gtag('consent', 'update', {
      'analytics_storage': 'granted',
      'ad_storage': 'granted',
      'ad_user_data': 'granted',
      'ad_personalization': 'granted'
    });
  }

  /* ===== PREFERS REDUCED MOTION ===== */
  var motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
  function handleMotionChange(mq) {
    if (mq.matches) {
      if (rafId) {
        cancelAnimationFrame(rafId);
        rafId = null;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
      }
    } else {
      if (!rafId) {
        drawParticles();
      }
    }
  }
  motionQuery.addEventListener('change', handleMotionChange);
  handleMotionChange(motionQuery);

})();
