<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Yönetim paneli') | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <style>
        :root{
            --bg:#f6f7fb;
            --panel:#ffffff;
            --text:#0f172a;
            --muted:#64748b;
            --border:#e5e7eb;
            --sidebar:#0b1220;
            --sidebar2:#111827;
            --accent1:#ff8a00;
            --accent2:#ffc837;
            --accent-text:#111827;
            --danger:#dc2626;
            --shadow:0 12px 30px rgba(15,23,42,.08);
            --radius:14px;
            --sidebar-w:270px;
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family:"DM Sans",ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
            background:var(--bg);color:var(--text);
            -webkit-font-smoothing:antialiased;
        }
        a{color:inherit;text-decoration:none}
        .app{display:flex;min-height:100vh}
        .sidebar{
            width:var(--sidebar-w);
            background:linear-gradient(180deg,var(--sidebar),var(--sidebar2));
            color:#e5e7eb;
            padding:22px 18px;
            position:sticky;top:0;height:100vh;
            border-right:1px solid rgba(255,255,255,.06);
        }
        .brand{
            padding:14px 14px 18px;
            border-radius:var(--radius);
            background:rgba(255,255,255,.06);
            border:1px solid rgba(255,255,255,.08);
            margin-bottom:18px;
        }
        .brand-title{font-weight:800;letter-spacing:.2px;line-height:1.15}
        .brand-sub{font-size:12px;color:rgba(229,231,235,.72);margin-top:6px}
        .nav{display:flex;flex-direction:column;gap:6px;margin-top:10px}
        .nav a{
            display:flex;align-items:center;gap:10px;
            padding:12px 12px;border-radius:12px;
            color:rgba(229,231,235,.92);
            border:1px solid transparent;
        }
        .nav a:hover{background:rgba(255,255,255,.06)}
        .nav a.active{
            background:rgba(255,255,255,.10);
            border-color:rgba(255,255,255,.10);
        }
        .dot{width:9px;height:9px;border-radius:999px;background:rgba(255,255,255,.35)}
        .main{flex:1;display:flex;flex-direction:column;min-width:0}
        .topbar{
            display:flex;justify-content:space-between;align-items:center;
            padding:18px 22px;border-bottom:1px solid var(--border);
            background:rgba(255,255,255,.85);backdrop-filter:saturate(180%) blur(10px);
            position:sticky;top:0;z-index:10;
        }
        .page-title{font-weight:800;font-size:18px}
        .crumb{font-size:13px;color:var(--muted);margin-top:4px}
        .top-actions{display:flex;gap:10px;align-items:center}
        .pill{
            font-size:12px;color:var(--muted);
            border:1px solid var(--border);
            background:#fff;padding:8px 10px;border-radius:999px;
        }
        .btn{
            border:0;border-radius:12px;padding:10px 14px;font-weight:700;cursor:pointer;
            background:linear-gradient(135deg,var(--accent1),var(--accent2));
            color:var(--accent-text);
            box-shadow:0 12px 26px rgba(255,138,0,.22);
        }
        .btn.secondary{
            background:#fff;color:var(--text);
            border:1px solid var(--border);
            box-shadow:none;
        }
        .content{padding:22px}
        .card{
            background:var(--panel);border:1px solid var(--border);
            border-radius:var(--radius);box-shadow:var(--shadow);
            padding:18px;
        }
        .grid{display:grid;gap:14px}
        .grid.cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}
        @media (max-width: 980px){
            .app{flex-direction:column}
            .sidebar{position:relative;height:auto;width:100%}
            .grid.cols-3{grid-template-columns:1fr}
        }
        .kpi{padding:16px}
        .kpi .label{font-size:13px;color:var(--muted)}
        .kpi .value{font-size:28px;font-weight:900;margin-top:6px}
        table{width:100%;border-collapse:separate;border-spacing:0}
        th,td{padding:12px 10px;border-bottom:1px solid var(--border);text-align:left;font-size:14px}
        th{font-size:12px;color:var(--muted);text-transform:uppercase;letter-spacing:.06em}
        tr:last-child td{border-bottom:0}
        .badge{display:inline-flex;align-items:center;gap:6px;padding:6px 10px;border-radius:999px;font-size:12px;font-weight:800;border:1px solid var(--border);background:#fff}
        .flash{margin-bottom:14px;padding:12px 14px;border-radius:12px;border:1px solid var(--border);background:#fff}
        .flash.success{border-color:#bbf7d0;background:#ecfdf5;color:#065f46}
        .flash.error{border-color:#fecaca;background:#fef2f2;color:#991b1b}
        .muted{color:var(--muted)}
        .stack{display:flex;flex-direction:column;gap:14px}
        label{font-size:13px;font-weight:700;color:#334155}
        input,textarea,select{
            width:100%;padding:11px 12px;border-radius:12px;border:1px solid var(--border);
            background:#fff;font:inherit;
        }
        textarea{min-height:110px;resize:vertical}
        .field{display:flex;flex-direction:column;gap:8px}
        .grid-form{display:grid;gap:12px;grid-template-columns:repeat(2,minmax(0,1fr))}
        @media (max-width: 860px){ .grid-form{grid-template-columns:1fr} }
        .small{font-size:12px;color:var(--muted)}
        .required{color:var(--danger)}
    </style>
    @stack('head')
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-title">{{ config('app.name') }}</div>
            <div class="brand-sub">Yönetim paneli</div>
        </div>

        <nav class="nav">
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <span class="dot"></span> Gösterge paneli
            </a>
            <a class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}" href="{{ route('admin.applications.index') }}">
                <span class="dot"></span> Başvurular
            </a>
            <a class="{{ request()->routeIs('admin.classes.*') ? 'active' : '' }}" href="{{ route('admin.classes.index') }}">
                <span class="dot"></span> Sınıf oluştur
            </a>
            <a class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}">
                <span class="dot"></span> Profil ayarları
            </a>
            <a class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                <span class="dot"></span> Site ayarları
            </a>
        </nav>

        <div style="margin-top:auto;padding-top:18px">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn secondary" type="submit" style="width:100%">Çıkış</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="page-title">@yield('heading')</div>
                <div class="crumb">@yield('subheading')</div>
            </div>
            <div class="top-actions">
                <div class="pill">{{ auth()->user()?->email }}</div>
                <a class="btn secondary" href="{{ route('form.create') }}" target="_blank">Kayıt formu</a>
            </div>
        </header>

        <section class="content">
            @if (session('success'))
                <div class="flash success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="flash error">
                    <div style="font-weight:900;margin-bottom:6px">Form hataları</div>
                    <ul style="margin:0;padding-left:18px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </section>
    </main>
</div>
@stack('scripts')
</body>
</html>
