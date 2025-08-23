<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUK Dinkes Kampar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <!-- NAVBAR MENU ATAS -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('pegawais.index') }}">DUK Kampar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('pegawais.index') ? ' active' : '' }}" href="{{ route('pegawais.index') }}">
                            Data Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('pegawais.create') ? ' active' : '' }}" href="{{ route('pegawais.create') }}">
                            Tambah Pegawai
                        </a>
                    </li>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle{{ request()->routeIs('pegawais.exportExcel') || request()->routeIs('pegawais.exportPdf') ? ' active' : '' }}" href="#" id="navbarDropdownExport" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownExport">
                            <li>
                                <a class="dropdown-item" href="{{ route('pegawais.exportExcel') }}">Export Excel</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('pegawais.exportPdf') }}">Export PDF</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- Right Menu -->
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        <li class="nav-item d-flex align-items-center me-2">
                            <span class="text-white small">
                                Login sebagai <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->role }})
                            </span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link px-2" style="color: white;">Logout</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>