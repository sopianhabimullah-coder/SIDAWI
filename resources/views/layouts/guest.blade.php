<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>{{ config('app.name', 'Sistem Dasa Wisma') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO PKK PNG.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/LOGO PKK.png') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3a5f 0%, #2d6a4f 50%, #1e3a5f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            display: flex;
            width: 900px;
            min-height: 520px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(160deg, #2d6a4f, #1e3a5f);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
        }

        .left-panel .logo-icon { font-size: 4rem; margin-bottom: 16px; }

        .left-panel h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .left-panel p { font-size: 0.9rem; opacity: 0.8; line-height: 1.6; }

        .divider {
            width: 50px;
            height: 3px;
            background: rgba(255,255,255,0.4);
            border-radius: 2px;
            margin: 16px auto;
        }

        .info-badges {
            display: flex;
            gap: 8px;
            margin-top: 24px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .badge-item {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.75rem;
        }

        .right-panel {
            flex: 1;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 40px;
        }

        .right-panel h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e3a5f;
            margin-bottom: 6px;
        }

        .right-panel .subtitle {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 32px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            margin-bottom: 6px;
        }

        .form-control {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
            outline: none;
        }

        .btn-login {
            background: linear-gradient(135deg, #2d6a4f, #1e3a5f);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(45,106,79,0.3);
        }

        .forgot-link {
            color: #2d6a4f;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .forgot-link:hover { text-decoration: underline; }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }

        @media (max-width: 768px) {
    .login-wrapper {
        flex-direction: column;
        width: 95%;
        min-height: auto;
        margin: 20px auto;
    }

    .left-panel {
        padding: 24px 20px;
        min-height: auto;
    }

    .left-panel h1 { font-size: 1.3rem; }
    .left-panel .logo-icon img { width: 70px; height: 70px; }
    .info-badges { display: none; }

    .right-panel { padding: 24px 20px; }
    .right-panel h2 { font-size: 1.3rem; }
}

@media (max-width: 576px) {
    .login-wrapper {
        width: 100%;
        border-radius: 0;
        margin: 0;
        min-height: 100vh;
    }

    .left-panel { padding: 20px 16px; }
    .right-panel { padding: 20px 16px; }
    .btn-login { font-size: 0.9rem; }
}
    </style>
</head>
<body>
    <div class="login-wrapper">

        {{-- Panel Kiri --}}
        <div class="left-panel">
            <div class="logo-icon">
            <img src="{{ asset('images/LOGO PKK PNG.png') }}"
         alt="Logo PKK"
         style="width: 100px; height: 100px; object-fit: contain;">
            </div>
            <h1>Sistem Informasi Dasa Wisma</h1>
            <div class="divider"></div>
            <p>Pendataan dan Rekapitulasi<br>Kelompok Dasa Wisma Berbasis Web</p>
            <div class="info-badges">
                <span class="badge-item">📊 Rekapitulasi</span>
                <span class="badge-item">👨‍👩‍👧 Data Keluarga</span>
                <span class="badge-item">📄 Export PDF</span>
                <span class="badge-item">📥 Export Excel</span>
            </div>
        </div>

        {{-- Panel Kanan (slot dari login.blade.php) --}}
        <div class="right-panel">
            <h2>Selamat Datang </h2>
            <p class="subtitle">Silakan masuk untuk melanjutkan</p>
            {{ $slot }}
        </div>

    </div>
</body>
</html>