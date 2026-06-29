<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0"> 
    <title>{{ config('app.name', 'Sistem Dasa Wisma') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO PKK PNG.png') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1e3a5f 0%, #2d6a4f 100%);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed { width: 70px; }

        .sidebar.collapsed .sidebar-brand h6,
        .sidebar.collapsed .sidebar-brand small,
        .sidebar.collapsed .nav-section,
        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .user-info .user-detail,
        .sidebar.collapsed .btn-logout span { display: none; }

        .sidebar.collapsed .sidebar-brand img { width: 40px; height: 40px; }
        .sidebar.collapsed .nav-link { justify-content: center; padding: 12px; border-left: none; }
        .sidebar.collapsed .nav-link i { font-size: 1.3rem; width: auto; }
        .sidebar.collapsed .user-info { justify-content: center; }
        .sidebar.collapsed .btn-logout { padding: 8px 0; text-align: center; }

        .sidebar-brand {
            padding: 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            transition: all 0.3s;
        }

        .sidebar-brand img {
            width: 55px; height: 55px;
            object-fit: contain;
            margin-bottom: 8px;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3));
            transition: all 0.3s;
        }

        .sidebar-brand h6 {
            color: white; font-weight: 700;
            font-size: 0.82rem; line-height: 1.4; margin: 0;
        }

        .sidebar-brand small { color: rgba(255,255,255,0.6); font-size: 0.7rem; }

        .sidebar-nav {
            flex: 1; padding: 12px 0;
            overflow-y: auto; overflow-x: hidden;
        }

        .nav-section {
            padding: 8px 16px 4px;
            font-size: 0.65rem; font-weight: 700;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase; letter-spacing: 1px;
            white-space: nowrap;
        }

        .sidebar-nav .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 16px;
            color: rgba(255,255,255,0.8);
            font-size: 0.88rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            text-decoration: none; white-space: nowrap;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white; border-left-color: rgba(255,255,255,0.5);
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255,255,255,0.15);
            color: white; border-left-color: white; font-weight: 600;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.1rem; width: 20px;
            text-align: center; flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .user-info {
            display: flex; align-items: center;
            gap: 10px; margin-bottom: 10px; overflow: hidden;
        }

        .user-avatar {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem; color: white; flex-shrink: 0;
        }

        .user-detail .user-name {
            color: white; font-size: 0.82rem;
            font-weight: 600; margin: 0; white-space: nowrap;
        }

        .user-detail .user-role {
            color: rgba(255,255,255,0.6); font-size: 0.68rem; margin: 0;
        }

        .btn-logout {
            width: 100%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white; border-radius: 8px;
            padding: 8px; font-size: 0.82rem;
            cursor: pointer; transition: all 0.2s; white-space: nowrap;
        }

        .btn-logout:hover { background: rgba(255,255,255,0.2); }

        .main-content {
            margin-left: 260px; min-height: 100vh;
            display: flex; flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded { margin-left: 70px; }

        .topbar {
            background: white; padding: 12px 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex; align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }

        .topbar h5 {
            margin: 0; font-weight: 700;
            color: #1e3a5f; font-size: 1rem;
        }

        .btn-toggle {
            background: none; border: none;
            font-size: 1.3rem; color: #1e3a5f;
            cursor: pointer; padding: 4px 8px;
            border-radius: 6px; transition: background 0.2s;
        }

        .btn-toggle:hover { background: #f1f5f9; }

        .page-content { padding: 24px; flex: 1; }

        .sidebar-overlay {
            display: none; position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 999;
        }

        .sidebar-overlay.show { display: block; }

        .sidebar.collapsed .nav-link { position: relative; }

        @media (max-width: 768px) {
            .sidebar { left: -260px; width: 260px !important; }
            .sidebar.mobile-open { left: 0; }
            .sidebar.collapsed { left: -260px; width: 260px !important; }
            .main-content { margin-left: 0 !important; }

        /* ===== RESPONSIVE ===== */

/* Tablet (576px - 768px) */
@media (max-width: 768px) {
    .sidebar { left: -260px; width: 260px !important; }
    .sidebar.mobile-open { left: 0; }
    .sidebar.collapsed { left: -260px; width: 260px !important; }
    .main-content { margin-left: 0 !important; }
    .page-content { padding: 16px; }
    .topbar { padding: 10px 16px; }
    .topbar h5 { font-size: 0.9rem; }
}

/* Smartphone (< 576px) */
@media (max-width: 576px) {
    .page-content { padding: 12px; }
    .topbar { padding: 8px 12px; }
    .topbar h5 { font-size: 0.85rem; }

    /* Sembunyikan badge role di topbar kecil */
    .topbar .badge { display: none; }

    /* Table scroll horizontal */
    .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

    /* Card full width di mobile */
    .row > [class*="col-md"] { width: 100% !important; }

    /* Form card full width */
    .form-card { border-radius: 12px; }

    /* Tombol aksi stack */
    .d-flex.gap-2 { flex-wrap: wrap; }
    .btn-aksi { flex-direction: row; flex-wrap: wrap; }

    /* Modal lebih kecil */
    .modal-dialog { margin: 12px; }
    .modal-content { border-radius: 12px !important; }
}

        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeMobileSidebar()"></div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/LOGO PKK PNG.png') }}" alt="Logo PKK">
            <h6>Sistem Informasi<br>Dasa Wisma</h6>
            <small>PKK Desa Galanggang</small>
        </div>

        <div class="sidebar-nav">
            <div class="nav-section">Menu Utama</div>

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('keluarga.index') }}"
               class="nav-link {{ request()->routeIs('keluarga.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>Data Keluarga</span>
            </a>

            @if(auth()->user()->isAdmin() || auth()->user()->isKader())
                <div class="nav-section">Manajemen</div>

                <a href="{{ route('rts.index') }}"
                   class="nav-link {{ request()->routeIs('rts.*') ? 'active' : '' }}">
                    <i class="bi bi-house-fill"></i>
                    <span>Manajemen RT</span>
                </a>

                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-person-fill-gear"></i>
                    <span>Manajemen User</span>
                </a>

                <div class="nav-section">Pengaturan</div>

                <a href="{{ route('profil.edit') }}"
                   class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill"></i>
                    <span>Profil Dasa Wisma</span>
                </a>
            @endif

            <a href="{{ route('profile.edit') }}"
               class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                <span>Profil Akun</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">👤</div>
                <div class="user-detail">
                    <p class="user-name">{{ Auth::user()->name }}</p>
                    <p class="user-role">{{ strtoupper(Auth::user()->role) }}</p>
                </div>
            </div>
            <button type="button" class="btn-logout"
                    data-bs-toggle="modal" data-bs-target="#modalLogout">
                <i class="bi bi-box-arrow-left"></i>
                <span> Keluar</span>
            </button>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn-toggle" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <h5>{{ $header ?? 'Dashboard' }}</h5>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill text-white"
                      style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f); font-size:0.75rem">
                    {{ strtoupper(Auth::user()->role) }}
                </span>
                <span style="font-size:0.85rem; color:#6b7280">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <div class="page-content">
            {{ $slot }}
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Modal Logout --}}
    <div class="modal fade" id="modalLogout" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:16px; border:none">
                <div class="modal-header border-0"
                     style="background: linear-gradient(135deg, #1e3a5f, #2d6a4f); border-radius:16px 16px 0 0">
                    <h5 class="modal-title text-white fw-bold">
                        <i class="bi bi-box-arrow-left me-2"></i> Konfirmasi Keluar
                    </h5>
                </div>
                <div class="modal-body p-4 text-center">
                    <div style="font-size:3rem; margin-bottom:12px">👋</div>
                    <h6 class="fw-bold mb-2" style="color:#1e3a5f">Yakin ingin keluar?</h6>
                    <p class="text-muted mb-0" style="font-size:0.85rem">
                        Kamu akan keluar dari Sistem Informasi Dasa Wisma.
                    </p>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                            style="border-radius:8px; padding:8px 20px"
                            data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm text-white fw-semibold"
                                style="background: linear-gradient(90deg, #1e3a5f, #2d6a4f);
                                       border-radius:8px; padding:8px 20px; border:none">
                            <i class="bi bi-box-arrow-left me-1"></i> Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:16px; border:none">
                <div class="modal-header border-0"
                     style="background: linear-gradient(135deg, #991b1b, #dc2626); border-radius:16px 16px 0 0">
                    <h5 class="modal-title text-white fw-bold">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                    </h5>
                </div>
                <div class="modal-body p-4 text-center">
                    <div style="font-size:3rem; margin-bottom:12px">🗑️</div>
                    <h6 class="fw-bold mb-2" style="color:#991b1b">Yakin ingin menghapus?</h6>
                    <p class="text-muted mb-0" style="font-size:0.85rem">
                        Data <strong id="namaHapus"></strong> akan dihapus permanen dan tidak bisa dikembalikan.
                    </p>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                            style="border-radius:8px; padding:8px 20px"
                            data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </button>
                    <form id="formHapus" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm text-white fw-semibold"
                                style="background: linear-gradient(90deg, #991b1b, #dc2626);
                                       border-radius:8px; padding:8px 20px; border:none">
                            <i class="bi bi-trash-fill me-1"></i> Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast Notifikasi --}}
    <div id="toastNotif" style="
        position: fixed; top: 24px; right: 24px; z-index: 9999;
        min-width: 280px; padding: 14px 20px; border-radius: 12px;
        color: white; font-size: 0.88rem; font-weight: 600;
        display: none; align-items: center; gap: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        transition: opacity 0.5s ease; opacity: 0;">
        <span id="toastIcon" style="font-size:1.2rem"></span>
        <span id="toastMsg"></span>
    </div>

    {{-- Semua Script --}}
    <script>
        const sidebar     = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const overlay     = document.getElementById('sidebarOverlay');
        const isMobile    = () => window.innerWidth <= 768;

        if (!isMobile() && localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
        }

        function toggleSidebar() {
            if (isMobile()) {
                sidebar.classList.toggle('mobile-open');
                overlay.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            }
        }

        function closeMobileSidebar() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('show');
        }

        window.addEventListener('resize', () => {
            if (!isMobile()) {
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('show');
                if (localStorage.getItem('sidebarCollapsed') === 'true') {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                }
            } else {
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        });

        function konfirmasiHapus(url, nama) {
            document.getElementById('namaHapus').textContent = nama;
            document.getElementById('formHapus').action = url;
            new bootstrap.Modal(document.getElementById('modalHapus')).show();
        }

        function tampilToast(pesan, tipe = 'success') {
            const toast = document.getElementById('toastNotif');
            const icon  = document.getElementById('toastIcon');
            const msg   = document.getElementById('toastMsg');
            msg.textContent = pesan;
            if (tipe === 'success') {
                toast.style.background = 'linear-gradient(90deg, #1e3a5f, #2d6a4f)';
                icon.textContent = '✅';
            } else if (tipe === 'danger') {
                toast.style.background = 'linear-gradient(90deg, #991b1b, #dc2626)';
                icon.textContent = '🗑️';
            }
            toast.style.display = 'flex';
            setTimeout(() => { toast.style.opacity = '1'; }, 10);
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => { toast.style.display = 'none'; }, 500);
            }, 2500);
        }

        @if(session('success'))
            tampilToast("{{ session('success') }}", 'success');
        @endif

        @if(session('danger'))
            tampilToast("{{ session('danger') }}", 'danger');
        @endif
    </script>

</body>
</html>