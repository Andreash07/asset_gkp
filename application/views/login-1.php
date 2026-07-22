<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Manajemen Aset GKP — Masuk</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
  <style>
    :root {
      --color-primary: #1E3A5F;
      --color-secondary: #2F5D8C;
      --color-accent: #14B8A6;
      --color-background: #F5F7FA;
      --color-card: #FFFFFF;
      --color-border: #E5E7EB;
      --color-text: #374151;
      --color-muted: #6B7280;
      --color-heading: #111827;
      --shadow-card: 0 20px 50px -12px rgba(15, 30, 60, 0.18), 0 8px 20px -8px rgba(15, 30, 60, 0.08);
      --shadow-btn: 0 10px 25px -8px rgba(30, 58, 95, 0.5);
      --radius-card: 20px;
      --radius-input: 12px;
      --radius-btn: 12px;
      --transition-base: 200ms ease;
    }

    * { box-sizing: border-box; }

    html, body {
      margin: 0;
      padding: 0;
      min-height: 100%;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--color-text);
      background-color: var(--color-background);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    a { color: inherit; text-decoration: none; }
    button { font-family: inherit; }

    /* -------- LAYOUT -------- */
    .page {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1.05fr 1fr;
    }

    /* -------- LEFT / BRAND SECTION -------- */
    .brand {
      position: relative;
      background: linear-gradient(135deg, #1E3A5F, #2F5D8C);
      color: #fff;
      padding: 56px 64px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      isolation: isolate;
    }

    .brand::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='600' height='600' viewBox='0 0 600 600'><defs><pattern id='p' width='60' height='60' patternUnits='userSpaceOnUse'><circle cx='1' cy='1' r='1' fill='%23ffffff' fill-opacity='0.08'/></pattern></defs><rect width='600' height='600' fill='url(%23p)'/><circle cx='80' cy='120' r='180' fill='%23ffffff' fill-opacity='0.04'/><circle cx='520' cy='500' r='220' fill='%23ffffff' fill-opacity='0.05'/></svg>");
      background-size: cover;
      opacity: 0.9;
      z-index: -1;
    }

    .brand-header {
      display: flex;
      align-items: center;
      gap: 12px;
      opacity: 0;
      animation: fadeSlide 700ms ease 100ms forwards;
    }

    .brand-logo {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.14);
      border: 1px solid rgba(255, 255, 255, 0.25);
      display: grid;
      place-items: center;
      color: #fff;
      font-size: 20px;
      backdrop-filter: none;
    }

    .brand-name {
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      opacity: 0.9;
    }

    .brand-body {
      max-width: 520px;
      opacity: 0;
      animation: fadeSlide 800ms ease 250ms forwards;
    }

    .brand-title {
      font-size: clamp(28px, 3vw, 42px);
      line-height: 1.15;
      font-weight: 700;
      margin: 0 0 16px;
      letter-spacing: -0.02em;
    }

    .brand-subtitle {
      font-size: 16px;
      line-height: 1.6;
      color: rgba(255, 255, 255, 0.82);
      margin: 0 0 40px;
      max-width: 460px;
    }

    .illustration {
      width: 100%;
      max-width: 520px;
      height: auto;
      opacity: 0;
      animation: fadeSlide 900ms ease 400ms forwards;
    }

    .brand-footer {
      display: flex;
      gap: 24px;
      font-size: 13px;
      color: rgba(255, 255, 255, 0.7);
      opacity: 0;
      animation: fadeSlide 800ms ease 600ms forwards;
    }

    .brand-footer span i {
      color: var(--color-accent);
      margin-right: 6px;
    }

    /* -------- RIGHT / LOGIN SECTION -------- */
    .login-wrap {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 32px;
      background-color: var(--color-background);
    }

    .login-card {
      width: 100%;
      max-width: 460px;
      background: var(--color-card);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-card);
      padding: 44px 40px;
      opacity: 0;
      transform: translateY(12px);
      animation: fadeSlide 700ms ease 200ms forwards;
    }

    .caption {
      display: inline-block;
      font-size: 11px;
      letter-spacing: 2px;
      font-weight: 600;
      color: var(--color-accent);
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .login-title {
      font-size: 28px;
      font-weight: 700;
      color: var(--color-heading);
      margin: 0 0 8px;
      letter-spacing: -0.02em;
    }

    .login-desc {
      font-size: 14px;
      color: var(--color-muted);
      margin: 0 0 32px;
    }

    /* Form */
    .field {
      margin-bottom: 18px;
    }

    .field label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: var(--color-heading);
      margin-bottom: 8px;
    }

    .input-group {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-group i.leading {
      position: absolute;
      left: 14px;
      color: var(--color-muted);
      font-size: 16px;
      pointer-events: none;
      transition: color var(--transition-base);
    }

    .input-group .toggle-pw {
      position: absolute;
      right: 8px;
      background: transparent;
      border: 0;
      color: var(--color-muted);
      width: 36px;
      height: 36px;
      border-radius: 8px;
      display: grid;
      place-items: center;
      cursor: pointer;
      transition: background var(--transition-base), color var(--transition-base);
    }

    .input-group .toggle-pw:hover {
      background: #F3F4F6;
      color: var(--color-primary);
    }

    .input {
      width: 100%;
      height: 48px;
      border-radius: var(--radius-input);
      border: 1px solid var(--color-border);
      background: #fff;
      padding: 0 44px 0 42px;
      font-size: 14px;
      color: var(--color-heading);
      transition: border-color var(--transition-base), box-shadow var(--transition-base), background var(--transition-base);
      outline: none;
    }

    .input::placeholder { color: #9CA3AF; }

    .input:hover {
      border-color: #CBD5E1;
    }

    .input:focus {
      border-color: var(--color-secondary);
      box-shadow: 0 0 0 4px rgba(47, 93, 140, 0.14);
      background: #fff;
    }

    .input:focus + .toggle-pw,
    .input-group:focus-within i.leading {
      color: var(--color-secondary);
    }

    /* Row: remember + forgot */
    .row-between {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 6px 0 26px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .remember {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      color: var(--color-text);
      cursor: pointer;
      user-select: none;
    }

    .remember input {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .checkbox {
      width: 18px;
      height: 18px;
      border-radius: 5px;
      border: 1px solid #CBD5E1;
      background: #fff;
      display: inline-grid;
      place-items: center;
      transition: all var(--transition-base);
    }

    .checkbox i {
      font-size: 12px;
      color: #fff;
      opacity: 0;
      transform: scale(0.6);
      transition: opacity var(--transition-base), transform var(--transition-base);
    }

    .remember input:checked + .checkbox {
      background: var(--color-accent);
      border-color: var(--color-accent);
    }

    .remember input:checked + .checkbox i {
      opacity: 1;
      transform: scale(1);
    }

    .remember input:focus-visible + .checkbox {
      box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.2);
    }

    .forgot {
      font-size: 13px;
      font-weight: 500;
      color: var(--color-secondary);
      transition: color var(--transition-base);
    }
    .forgot:hover { color: var(--color-primary); text-decoration: underline; }

    /* Button */
    .btn-primary {
      width: 100%;
      height: 48px;
      border: 0;
      border-radius: var(--radius-btn);
      background: linear-gradient(135deg, #1E3A5F, #2F5D8C);
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      letter-spacing: 0.2px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow: var(--shadow-btn);
      transition: transform 180ms ease, box-shadow 180ms ease, filter 180ms ease;
    }

    .btn-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 14px 30px -10px rgba(30, 58, 95, 0.6);
      filter: brightness(1.05);
    }

    .btn-primary:active {
      transform: translateY(0);
      filter: brightness(0.98);
    }

    .btn-primary i {
      transition: transform 200ms ease;
    }
    .btn-primary:hover i { transform: translateX(3px); }

    .btn-primary.loading {
      pointer-events: none;
      opacity: 0.85;
    }

    .btn-primary.loading .btn-label { opacity: 0.75; }
    .btn-primary.loading .btn-arrow { display: none; }

    .spinner {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 2px solid rgba(255,255,255,0.35);
      border-top-color: #fff;
      animation: spin 700ms linear infinite;
      display: none;
    }
    .btn-primary.loading .spinner { display: inline-block; }

    /* Meta below button */
    .meta {
      margin-top: 22px;
      text-align: center;
      font-size: 12px;
      color: var(--color-muted);
    }

    .version {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 10px;
      border: 1px solid var(--color-border);
      border-radius: 999px;
      background: #F9FAFB;
      color: var(--color-muted);
      font-weight: 500;
    }

    .footer {
      text-align: center;
      font-size: 12px;
      color: var(--color-muted);
      margin-top: 24px;
    }

    /* Alert (validation) */
    .alert {
      display: none;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      margin-bottom: 18px;
      border-radius: 10px;
      background: #FEF2F2;
      border: 1px solid #FECACA;
      color: #B91C1C;
      font-size: 13px;
    }
    .alert.show { display: flex; }

    /* -------- ANIMATIONS -------- */
    @keyframes fadeSlide {
      from { opacity: 0; transform: translateY(12px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* -------- RESPONSIVE -------- */
    @media (max-width: 960px) {
      .page { grid-template-columns: 1fr; }
      .brand {
        padding: 40px 32px 48px;
      }
      .brand-body { max-width: 100%; }
      .illustration { max-width: 380px; }
      .brand-footer { flex-wrap: wrap; }
    }

    @media (max-width: 560px) {
      .brand { padding: 32px 24px 40px; }
      .brand-title { font-size: 26px; }
      .brand-subtitle { font-size: 15px; margin-bottom: 28px; }
      .login-wrap { padding: 32px 20px; }
      .login-card { padding: 32px 24px; border-radius: 16px; }
      .login-title { font-size: 24px; }
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.001ms !important;
        transition-duration: 0.001ms !important;
      }
    }
  </style>
</head>
<body>
  <main class="page" data-testid="login-page">

    <!-- ============= LEFT / BRAND ============= -->
    <section class="brand" aria-labelledby="brand-title" data-testid="brand-section">
      <header class="brand-header">
        <div class="brand-logo" aria-hidden="true">
          <i class="bi bi-building-check"></i>
        </div>
        <span class="brand-name">GKP · Asset System</span>
      </header>

      <div class="brand-body">
        <h1 id="brand-title" class="brand-title" data-testid="brand-title">
          Sistem Manajemen Aset GKP
        </h1>
        <p class="brand-subtitle" data-testid="brand-subtitle">
          Kelola aset gereja secara digital, aman, terstruktur, dan terintegrasi.
        </p>

        <!-- Flat SVG illustration: Asset management / buildings / documents -->
        <svg class="illustration" viewBox="0 0 520 300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustrasi manajemen aset" data-testid="brand-illustration">
          <defs>
            <linearGradient id="gCard" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#ffffff" stop-opacity="0.95"/>
              <stop offset="100%" stop-color="#E6EEF7" stop-opacity="0.9"/>
            </linearGradient>
            <linearGradient id="gAccent" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#14B8A6"/>
              <stop offset="100%" stop-color="#0EA5A0"/>
            </linearGradient>
            <linearGradient id="gBuild" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#ffffff" stop-opacity="0.98"/>
              <stop offset="100%" stop-color="#CBD9EA" stop-opacity="0.9"/>
            </linearGradient>
          </defs>

          <!-- floor / ground shadow -->
          <ellipse cx="260" cy="270" rx="220" ry="12" fill="#000" opacity="0.18"/>

          <!-- Back building -->
          <g>
            <rect x="60" y="90" width="140" height="160" rx="8" fill="url(#gBuild)"/>
            <rect x="76" y="110" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.75"/>
            <rect x="112" y="110" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.55"/>
            <rect x="148" y="110" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.75"/>
            <rect x="76" y="146" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.55"/>
            <rect x="112" y="146" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.75"/>
            <rect x="148" y="146" width="26" height="26" rx="3" fill="#2F5D8C" opacity="0.55"/>
            <rect x="108" y="192" width="34" height="58" rx="4" fill="#1E3A5F"/>
            <circle cx="135" cy="222" r="2" fill="#14B8A6"/>
          </g>

          <!-- Church-like building (front, center) -->
          <g>
            <polygon points="260,60 330,120 190,120" fill="#ffffff" opacity="0.98"/>
            <rect x="252" y="30" width="16" height="34" fill="#ffffff"/>
            <rect x="257" y="18" width="6" height="16" fill="#14B8A6"/>
            <rect x="190" y="120" width="140" height="130" rx="6" fill="url(#gBuild)"/>
            <rect x="246" y="150" width="28" height="56" rx="14" fill="#1E3A5F"/>
            <line x1="260" y1="150" x2="260" y2="206" stroke="#14B8A6" stroke-width="2" opacity="0.9"/>
            <line x1="246" y1="178" x2="274" y2="178" stroke="#14B8A6" stroke-width="2" opacity="0.9"/>
            <rect x="200" y="150" width="30" height="30" rx="4" fill="#2F5D8C" opacity="0.75"/>
            <rect x="290" y="150" width="30" height="30" rx="4" fill="#2F5D8C" opacity="0.75"/>
            <rect x="200" y="210" width="30" height="30" rx="4" fill="#2F5D8C" opacity="0.55"/>
            <rect x="290" y="210" width="30" height="30" rx="4" fill="#2F5D8C" opacity="0.55"/>
          </g>

          <!-- Right building -->
          <g>
            <rect x="340" y="130" width="120" height="120" rx="8" fill="url(#gBuild)"/>
            <rect x="354" y="146" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.7"/>
            <rect x="384" y="146" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.5"/>
            <rect x="414" y="146" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.7"/>
            <rect x="354" y="176" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.5"/>
            <rect x="384" y="176" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.7"/>
            <rect x="414" y="176" width="22" height="22" rx="3" fill="#2F5D8C" opacity="0.5"/>
            <rect x="384" y="210" width="30" height="40" rx="4" fill="#1E3A5F"/>
          </g>

          <!-- Floating document card (left) -->
          <g transform="translate(20 165)">
            <rect x="0" y="0" width="110" height="80" rx="10" fill="url(#gCard)" stroke="#E5E7EB"/>
            <rect x="12" y="14" width="46" height="8" rx="2" fill="#1E3A5F"/>
            <rect x="12" y="30" width="86" height="6" rx="2" fill="#CBD5E1"/>
            <rect x="12" y="42" width="70" height="6" rx="2" fill="#CBD5E1"/>
            <rect x="12" y="54" width="60" height="6" rx="2" fill="#CBD5E1"/>
            <circle cx="92" cy="62" r="10" fill="url(#gAccent)"/>
            <path d="M87 62 l4 4 l7 -8" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
          </g>

          <!-- Floating inventory card (right) -->
          <g transform="translate(390 60)">
            <rect x="0" y="0" width="120" height="70" rx="10" fill="url(#gCard)" stroke="#E5E7EB"/>
            <rect x="12" y="12" width="30" height="30" rx="6" fill="#14B8A6" opacity="0.15"/>
            <path d="M20 27 h14 M27 20 v14" stroke="#14B8A6" stroke-width="2" stroke-linecap="round"/>
            <rect x="52" y="16" width="56" height="7" rx="2" fill="#1E3A5F"/>
            <rect x="52" y="28" width="46" height="6" rx="2" fill="#CBD5E1"/>
            <rect x="12" y="52" width="96" height="6" rx="2" fill="#E5E7EB"/>
            <rect x="12" y="52" width="60" height="6" rx="2" fill="#2F5D8C"/>
          </g>

          <!-- Small tag chip -->
          <g transform="translate(150 30)">
            <rect x="0" y="0" width="86" height="26" rx="13" fill="#ffffff" opacity="0.95"/>
            <circle cx="14" cy="13" r="4" fill="#14B8A6"/>
            <rect x="24" y="9" width="52" height="8" rx="2" fill="#1E3A5F"/>
          </g>
        </svg>
      </div>

      <footer class="brand-footer">
        <span><i class="bi bi-shield-check"></i> Aman &amp; Terenkripsi</span>
        <span><i class="bi bi-lightning-charge"></i> Cepat &amp; Terpercaya</span>
        <span><i class="bi bi-diagram-3"></i> Terintegrasi</span>
      </footer>
    </section>

    <!-- ============= RIGHT / LOGIN ============= -->
    <section class="login-wrap" data-testid="login-section">
      <div class="login-card" role="region" aria-labelledby="login-title" data-testid="login-card">
        <span class="caption" data-testid="login-caption">Welcome Back</span>
        <h2 id="login-title" class="login-title" data-testid="login-title">Masuk ke Sistem</h2>
        <p class="login-desc" data-testid="login-description">Silakan masuk menggunakan akun Anda.</p>

        <div class="alert" id="alert" role="alert" data-testid="login-alert">
          <i class="bi bi-exclamation-circle"></i>
          <span id="alertMsg">Username dan password wajib diisi.</span>
        </div>

        <form id="loginForm" novalidate data-testid="login-form">
          <div class="field">
            <label for="username">Username</label>
            <div class="input-group">
              <i class="bi bi-person leading" aria-hidden="true"></i>
              <input
                id="username"
                name="username"
                type="text"
                class="input"
                placeholder="Masukkan username Anda"
                autocomplete="username"
                required
                data-testid="username-input"
              />
            </div>
          </div>

          <div class="field">
            <label for="password">Password</label>
            <div class="input-group">
              <i class="bi bi-lock leading" aria-hidden="true"></i>
              <input
                id="password"
                name="password"
                type="password"
                class="input"
                placeholder="Masukkan password Anda"
                autocomplete="current-password"
                required
                data-testid="password-input"
              />
              <button type="button" class="toggle-pw" id="togglePw" aria-label="Tampilkan password" data-testid="toggle-password-button">
                <i class="bi bi-eye" id="togglePwIcon"></i>
              </button>
            </div>
          </div>

          <div class="row-between">
            <label class="remember" data-testid="remember-me-label">
              <input type="checkbox" id="remember" data-testid="remember-me-checkbox" />
              <span class="checkbox"><i class="bi bi-check2"></i></span>
              <span>Ingat saya</span>
            </label>
            <a href="#" class="forgot" data-testid="forgot-password-link">Lupa Password?</a>
          </div>

          <button type="submit" class="btn-primary" id="submitBtn" data-testid="login-submit-button">
            <span class="spinner" aria-hidden="true"></span>
            <span class="btn-label">Masuk ke Sistem</span>
            <i class="bi bi-arrow-right btn-arrow" aria-hidden="true"></i>
          </button>

          <div class="meta">
            <span class="version" data-testid="app-version"><i class="bi bi-box-seam"></i> Version 1.0</span>
          </div>
        </form>

        <div class="footer" data-testid="app-footer">
          © 2025 GKP Kampung Sawah
        </div>
      </div>
    </section>
  </main>

  <script>
    (function () {
      const form = document.getElementById('loginForm');
      const username = document.getElementById('username');
      const password = document.getElementById('password');
      const togglePw = document.getElementById('togglePw');
      const togglePwIcon = document.getElementById('togglePwIcon');
      const alertBox = document.getElementById('alert');
      const alertMsg = document.getElementById('alertMsg');
      const submitBtn = document.getElementById('submitBtn');

      // Toggle password visibility
      togglePw.addEventListener('click', function () {
        const isPw = password.type === 'password';
        password.type = isPw ? 'text' : 'password';
        togglePwIcon.className = isPw ? 'bi bi-eye-slash' : 'bi bi-eye';
        togglePw.setAttribute('aria-label', isPw ? 'Sembunyikan password' : 'Tampilkan password');
        password.focus();
      });

      function showAlert(msg) {
        alertMsg.textContent = msg;
        alertBox.classList.add('show');
      }
      function hideAlert() {
        alertBox.classList.remove('show');
      }

      [username, password].forEach(function (el) {
        el.addEventListener('input', hideAlert);
      });

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        const u = username.value.trim();
        const p = password.value.trim();

        if (!u || !p) {
          showAlert('Username dan password wajib diisi.');
          if (!u) username.focus(); else password.focus();
          return;
        }
        if (p.length < 4) {
          showAlert('Password minimal 4 karakter.');
          password.focus();
          return;
        }

        // Simulate submit
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;

        setTimeout(function () {
          submitBtn.classList.remove('loading');
          submitBtn.disabled = false;
          showAlert('Demo: koneksi ke server belum tersedia.');
        }, 1200);
      });
    })();
  </script>
</body>
</html>