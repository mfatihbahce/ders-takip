<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Öğrenci Kayıt Formu | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f3f4f8;
            --bg-pattern: radial-gradient(circle at 1px 1px, rgba(15, 23, 42, 0.06) 1px, transparent 0);
            --surface: #ffffff;
            --surface-muted: #f8fafc;
            --text: #0f172a;
            --text-secondary: #475569;
            --muted: #64748b;
            --border: #e2e8f0;
            --border-strong: #cbd5e1;
            --accent: #ea580c;
            --accent-hover: #c2410c;
            --accent-soft: rgba(234, 88, 12, 0.08);
            --accent-ring: rgba(234, 88, 12, 0.25);
            --success-bg: #ecfdf5;
            --success-border: #a7f3d0;
            --success-text: #065f46;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --error-text: #991b1b;
            --info-bg: #eff6ff;
            --info-border: #bfdbfe;
            --info-text: #1e40af;
            --radius-lg: 20px;
            --radius-md: 14px;
            --radius-sm: 10px;
            --input-radius: 12px;
            --input-min-height: 48px;
            --input-pad-x: 16px;
            --input-pad-y: 14px;
            --input-bg: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
            --input-bg-focus: #ffffff;
            --shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.05);
            --shadow-md: 0 12px 40px rgba(15, 23, 42, 0.08);
            --shadow-focus: 0 0 0 3px var(--accent-ring);
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "DM Sans", ui-sans-serif, system-ui, -apple-system, sans-serif;
            font-size: 15px;
            line-height: 1.55;
            color: var(--text);
            background-color: var(--bg);
            background-image: var(--bg-pattern);
            background-size: 24px 24px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        .page {
            max-width: min(880px, 100%);
            margin: 0 auto;
            padding: clamp(24px, 5vw, 48px) clamp(16px, 4vw, 24px) 56px;
        }

        /* Hero */
        .hero {
            position: relative;
            border-radius: var(--radius-lg);
            padding: clamp(22px, 4vw, 32px);
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 45%, #fed7aa 100%);
            border: 1px solid rgba(251, 146, 60, 0.35);
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: -40% -20% auto auto;
            width: min(420px, 90vw);
            height: min(420px, 90vw);
            background: radial-gradient(circle, rgba(234, 88, 12, 0.12) 0%, transparent 65%);
            pointer-events: none;
        }
        .hero-inner { position: relative; z-index: 1; }

        .hero-layout {
            display: grid;
            gap: clamp(20px, 4vw, 28px);
            align-items: start;
        }
        @media (min-width: 840px) {
            .hero-layout {
                grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
                gap: 28px 32px;
            }
        }

        .hero-main { min-width: 0; }

        .hero-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }
        .hero-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.02em;
            color: #9a3412;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(251, 146, 60, 0.35);
            box-shadow: var(--shadow-sm);
        }
        .hero-pill svg {
            width: 14px;
            height: 14px;
            opacity: 0.85;
        }
        .hero-pill--muted {
            color: var(--text-secondary);
            border-color: rgba(148, 163, 184, 0.35);
            background: rgba(255, 255, 255, 0.55);
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(1.5rem, 4vw, 1.85rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.2;
            color: var(--text);
        }
        .hero .lead {
            margin: 12px 0 0;
            font-size: 14px;
            color: var(--text-secondary);
            max-width: 42em;
            line-height: 1.6;
        }

        .hero-panel {
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(251, 146, 60, 0.28);
            box-shadow: var(--shadow-sm);
            padding: 18px 18px 16px;
            backdrop-filter: blur(8px);
        }
        .hero-panel-kicker {
            margin: 0 0 12px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
        }
        .hero-steps {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .hero-steps li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: var(--text-secondary);
            line-height: 1.4;
        }
        .hero-step-num {
            flex-shrink: 0;
            width: 28px;
            height: 28px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
            color: #c2410c;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(251, 146, 60, 0.35);
        }
        .hero-steps li strong {
            color: var(--text);
            font-weight: 700;
        }
        .hero-trustbar {
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid rgba(148, 163, 184, 0.25);
            display: flex;
            flex-wrap: wrap;
            gap: 8px 14px;
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
        }
        .hero-trustbar span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .hero-trustbar span::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25);
        }

        /* Alerts */
        .alert {
            margin-top: 20px;
            padding: 14px 16px;
            border-radius: var(--radius-md);
            font-size: 14px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }
        .alert.success {
            background: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success-text);
        }
        .alert.error {
            background: var(--error-bg);
            border-color: var(--error-border);
            color: var(--error-text);
        }
        .alert.error strong {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .alert.error ul {
            margin: 0;
            padding-left: 1.1em;
        }

        /* Form shell */
        .form-shell {
            margin-top: 24px;
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-md);
            padding: clamp(20px, 4vw, 28px);
        }

        .section {
            padding-bottom: 28px;
            margin-bottom: 28px;
            border-bottom: 1px solid var(--border);
        }
        .section:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border-bottom: none;
        }

        .section-title {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
        }
        .section-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--surface-muted);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }
        .section-icon svg {
            width: 20px;
            height: 20px;
        }
        .section-title h2 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--text);
        }
        .section-title p {
            margin: 4px 0 0;
            font-size: 13px;
            color: var(--muted);
            max-width: 36em;
        }

        .grid {
            display: grid;
            gap: 18px 20px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        @media (max-width: 640px) {
            .grid { grid-template-columns: 1fr; }
        }

        .field { display: flex; flex-direction: column; gap: 8px; }

        label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
        }
        .required { color: #dc2626; font-weight: 700; margin-left: 2px; }

        .hint {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.4;
        }

        /* Tek satır alanlar — doğum tarihi ile aynı “yüksek kontrol” hissi
           Not: type yazılmayan <input> HTML’de metin sayılır ama [type="text"] seçicisi tutmaz; köşeli varsayılan stil kalır. */
        select {
            width: 100%;
            min-height: var(--input-min-height);
            padding: var(--input-pad-y) calc(var(--input-pad-x) + 22px) var(--input-pad-y) var(--input-pad-x);
            font: inherit;
            font-size: 16px;
            line-height: 1.35;
            color: var(--text);
            background-color: #fafbfc;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 18px;
            border: 1px solid var(--border);
            border-radius: var(--input-radius);
            box-shadow: inset 0 1px 2px rgba(15, 23, 42, 0.04);
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            appearance: none;
            cursor: pointer;
        }
        select:hover {
            border-color: var(--border-strong);
        }
        select:focus {
            outline: none;
            background-color: var(--input-bg-focus);
            border-color: var(--accent);
            box-shadow: var(--shadow-focus), inset 0 1px 2px rgba(15, 23, 42, 0.03);
        }

        input:not([type]),
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            min-height: var(--input-min-height);
            padding: var(--input-pad-y) var(--input-pad-x);
            font: inherit;
            font-size: 16px; /* iOS zoom önleme + okunabilirlik */
            line-height: 1.35;
            color: var(--text);
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: var(--input-radius);
            box-shadow: inset 0 1px 2px rgba(15, 23, 42, 0.04);
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        input[type="date"] {
            cursor: pointer;
        }

        /* Tarih seçici ikonu (WebKit / Blink) */
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            opacity: 0.55;
            padding: 4px;
            margin-right: 2px;
            border-radius: 8px;
            transition: opacity 0.15s ease, background 0.15s ease;
        }
        input[type="date"]:hover::-webkit-calendar-picker-indicator {
            opacity: 0.95;
            background: rgba(234, 88, 12, 0.08);
        }

        textarea {
            width: 100%;
            min-height: 120px;
            resize: vertical;
            padding: var(--input-pad-y) var(--input-pad-x);
            font: inherit;
            font-size: 16px;
            line-height: 1.5;
            color: var(--text);
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: var(--input-radius);
            box-shadow: inset 0 1px 2px rgba(15, 23, 42, 0.04);
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        select:hover,
        input:not([type]):hover,
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="tel"]:hover,
        input[type="date"]:hover,
        textarea:hover {
            border-color: var(--border-strong);
        }

        select:focus,
        input:not([type]):focus,
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            outline: none;
            background: var(--input-bg-focus);
            border-color: var(--accent);
            box-shadow: var(--shadow-focus), inset 0 1px 2px rgba(15, 23, 42, 0.03);
        }

        /* Class chips */
        .checks {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        @media (max-width: 520px) {
            .checks { grid-template-columns: 1fr; }
        }

        .check {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 0;
            padding: 12px 14px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            background: var(--surface-muted);
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
        }
        .check:hover {
            border-color: var(--border-strong);
            background: var(--surface);
        }
        .check:focus-within {
            box-shadow: var(--shadow-focus);
            border-color: var(--accent);
        }
        .check:has(input:checked) {
            border-color: var(--accent);
            background: var(--accent-soft);
            box-shadow: var(--shadow-sm);
        }

        /* Görünmez ama odaklanılabilir checkbox (erişilebilirlik) */
        .check input {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .check-mark {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            margin-top: 1px;
            border-radius: 6px;
            border: 2px solid var(--border-strong);
            background: var(--surface);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.15s ease, background 0.15s ease;
        }
        .check:has(input:checked) .check-mark {
            border-color: var(--accent);
            background: var(--accent);
        }
        .check-mark svg {
            width: 14px;
            height: 14px;
            color: #fff;
            opacity: 0;
            transform: scale(0.6);
            transition: opacity 0.15s ease, transform 0.15s ease;
        }
        .check:has(input:checked) .check-mark svg {
            opacity: 1;
            transform: scale(1);
        }

        .check-body .check-title {
            font-weight: 600;
            font-size: 14px;
            color: var(--text);
            letter-spacing: -0.01em;
        }
        .check-body .check-desc {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
            line-height: 1.35;
        }

        .checks-note {
            margin-top: 12px;
            font-size: 12px;
            color: var(--muted);
        }

        /* KVKK */
        .kvkk {
            margin-top: 8px;
            padding: 14px 16px;
            border-radius: var(--radius-md);
            background: var(--info-bg);
            border: 1px solid var(--info-border);
            color: var(--info-text);
            font-size: 13px;
            line-height: 1.55;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }
        .kvkk svg {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            margin-top: 1px;
            opacity: 0.85;
        }

        /* Submit */
        .submit-wrap {
            margin-top: 24px;
        }
        .btn {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            font: inherit;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: -0.01em;
            color: #fff;
            background: var(--accent);
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(234, 88, 12, 0.35);
            transition: background 0.15s ease, transform 0.12s ease, box-shadow 0.15s ease;
        }
        .btn:hover {
            background: var(--accent-hover);
            box-shadow: 0 6px 20px rgba(194, 65, 12, 0.35);
        }
        .btn:active {
            transform: translateY(1px);
        }
        .btn svg {
            width: 18px;
            height: 18px;
        }

    </style>
</head>
<body>
<div class="page" id="top">
    <header class="hero">
        <div class="hero-inner hero-layout">
            <div class="hero-main">
                <div class="hero-badges">
                    <span class="hero-pill">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Çevrimiçi başvuru
                    </span>
                    <span class="hero-pill hero-pill--muted">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Yaklaşık 5 dakika
                    </span>
                </div>

                <h1>Kayıt başvurusu</h1>
                <p class="lead">
                    Aşağıdaki adımlarla öğrenci kaydını tamamlayın. Zorunlu alanlar kırmızı yıldız ile işaretlenmiştir.
                    Verileriniz yalnızca kayıt ve iletişim süreçleri için kullanılır; üçüncü taraflarla paylaşılmaz.
                </p>
            </div>

            <aside class="hero-panel" aria-labelledby="hero-how">
                <p class="hero-panel-kicker" id="hero-how">Nasıl işler?</p>
                <ol class="hero-steps">
                    <li>
                        <span class="hero-step-num" aria-hidden="true">1</span>
                        <span><strong>Formu</strong> eksiksiz doldurun ve gönderin.</span>
                    </li>
                    <li>
                        <span class="hero-step-num" aria-hidden="true">2</span>
                        <span>Ekibimiz başvuruyu <strong>inceleyip</strong> size döner.</span>
                    </li>
                    <li>
                        <span class="hero-step-num" aria-hidden="true">3</span>
                        <span>Uygunluk ve kayıt için <strong>son adımlar</strong> paylaşılır.</span>
                    </li>
                </ol>
                <div class="hero-trustbar">
                    <span>KVKK kapsamında işlenir</span>
                    <span>Güvenli bağlantı (HTTPS)</span>
                </div>
            </aside>
        </div>
    </header>

    @if (session('success'))
        <div class="alert success" role="status">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert error" role="alert">
            <strong>Lütfen formu kontrol edin</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-shell" method="POST" action="{{ route('form.store') }}">
        @csrf

        <section class="section" aria-labelledby="sec-student">
            <div class="section-title">
                <div class="section-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                </div>
                <div>
                    <h2 id="sec-student">Öğrenci bilgileri</h2>
                    <p>Kimlik, iletişim ve okul bilgileri; eksiksiz doldurulması kayıt sürecini hızlandırır.</p>
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="student_name">Ad <span class="required">*</span></label>
                    <input id="student_name" name="student_name" value="{{ old('student_name') }}" required autocomplete="given-name">
                </div>
                <div class="field">
                    <label for="student_surname">Soyad <span class="required">*</span></label>
                    <input id="student_surname" name="student_surname" value="{{ old('student_surname') }}" required autocomplete="family-name">
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="identity_number">T.C. kimlik numarası <span class="required">*</span></label>
                    <input id="identity_number" name="identity_number" inputmode="numeric" maxlength="11" pattern="[0-9]{11}" value="{{ old('identity_number') }}" required autocomplete="off">
                    <span class="hint">11 haneli olmalıdır.</span>
                </div>
                <div class="field">
                    <label for="birth_date">Doğum tarihi <span class="required">*</span></label>
                    <input id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}" required>
                    <span class="hint">Tarihi takvimden seçin.</span>
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="gender">Cinsiyet</label>
                    <select id="gender" name="gender">
                        <option value="" @selected(old('gender', '') === '')>Seçiniz (isteğe bağlı)</option>
                        <option value="kadin" @selected(old('gender') === 'kadin')>Kadın</option>
                        <option value="erkek" @selected(old('gender') === 'erkek')>Erkek</option>
                        <option value="diger" @selected(old('gender') === 'diger')>Diğer</option>
                        <option value="belirtmek_istemiyorum" @selected(old('gender') === 'belirtmek_istemiyorum')>Belirtmek istemiyorum</option>
                    </select>
                </div>
                <div class="field">
                    <label for="student_phone">Öğrenci cep telefonu</label>
                    <input id="student_phone" type="tel" name="student_phone" value="{{ old('student_phone') }}" inputmode="tel" autocomplete="tel-national" placeholder="İsteğe bağlı">
                    <span class="hint">Varsa öğrencinin size ulaşılabileceği hat.</span>
                </div>
            </div>

            <div class="field">
                <label for="grade_level">Sınıf / düzey</label>
                <input id="grade_level" type="text" name="grade_level" value="{{ old('grade_level') }}" placeholder="Örn: 4. sınıf, 9. sınıf, anaokulu son sınıf…" maxlength="120">
                <span class="hint">Öğrencinin şu anki sınıf veya eğitim düzeyi (isteğe bağlı).</span>
            </div>

            <div class="field">
                <label for="address">Adres <span class="required">*</span></label>
                <textarea id="address" name="address" required autocomplete="street-address">{{ old('address') }}</textarea>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="proximity_degree">Yakınlık derecesi</label>
                    <input id="proximity_degree" name="proximity_degree" value="{{ old('proximity_degree') }}" placeholder="Örn: Anne, baba, vasi">
                </div>
                <div class="field">
                    <label for="current_school">Şu an okuduğu okul adı <span class="required">*</span></label>
                    <input id="current_school" name="current_school" value="{{ old('current_school') }}" required autocomplete="organization">
                </div>
            </div>

            <div class="field">
                <label for="health_issue">Sağlık problemi (varsa)</label>
                <textarea id="health_issue" name="health_issue" placeholder="Varsa kısa olarak yazınız">{{ old('health_issue') }}</textarea>
            </div>
        </section>

        <section class="section" aria-labelledby="sec-parent">
            <div class="section-title">
                <div class="section-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.09 9.09 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                </div>
                <div>
                    <h2 id="sec-parent">Veli bilgileri</h2>
                    <p>Birinci derecede iletişim kurulacak veli veya vasi.</p>
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="parent_name">Veli adı <span class="required">*</span></label>
                    <input id="parent_name" name="parent_name" value="{{ old('parent_name') }}" required autocomplete="section-parent given-name">
                </div>
                <div class="field">
                    <label for="parent_surname">Veli soyadı <span class="required">*</span></label>
                    <input id="parent_surname" name="parent_surname" value="{{ old('parent_surname') }}" required autocomplete="section-parent family-name">
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="parent_phone">Telefon numarası <span class="required">*</span></label>
                    <input id="parent_phone" type="tel" name="parent_phone" value="{{ old('parent_phone') }}" required autocomplete="tel-national">
                </div>
                <div class="field">
                    <label for="parent_email">E-posta adresi</label>
                    <input id="parent_email" type="email" name="parent_email" value="{{ old('parent_email') }}" autocomplete="email">
                </div>
            </div>

            <div class="field">
                <label for="parent_job">Veli mesleği</label>
                <input id="parent_job" name="parent_job" value="{{ old('parent_job') }}" autocomplete="organization-title">
            </div>
        </section>

        <section class="section" aria-labelledby="sec-emergency">
            <div class="section-title">
                <div class="section-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </div>
                <div>
                    <h2 id="sec-emergency">Acil durum iletişimi</h2>
                    <p>Veliye ulaşılamadığında aranacak kişi.</p>
                </div>
            </div>

            <div class="grid">
                <div class="field">
                    <label for="emergency_name">Ad soyad <span class="required">*</span></label>
                    <input id="emergency_name" name="emergency_name" value="{{ old('emergency_name') }}" required autocomplete="off">
                </div>
                <div class="field">
                    <label for="emergency_phone">Telefon numarası <span class="required">*</span></label>
                    <input id="emergency_phone" type="tel" name="emergency_phone" value="{{ old('emergency_phone') }}" required autocomplete="tel-national">
                </div>
            </div>
        </section>

        <section class="section" aria-labelledby="sec-classes">
            <div class="section-title">
                <div class="section-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0112 3.364v14.25a8.985 8.985 0 00-6-2.292m0-14.25V18M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"/></svg>
                </div>
                <div>
                    <h2 id="sec-classes">Katılmak istediğiniz sınıflar</h2>
                    <p>Birden fazla seçim yapabilirsiniz.</p>
                </div>
            </div>

            @if ($classes->isEmpty())
                <p class="hint">Şu anda listelenecek aktif sınıf bulunmuyor. Lütfen yönetici ile iletişime geçin.</p>
            @else
                <div class="checks" role="group" aria-labelledby="sec-classes">
                    @foreach ($classes as $class)
                        <label class="check">
                            <input type="checkbox" name="classes[]" value="{{ $class->id }}"
                                {{ collect(old('classes', []))->contains((string) $class->id) ? 'checked' : '' }}>
                            <span class="check-mark" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <span class="check-body">
                                <span class="check-title">{{ $class->name }}</span>
                                @if ($class->description)
                                    <span class="check-desc">{{ $class->description }}</span>
                                @endif
                            </span>
                        </label>
                    @endforeach
                </div>
                <p class="checks-note">En az bir sınıf seçimi zorunludur.</p>
            @endif
        </section>

        <div class="kvkk" role="note">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.12a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
            <span>Kişisel verileriniz, 6698 sayılı KVKK kapsamında yalnızca kayıt süreci ile sınırlı olarak işlenecektir.</span>
        </div>

        <div class="submit-wrap">
            <button class="btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                Kayıt formunu gönder
            </button>
        </div>
    </form>

</div>
</body>
</html>
