<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yönetici girişi | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f6f7fb;
            --panel: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e5e7eb;
            --accent1: #ff8a00;
            --accent2: #ffc837;
            --danger: #dc2626;
            --shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
            --radius: 16px;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "DM Sans", ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: radial-gradient(1200px 600px at 10% 0%, rgba(255, 138, 0, 0.25), transparent 55%),
                radial-gradient(900px 500px at 90% 10%, rgba(255, 200, 55, 0.22), transparent 55%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 22px;
            -webkit-font-smoothing: antialiased;
        }
        .wrap {
            width: min(920px, 100%);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 18px;
            align-items: stretch;
        }
        @media (max-width: 900px) {
            .wrap { grid-template-columns: 1fr; }
        }
        .hero {
            border-radius: var(--radius);
            padding: 26px;
            color: #111827;
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.35);
            overflow: hidden;
            position: relative;
        }
        .hero h1 {
            margin: 0;
            font-size: clamp(1.5rem, 4vw, 2rem);
            line-height: 1.1;
            letter-spacing: -0.02em;
            font-weight: 700;
        }
        .hero p {
            margin: 12px 0 0;
            color: rgba(17, 24, 39, 0.88);
            font-size: 15px;
            line-height: 1.55;
        }
        .hero .note {
            margin-top: 14px;
            font-size: 13px;
            color: rgba(17, 24, 39, 0.75);
            line-height: 1.45;
        }
        .blob {
            position: absolute;
            right: -60px;
            top: -60px;
            width: 220px;
            height: 220px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.35);
            filter: blur(2px);
        }
        .hero-inner { position: relative; }
        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 22px;
        }
        label.field-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            font: inherit;
            font-size: 16px;
        }
        input:focus {
            outline: none;
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.2);
        }
        .field { margin-bottom: 16px; }
        .remember-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            margin: 4px 0 18px;
            min-height: 24px;
        }
        .remember-row input[type="checkbox"] {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin: 0;
            cursor: pointer;
            accent-color: #ea580c;
        }
        .remember-row label {
            margin: 0;
            padding: 0;
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            line-height: 1.2;
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
        }
        .btn {
            width: 100%;
            border: 0;
            border-radius: 12px;
            padding: 13px 14px;
            font: inherit;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            color: #111827;
            box-shadow: 0 14px 30px rgba(255, 138, 0, 0.22);
        }
        .btn:hover { filter: brightness(1.02); }
        .muted {
            color: var(--muted);
            font-size: 13px;
            margin-top: 16px;
            text-align: center;
        }
        .muted a {
            font-weight: 700;
            color: #c2410c;
            text-decoration: underline;
        }
        .flash {
            margin-bottom: 14px;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #fff;
        }
        .flash.error {
            border-color: #fecaca;
            background: #fef2f2;
            color: #991b1b;
        }
        .flash.error strong {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
        }
        .required { color: var(--danger); }
    </style>
</head>
<body>
<div class="wrap">
    <section class="hero">
        <div class="blob" aria-hidden="true"></div>
        <div class="hero-inner">
            <h1>Yönetici paneline giriş</h1>
            <p>Başvuruları yönetin, sınıfları oluşturun ve site ayarlarını düzenleyin.</p>
            <p class="note">Güvenlik için giriş sonrası oturum yenilenir.</p>
        </div>
    </section>

    <section class="card">
        @if ($errors->any())
            <div class="flash error" role="alert">
                <strong>Giriş başarısız</strong>
                <ul style="margin: 0; padding-left: 1.1em">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="field">
                <label class="field-label" for="login-email">E-posta <span class="required">*</span></label>
                <input id="login-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>
            <div class="field">
                <label class="field-label" for="login-password">Şifre <span class="required">*</span></label>
                <input id="login-password" type="password" name="password" required autocomplete="current-password">
            </div>
            <div class="remember-row">
                <input id="remember" type="checkbox" name="remember" value="1">
                <label for="remember">Beni hatırla</label>
            </div>
            <button class="btn" type="submit">Giriş yap</button>
        </form>

        <div class="muted">
            Kayıt formu: <a href="{{ route('form.create') }}">Ana sayfa</a>
        </div>
    </section>
</div>
</body>
</html>
