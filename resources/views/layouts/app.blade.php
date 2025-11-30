<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Logistik Kodim 0611 Garut')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --army-dark: #2d5016;
            --army-medium: #3d6b1f;
            --army-light: #556b2f;
            --army-accent: #8fbc8f;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        .navbar {
            background-color: var(--army-dark);
            border-bottom: 3px solid var(--army-medium);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-logo {
            height: 50px;
            width: auto;
        }
        
        .navbar-title {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }
        
        .navbar-title .title-main {
            font-size: 18px;
            font-weight: bold;
        }
        
        .navbar-title .title-sub {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .navbar-text {
            color: #fff !important;
            font-size: 14px;
        }
        
        .sidebar {
            background-color: var(--army-medium);
            color: white;
            min-height: 100vh;
            padding: 20px 0;
            border-right: 3px solid var(--army-dark);
        }
        
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        
        .sidebar a:hover,
        .sidebar a.active {
            background-color: var(--army-light);
            border-left-color: var(--army-accent);
            color: #fff;
        }
        
        .sidebar hr {
            border-color: var(--army-dark) !important;
        }
        
        .main-content {
            padding: 30px;
        }
        
        .card {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: none;
        }
        
        .card-header {
            background-color: var(--army-medium) !important;
            border-bottom: 2px solid var(--army-dark);
        }
        
        .btn-primary {
            background-color: var(--army-medium);
            border-color: var(--army-dark);
        }
        
        .btn-primary:hover {
            background-color: var(--army-light);
            border-color: var(--army-dark);
        }
        
        .btn-warning {
            background-color: #d4a574;
            border-color: #b8926b;
            color: #fff;
        }
        
        .btn-warning:hover {
            background-color: #b8926b;
            border-color: #9c7859;
            color: #fff;
        }
        
        .badge.bg-success {
            background-color: #3d6b1f !important;
        }
        
        .badge.bg-warning {
            background-color: #8b7500 !important;
        }
        
        .badge.bg-danger {
            background-color: #8b0000 !important;
        }
        
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Hide pagination arrows and show text instead */
        .pagination .page-link::before {
            display: none;
        }
        
        .pagination .page-link::after {
            display: none;
        }
        
        .table-light {
            background-color: #e8f0e3 !important;
        }
        
        .nav-tabs .nav-link.active {
            background-color: var(--army-medium);
            color: white;
            border-color: var(--army-dark) var(--army-dark) white;
        }
        
        .nav-tabs .nav-link {
            color: var(--army-medium);
        }
    </style>
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <div class="navbar-title">
                    <span class="title-main">📦 Sistem Logistik</span>
                    <span class="title-sub">Kodim 0611 Garut</span>
                </div>
            </a>
            <span class="navbar-text ms-auto">Manajemen Peralatan & Peminjaman</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="text-center mb-4">
                    <h5>Menu</h5>
                </div>
                <a href="{{ route('peminjaman.index') }}" class="@if(request()->routeIs('peminjaman.index')) active @endif">
                    - Daftar Peminjaman
                </a>
                <a href="{{ route('peminjaman.create') }}" class="@if(request()->routeIs('peminjaman.create')) active @endif">
                    - Input Peminjaman Baru
                </a>
                <a href="{{ route('peminjaman.laporan') }}" class="@if(request()->routeIs('peminjaman.laporan')) active @endif">
                    - Laporan Peminjaman
                </a>
                <hr style="border-color: #555;">
                <a href="{{ route('peralatan.index') }}" class="@if(request()->routeIs('peralatan.*')) active @endif">
                    ⚙️ Manajemen Peralatan
                </a>
            </div>

            <div class="col-md-9">
                <div class="main-content">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi Kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ✅ {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>
</html>
