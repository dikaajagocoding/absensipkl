<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Absensi PKL - Kodim 0611 Garut')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #2c3e50;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        .sidebar {
            background-color: #34495e;
            color: white;
            min-height: 100vh;
            padding: 20px 0;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #2c3e50;
            border-left-color: #3498db;
            color: #3498db;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: none;
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">🎓 Sistem Absensi PKL</a>
            <span class="navbar-text text-white">Kodim 0611 Garut</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="text-center mb-4">
                    <h5>Menu</h5>
                </div>
                <a href="{{ route('absensi.index') }}" class="@if(request()->routeIs('absensi.index')) active @endif">
                    📋 Daftar Absensi
                </a>
                <a href="{{ route('absensi.create') }}" class="@if(request()->routeIs('absensi.create')) active @endif">
                    ➕ Input Absensi Baru
                </a>
                <a href="{{ route('absensi.laporan') }}" class="@if(request()->routeIs('absensi.laporan')) active @endif">
                    📊 Laporan Absensi
                </a>
                <hr style="border-color: #555;">
                <a href="{{ route('peserta-pkl.index') }}" class="@if(request()->routeIs('peserta-pkl.*')) active @endif">
                    👥 Manajemen Peserta
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
