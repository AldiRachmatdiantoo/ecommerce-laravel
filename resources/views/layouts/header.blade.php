<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - UMKM')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('styles')

    <style>
        body {
            display: flex; /* Menggunakan Flexbox untuk layout utama */
            min-height: 100vh; /* Memastikan body mengisi seluruh tinggi viewport */
            overflow-x: hidden; /* Mencegah overflow horizontal */
        }

        #sidebar-wrapper {
            width: 250px; /* Lebar sidebar */
            flex-shrink: 0; /* Mencegah sidebar mengecil */
            background-color: #343a40; /* Warna gelap untuk sidebar */
            color: #f8f9fa; /* Warna teks terang */
            transition: margin-left 0.25s ease-out; /* Transisi untuk menyembunyikan/menampilkan */
            position: sticky; /* Sidebar sticky di desktop */
            top: 0; /* Agar sticky dari atas */
            height: 100vh; /* Mengisi seluruh tinggi viewport */
            overflow-y: auto; /* Scroll jika konten sidebar lebih panjang */
            padding-top: 1rem;
        }

        #content-wrapper {
            flex-grow: 1; /* Konten utama mengambil sisa ruang */
            padding-left: 1rem; /* Jarak dari sidebar */
            padding-right: 1rem;
        }

        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .sidebar-nav-link {
            padding: 0.75rem 1.25rem;
            display: block;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out;
        }

        .sidebar-nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 3px solid #0d6efd; /* Indikator link aktif */
            padding-left: calc(1.25rem - 3px); /* Menyesuaikan padding kiri */
        }

        /* Navbar di bagian atas konten utama untuk toggle sidebar dan breadcrumbs */
        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            padding: 0.75rem 1rem;
        }

        .top-navbar .navbar-brand {
            font-weight: bold;
            color: #343a40;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) { /* Untuk ukuran tablet dan mobile */
            #sidebar-wrapper {
                margin-left: -250px; /* Sembunyikan sidebar secara default */
                position: fixed; /* Menjadikan sidebar fixed saat offcanvas */
                z-index: 1030; /* Di atas konten lain */
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
            #sidebar-wrapper.show {
                margin-left: 0; /* Tampilkan sidebar */
            }
            #content-wrapper {
                padding-left: 0; /* Tidak ada padding kiri jika sidebar tersembunyi */
            }
            .top-navbar .navbar-brand {
                display: none; /* Sembunyikan brand di navbar atas pada mobile jika sudah ada di sidebar */
            }
        }
    </style>
</head>

<body>

    {{-- Offcanvas Sidebar (untuk mobile/tablet) --}}
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header bg-dark">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">UMKM Admin</h5>
            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div id="sidebar-wrapper-mobile"> {{-- Konten sidebar mobile --}}
                <a class="sidebar-nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="#">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.service.index') || Request::routeIs('admin.service.create') || Request::routeIs('admin.service.edit') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-gear me-2"></i> Service
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.product.index') || Request::routeIs('admin.product.create') || Request::routeIs('admin.product.edit') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                    <i class="bi bi-box-seam me-2"></i> Produk
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.payments.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-wallet2 me-2"></i> Pembayaran Masuk
                </a>
                <a class="sidebar-nav-link" href="#">
                    <i class="bi bi-person-circle me-2"></i> Profil
                </a>
                <a class="sidebar-nav-link" href="#">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
            </div>
        </div>
    </div>


    {{-- Desktop Sidebar --}}
    <div id="sidebar-wrapper" class="d-none d-lg-flex flex-column">
        <div class="sidebar-heading">
            UMKM Admin
        </div>
        <nav class="navbar-nav flex-column">
            <a class="sidebar-nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="#">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.service.index') || Request::routeIs('admin.service.create') || Request::routeIs('admin.service.edit') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">
                <i class="bi bi-gear me-2"></i> Service
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.product.index') || Request::routeIs('admin.product.create') || Request::routeIs('admin.product.edit') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                <i class="bi bi-box-seam me-2"></i> Produk
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.payments.*') ? 'active' : '' }}" href="#">
                <i class="bi bi-wallet2 me-2"></i> Pembayaran Masuk
            </a>
            {{-- Tambahkan link navigasi lain di sini --}}
            <a class="sidebar-nav-link" href="#">
                <i class="bi bi-person-circle me-2"></i> Profil
            </a>
            <a class="sidebar-nav-link" href="#">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </nav>
    </div>

    {{-- Konten Utama --}}
    <div id="content-wrapper" class="flex-grow-1">
        {{-- Top Navbar untuk Toggle Sidebar (hanya di mobile/tablet) dan Brand/Judul --}}
        <nav class="navbar navbar-expand-lg top-navbar sticky-top">
            <div class="container-fluid">
                {{-- Tombol Toggle Sidebar (hanya terlihat di bawah breakpoint lg) --}}
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                {{-- Brand di top-navbar (opsional, bisa juga dihilangkan jika sudah ada di sidebar) --}}
                <a class="navbar-brand d-none d-lg-block" href="#">@yield('title', 'Admin Dashboard')</a>

                <div class="collapse navbar-collapse" id="mainTopNavbar">
                    <ul class="navbar-nav ms-auto">
                        {{-- Contoh elemen lain di top navbar, misal notifikasi atau profil user --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> Admin User
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Konten utama dari halaman blade lainnya --}}
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>