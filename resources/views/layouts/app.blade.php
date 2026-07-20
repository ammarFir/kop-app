<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="htmlRoot">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sistem Koperasi') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* ===== DEFAULT LIGHT MODE ===== */
        body {
            background: #f4f6f9;
            font-family: 'Nunito', sans-serif;
            transition: background 0.3s, color 0.3s;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: #ffffff;
            color: #2c3e50;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1050;
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        /* Sidebar collapsed (DESKTOP ONLY) */
        body.sidebar-collapsed .sidebar {
            width: 65px;
        }

        body.sidebar-collapsed .sidebar-brand a {
            font-size: 0;
        }

        body.sidebar-collapsed .sidebar-brand a::before {
            content: "K";
            font-size: 22px;
        }

        body.sidebar-collapsed .sidebar-menu li a span {
            display: none;
        }

        body.sidebar-collapsed .sidebar-menu li a i {
            margin-right: 0;
            font-size: 18px;
        }

        body.sidebar-collapsed .sidebar-menu li a {
            text-align: center;
            padding: 12px 0;
        }

        body.sidebar-collapsed .sidebar-toggle-btn span {
            display: none;
        }

        /* Sidebar toggle button (di dalam sidebar) */
        .sidebar-toggle-btn {
            margin-top: auto;
            padding: 15px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
            cursor: pointer;
            transition: 0.2s;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .sidebar-toggle-btn:hover {
            background: #f1f3f5;
            color: #2c3e50;
        }

        body.sidebar-collapsed .sidebar-toggle-btn {
            padding: 15px 0;
            border-top-color: #3d566e;
        }

        body.sidebar-collapsed .sidebar-toggle-btn span {
            display: none;
        }

        .sidebar-toggle-btn i {
            font-size: 20px;
        }

        /* Content wrapper */
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            transition: margin-left 0.3s;
        }

        body.sidebar-collapsed .content-wrapper {
            margin-left: 65px;
        }

        .sidebar-brand {
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 20px;
        }

        .sidebar-brand a {
            color: #2c3e50;
            text-decoration: none;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }

        .sidebar-menu li {
            padding: 0;
        }

        .sidebar-menu li a {
            display: block;
            padding: 12px 20px;
            color: #6c757d;
            text-decoration: none;
            transition: 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: #f1f3f5;
            color: #2c3e50;
            border-left-color: #3498db;
        }

        .sidebar-menu li a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            color: #6c757d;
        }

        .sidebar-menu li a:hover i,
        .sidebar-menu li a.active i {
            color: #2c3e50;
        }

        /* Top navbar */
        .top-navbar {
            background: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .top-navbar .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .top-navbar .user-dropdown .dropdown-menu-custom {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 8px 0;
            min-width: 160px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1060;
            transition: background 0.3s;
        }

        .top-navbar .user-dropdown .dropdown-menu-custom.show {
            display: block;
        }

        .top-navbar .user-dropdown .dropdown-menu-custom a {
            display: block;
            padding: 8px 20px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .top-navbar .user-dropdown .dropdown-menu-custom a:hover {
            background: #f5f5f5;
        }

        .top-navbar .user-dropdown .dropdown-menu-custom hr {
            margin: 4px 0;
        }

        /* TOMBOL TOGGLE DESKTOP (di navbar, untuk collapse) - HANYA DI DESKTOP */
        .sidebar-collapse-toggle {
            background: transparent;
            border: none;
            font-size: 22px;
            color: #555;
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 6px;
            transition: 0.2s;
            display: inline-block;
        }

        .sidebar-collapse-toggle:hover {
            background: #eee;
        }

        html.dark .sidebar-collapse-toggle {
            color: #ddd;
        }

        html.dark .sidebar-collapse-toggle:hover {
            background: #3d3d5c;
        }

        /* TOMBOL TOGGLE MOBILE (di navbar, untuk buka sidebar) - HANYA DI HP */
        .sidebar-toggle-mobile {
            display: none;
            background: transparent;
            border: none;
            font-size: 22px;
            color: #555;
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 6px;
            transition: 0.2s;
        }

        .sidebar-toggle-mobile:hover {
            background: #eee;
        }

        html.dark .sidebar-toggle-mobile {
            color: #ddd;
        }

        html.dark .sidebar-toggle-mobile:hover {
            background: #3d3d5c;
        }

        /* Overlay untuk mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }

        /* ===== DARK MODE ===== */
        html.dark body {
            background: #12121f;
            color: #e0e0e0;
        }

        html.dark .sidebar {
            background: #1e1e32;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.3);
        }

        html.dark .sidebar-brand {
            border-bottom-color: #2d2d44;
        }

        html.dark .sidebar-brand a {
            color: #ecf0f1;
        }

        html.dark .sidebar-menu li a {
            color: #bdc3c7;
        }

        html.dark .sidebar-menu li a:hover,
        html.dark .sidebar-menu li a.active {
            background: #2d2d44;
            color: #fff;
            border-left-color: #3498db;
        }

        html.dark .sidebar-menu li a i {
            color: #bdc3c7;
        }

        html.dark .sidebar-menu li a:hover i,
        html.dark .sidebar-menu li a.active i {
            color: #fff;
        }

        html.dark .sidebar-toggle-btn {
            border-top-color: #2d2d44;
            color: #bdc3c7;
        }

        html.dark .sidebar-toggle-btn:hover {
            background: #2d2d44;
            color: #fff;
        }

        html.dark .top-navbar {
            background: #2d2d44;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            color: #e0e0e0;
        }

        html.dark .top-navbar .text-dark {
            color: #e0e0e0 !important;
        }

        html.dark .top-navbar .dropdown-menu-custom {
            background: #2d2d44;
            border-color: #444;
        }

        html.dark .top-navbar .dropdown-menu-custom a {
            color: #e0e0e0;
        }

        html.dark .top-navbar .dropdown-menu-custom a:hover {
            background: #3d3d5c;
        }

        html.dark .sidebar-collapse-toggle {
            color: #ddd;
        }

        html.dark .sidebar-collapse-toggle:hover {
            background: #3d3d5c;
        }

        html.dark .sidebar-toggle-mobile {
            color: #ddd;
        }

        html.dark .sidebar-toggle-mobile:hover {
            background: #3d3d5c;
        }

        /* Cards & border radius */
        html.dark .card {
            background: #2d2d44 !important;
            border-color: #3d3d5c !important;
            color: #e0e0e0;
            border-radius: 12px !important;
        }

        html.dark .card-header {
            background: #3d3d5c !important;
            border-bottom: 1px solid #444 !important;
            color: #e0e0e0;
            border-radius: 12px 12px 0 0 !important;
        }

        html.dark .card-body {
            background: #2d2d44 !important;
            color: #e0e0e0;
        }

        html.dark .card-footer {
            background: #3d3d5c !important;
            border-top: 1px solid #444 !important;
            color: #e0e0e0;
            border-radius: 0 0 12px 12px !important;
        }

        /* Tables */
        html.dark .table {
            color: #e0e0e0 !important;
            background: #2d2d44 !important;
        }

        html.dark .table-bordered {
            border-color: #444 !important;
        }

        html.dark .table-bordered td,
        html.dark .table-bordered th {
            border-color: #444 !important;
            background: #2d2d44 !important;
            color: #e0e0e0 !important;
        }

        html.dark .table thead th {
            background: #3d3d5c !important;
            color: #e0e0e0 !important;
            border-color: #444 !important;
        }

        html.dark .table tbody tr {
            background: #2d2d44 !important;
        }

        html.dark .table tbody tr:nth-of-type(odd) {
            background: #3d3d5c !important;
        }

        html.dark .table tbody td {
            background: transparent !important;
            color: #e0e0e0 !important;
        }

        html.dark .table tbody tr:hover {
            background: #4d4d6e !important;
        }

        /* Form inputs */
        html.dark .form-control,
        html.dark .form-select,
        html.dark .form-control:focus {
            background: #1e1e32 !important;
            border-color: #444 !important;
            color: #e0e0e0 !important;
        }

        html.dark .form-control::placeholder {
            color: #888 !important;
        }

        html.dark .form-control:focus {
            border-color: #3498db !important;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25) !important;
        }

        html.dark .input-group-text {
            background: #2d2d44 !important;
            border-color: #444 !important;
            color: #bbb !important;
        }

        html.dark .form-label {
            color: #e0e0e0 !important;
        }

        /* Alerts */
        html.dark .alert-success {
            background: #1e3a2e !important;
            border-color: #2d6a4f !important;
            color: #b7e4c7 !important;
        }

        html.dark .alert-danger {
            background: #3a1e1e !important;
            border-color: #6a2d2d !important;
            color: #e4b7b7 !important;
        }

        html.dark .alert-info {
            background: #1e2a3a !important;
            border-color: #2d4a6a !important;
            color: #b7d4e4 !important;
        }

        html.dark .alert-warning {
            background: #3a3a1e !important;
            border-color: #6a6a2d !important;
            color: #e4e4b7 !important;
        }

        /* Badge */
        html.dark .badge.bg-success {
            background: #2d6a4f !important;
        }

        html.dark .badge.bg-danger {
            background: #6a2d2d !important;
        }

        html.dark .badge.bg-primary {
            background: #2d4a6a !important;
        }

        html.dark .badge.bg-secondary {
            background: #444 !important;
        }

        /* Buttons */
        html.dark .btn-outline-primary {
            color: #5dade2 !important;
            border-color: #5dade2 !important;
        }

        html.dark .btn-outline-primary:hover {
            background: #2d4a6a !important;
            border-color: #5dade2 !important;
            color: #fff !important;
        }

        html.dark .btn-outline-success {
            color: #58d68d !important;
            border-color: #58d68d !important;
        }

        html.dark .btn-outline-success:hover {
            background: #1e3a2e !important;
            border-color: #58d68d !important;
            color: #fff !important;
        }

        html.dark .btn-outline-secondary {
            color: #aaa !important;
            border-color: #666 !important;
        }

        html.dark .btn-outline-secondary:hover {
            background: #444 !important;
            border-color: #aaa !important;
            color: #fff !important;
        }

        html.dark .btn-outline-dark {
            color: #ccc !important;
            border-color: #777 !important;
        }

        html.dark .btn-outline-dark:hover {
            background: #444 !important;
            border-color: #ccc !important;
            color: #fff !important;
        }

        html.dark .btn-primary {
            background: #2d4a6a !important;
            border-color: #2d4a6a !important;
        }

        html.dark .btn-primary:hover {
            background: #3d6a8a !important;
            border-color: #3d6a8a !important;
        }

        html.dark .btn-success {
            background: #1e3a2e !important;
            border-color: #1e3a2e !important;
        }

        html.dark .btn-success:hover {
            background: #2d6a4f !important;
            border-color: #2d6a4f !important;
        }

        html.dark .btn-warning {
            background: #6a6a2d !important;
            border-color: #6a6a2d !important;
            color: #fff !important;
        }

        html.dark .btn-warning:hover {
            background: #8a8a3d !important;
            border-color: #8a8a3d !important;
            color: #fff !important;
        }

        html.dark .btn-danger {
            background: #6a2d2d !important;
            border-color: #6a2d2d !important;
        }

        html.dark .btn-danger:hover {
            background: #8a3d3d !important;
            border-color: #8a3d3d !important;
        }

        html.dark .bg-white {
            background: #2d2d44 !important;
        }

        html.dark .bg-gray-100 {
            background: #3d3d5c !important;
        }

        html.dark .bg-light {
            background: #2d2d44 !important;
        }

        html.dark .text-muted {
            color: #aaa !important;
        }

        html.dark .text-dark {
            color: #e0e0e0 !important;
        }

        html.dark .text-gray-900 {
            color: #e0e0e0 !important;
        }

        /* Dark mode toggle button */
        .dark-toggle {
            background: transparent;
            border: none;
            font-size: 20px;
            color: #555;
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 6px;
            transition: 0.2s;
        }

        .dark-toggle:hover {
            background: #eee;
        }

        html.dark .dark-toggle {
            color: #ddd;
        }

        html.dark .dark-toggle:hover {
            background: #3d3d5c;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {

            /* Sembunyikan toggle collapse desktop di HP */
            .sidebar-collapse-toggle {
                display: none !important;
            }

            /* Tampilkan toggle mobile di HP */
            .sidebar-toggle-mobile {
                display: inline-block !important;
            }

            /* Sidebar di HP - selalu full lebar, tidak terpengaruh collapse */
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            /* Matikan efek collapse di HP */
            body.sidebar-collapsed .sidebar {
                width: 280px !important;
                transform: translateX(-100%);
            }

            body.sidebar-collapsed .sidebar.open {
                transform: translateX(0) !important;
            }

            body.sidebar-collapsed .sidebar-brand a {
                font-size: 22px !important;
            }

            body.sidebar-collapsed .sidebar-brand a::before {
                content: none !important;
            }

            body.sidebar-collapsed .sidebar-menu li a span {
                display: inline !important;
            }

            body.sidebar-collapsed .sidebar-menu li a i {
                margin-right: 12px !important;
                font-size: 16px !important;
            }

            body.sidebar-collapsed .sidebar-menu li a {
                text-align: left !important;
                padding: 12px 20px !important;
            }

            body.sidebar-collapsed .sidebar-toggle-btn span {
                display: inline !important;
            }

            body.sidebar-collapsed .content-wrapper {
                margin-left: 0 !important;
            }

            .content-wrapper {
                margin-left: 0 !important;
            }

            .sidebar-overlay.active {
                display: block;
            }

            .top-navbar {
                flex-wrap: wrap;
                gap: 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Koperasi App</a>
        </div>

        <ul class="sidebar-menu">
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'super_admin')
                    <li>
                        <a href="{{ route('fo.index') }}" class="{{ request()->routeIs('fo.*') ? 'active' : '' }}">
                            <i class="fas fa-users-cog"></i> <span>Data FO</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'fo' || Auth::user()->role == 'super_admin')
                    <li>
                        <a href="{{ route('anggota.index') }}"
                            class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i> <span>Data Anggota</span>
                        </a>
                    </li>
                @endif
            @else
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> <span>Login</span></a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> <span>Register</span></a>
                    </li>
                @endif
            @endauth
        </ul>

        <!-- Tombol Toggle Collapse di SIDEBAR (bawah) -->
        <div class="sidebar-toggle-btn" id="sidebarToggleBtn">
            <i class="fas fa-chevron-left" id="toggleIcon"></i>
            <span id="toggleText">Sembunyikan</span>
        </div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div>
                <!-- Tombol toggle DESKTOP (collapse) -->
                <button class="sidebar-collapse-toggle" id="sidebarCollapseToggle" title="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Tombol toggle MOBILE (buka/tutup overlay) -->
                <button class="sidebar-toggle-mobile" id="sidebarToggleMobile" title="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="ms-2 fw-semibold">@yield('title', 'Dashboard')</span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <!-- DARK MODE TOGGLE -->
                <button class="dark-toggle" id="darkModeToggle" title="Toggle Dark Mode">
                    <i class="fas fa-moon" id="darkIcon"></i>
                </button>

                @auth
                    <div class="user-dropdown">
                        <a href="#" class="text-dark text-decoration-none" onclick="toggleDropdown(event)">
                            <i class="fas fa-user-circle fs-4"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu-custom" id="userDropdownMenu">
                            <a href="{{ route('profile.edit') }}">Profile</a>
                            <hr>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">Logout</a>
                            <form id="logout-form-top" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Main Content -->
        @yield('content')
    </div>

    <script>
        // ===== SIDEBAR TOGGLE (Desktop Collapse) =====
        (function() {
            var body = document.body;
            var toggleBtn = document.getElementById('sidebarCollapseToggle');
            var sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
            var toggleIcon = document.getElementById('toggleIcon');
            var toggleText = document.getElementById('toggleText');

            // Cek local storage
            if (localStorage.getItem('sidebarCollapsed') === 'true' && window.innerWidth >= 768) {
                body.classList.add('sidebar-collapsed');
                toggleIcon.classList.remove('fa-chevron-left');
                toggleIcon.classList.add('fa-chevron-right');
                toggleText.textContent = 'Tampilkan';
            }

            function toggleCollapse() {
                body.classList.toggle('sidebar-collapsed');
                var isCollapsed = body.classList.contains('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);

                if (isCollapsed) {
                    toggleIcon.classList.remove('fa-chevron-left');
                    toggleIcon.classList.add('fa-chevron-right');
                    toggleText.textContent = 'Tampilkan';
                } else {
                    toggleIcon.classList.remove('fa-chevron-right');
                    toggleIcon.classList.add('fa-chevron-left');
                    toggleText.textContent = 'Sembunyikan';
                }
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (window.innerWidth >= 768) {
                        toggleCollapse();
                    }
                });
            }

            if (sidebarToggleBtn) {
                sidebarToggleBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (window.innerWidth >= 768) {
                        toggleCollapse();
                    }
                });
            }

            // ===== SIDEBAR TOGGLE (Mobile) =====
            var mobileToggle = document.getElementById('sidebarToggleMobile');
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebarOverlay');

            if (mobileToggle) {
                mobileToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('open');
                    overlay.classList.toggle('active');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                });
            }

            // Reset collapse state saat resize ke HP
            window.addEventListener('resize', function() {
                if (window.innerWidth < 768) {
                    body.classList.remove('sidebar-collapsed');
                    localStorage.setItem('sidebarCollapsed', 'false');
                    toggleIcon.classList.remove('fa-chevron-right');
                    toggleIcon.classList.add('fa-chevron-left');
                    toggleText.textContent = 'Sembunyikan';
                }
            });
        })();

        // ===== DROPDOWN USER =====
        function toggleDropdown(e) {
            e.preventDefault();
            var menu = document.getElementById('userDropdownMenu');
            menu.classList.toggle('show');
        }

        document.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.user-dropdown');
            if (dropdown) {
                var menu = document.getElementById('userDropdownMenu');
                if (!dropdown.contains(event.target)) {
                    menu.classList.remove('show');
                }
            }
        });

        // ===== DARK MODE TOGGLE =====
        (function() {
            var html = document.getElementById('htmlRoot');
            var toggleBtn = document.getElementById('darkModeToggle');
            var icon = document.getElementById('darkIcon');

            if (localStorage.getItem('darkMode') === 'true') {
                html.classList.add('dark');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }

            toggleBtn.addEventListener('click', function() {
                html.classList.toggle('dark');
                if (html.classList.contains('dark')) {
                    localStorage.setItem('darkMode', 'true');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    localStorage.setItem('darkMode', 'false');
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            });
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
