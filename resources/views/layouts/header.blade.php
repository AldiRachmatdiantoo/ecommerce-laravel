<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Shop')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @stack('styles')

    <style>
        body {
            display: flex; /* Menggunakan Flexbox untuk layout utama */
            min-height: 100vh; /* Memastikan body mengisi seluruh tinggi viewport */
            overflow-x: hidden; /* Mencegah overflow horizontal */
            transition: all 0.25s ease-out; /* Transisi untuk smooth toggle */
        }

        #sidebar-wrapper {
            width: 250px; /* Lebar sidebar default */
            flex-shrink: 0; /* Mencegah sidebar mengecil */
            background-color: #343a40; /* Warna gelap untuk sidebar */
            color: #f8f9fa; /* Warna teks terang */
            transition: width 0.25s ease-out, margin-left 0.25s ease-out; /* Transisi untuk menyembunyikan/menampilkan */
            position: sticky; /* Sidebar sticky di desktop */
            top: 0; /* Agar sticky dari atas */
            height: 100vh; /* Mengisi seluruh tinggi viewport */
            overflow-y: auto; /* Scroll jika konten sidebar lebih panjang */
            padding-top: 1rem;
            z-index: 1000; /* Pastikan di atas konten lain, tapi di bawah offcanvas */
        }

        #content-wrapper {
            flex-grow: 1; /* Konten utama mengambil sisa ruang */
            /* Tidak perlu padding-left di sini, karena sidebar sudah di luar flex */
            transition: margin-left 0.25s ease-out; /* Transisi untuk mendorong konten */
        }

        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
            white-space: nowrap; /* Mencegah heading terpotong saat sidebar mengecil */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-nav-link {
            padding: 0.75rem 1.25rem;
            display: block;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            transition: background-color 0.15s ease-in-out, color 0.15s ease-in-out;
            white-space: nowrap; /* Mencegah link terpotong saat sidebar mengecil */
            overflow: hidden;
            text-overflow: ellipsis;
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
            position: sticky; /* Agar navbar tetap di atas saat scroll */
            top: 0;
            z-index: 999; /* Di bawah offcanvas, di atas konten */
        }

        .top-navbar .navbar-brand {
            font-weight: bold;
            color: #343a40;
        }

        /* Style untuk Sidebar yang Ditoggle (desktop) */
        body.sidebar-toggled #sidebar-wrapper {
            width: 80px; /* Lebar sidebar menyusut */
        }

        body.sidebar-toggled #sidebar-wrapper .sidebar-heading,
        body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link span {
            display: none; /* Sembunyikan teks pada heading dan link */
        }
        body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link {
            padding: 0.75rem 0.5rem; /* Kurangi padding untuk ikon saja */
            text-align: center;
        }
        body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link i {
            margin-right: 0 !important; /* Hapus margin ikon */
        }
        body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link.active {
             border-left: none; /* Hapus border kiri aktif saat menyusut */
             border-bottom: 3px solid #0d6efd; /* Ganti dengan border bawah */
             padding-left: 0.75rem; /* Sesuaikan padding agar icon di tengah */
             padding-bottom: calc(0.75rem - 3px);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) { /* Untuk ukuran tablet dan mobile (lg breakpoint) */
            #sidebar-wrapper {
                margin-left: -250px; /* Sembunyikan sidebar secara default di bawah lg */
                position: fixed; /* Menjadikan sidebar fixed saat offcanvas */
                z-index: 1030; /* Di atas konten lain */
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
            #sidebar-wrapper.show { /* Kelas ini tidak lagi digunakan, diganti offcanvas */
                margin-left: 0; 
            }
            #content-wrapper {
                /* padding-left: 0; */ /* Ini tidak lagi diperlukan karena flexbox */
            }
            .top-navbar .navbar-brand {
                display: none; /* Sembunyikan brand di navbar atas pada mobile jika sudah ada di sidebar */
            }
            /* Reset body.sidebar-toggled untuk mobile agar tidak mempengaruhi layout offcanvas */
            body.sidebar-toggled #sidebar-wrapper {
                width: 250px; /* Kembalikan lebar default offcanvas */
            }
            body.sidebar-toggled #sidebar-wrapper .sidebar-heading,
            body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link span {
                display: block; /* Tampilkan teks di offcanvas */
            }
            body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link {
                text-align: left; /* Kembalikan alignment */
                padding: 0.75rem 1.25rem;
            }
             body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link i {
                margin-right: 0.5rem !important; /* Kembalikan margin ikon */
            }
            body.sidebar-toggled #sidebar-wrapper .sidebar-nav-link.active {
                border-left: 3px solid #0d6efd; /* Kembali ke border kiri aktif */
                border-bottom: none; /* Hapus border bawah */
                padding-left: calc(1.25rem - 3px);
                padding-bottom: 0.75rem;
            }
        }
    </style>
</head>

<body>

    {{-- Offcanvas Sidebar (untuk mobile/tablet) --}}
    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header bg-dark">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Admin</h5>
            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            {{-- Konten sidebar mobile (sama dengan desktop sidebar, tapi tanpa d-none d-lg-flex) --}}
            <nav class="navbar-nav flex-column">
                <a class="sidebar-nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="#">
                    <i class="bi bi-speedometer2 me-2"></i> <span>Dashboard</span>
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.service.index') || Request::routeIs('admin.service.create') || Request::routeIs('admin.service.edit') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-gear me-2"></i> <span>Service</span>
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.product.index') || Request::routeIs('admin.product.create') || Request::routeIs('admin.product.edit') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                    <i class="bi bi-box-seam me-2"></i> <span>Produk</span>
                </a>
                <a class="sidebar-nav-link {{ Request::routeIs('admin.payments.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-wallet2 me-2"></i> <span>Pembayaran Masuk</span>
                </a>
                <a class="sidebar-nav-link" href="#">
                    <i class="bi bi-person-circle me-2"></i> <span>Profil</span>
                </a>
                <a class="sidebar-nav-link" href="#">
                    <i class="bi bi-box-arrow-right me-2"></i> <span>Logout</span>
                </a>
            </nav>
        </div>
    </div>


    {{-- Desktop Sidebar --}}
    {{-- Hapus d-none d-lg-flex karena sidebar ini sekarang selalu ada di DOM, tapi lebarnya diatur CSS --}}
    <div id="sidebar-wrapper" class="flex-column">
        <div class="sidebar-heading">
            Admin
        </div>
        <nav class="navbar-nav flex-column">
            <a class="sidebar-nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="#">
                <i class="bi bi-speedometer2 me-2"></i> <span>Dashboard</span>
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.service.index') || Request::routeIs('admin.service.create') || Request::routeIs('admin.service.edit') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">
                <i class="bi bi-gear me-2"></i> <span>Service</span>
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.product.index') || Request::routeIs('admin.product.create') || Request::routeIs('admin.product.edit') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                <i class="bi bi-box-seam me-2"></i> <span>Produk</span>
            </a>
            <a class="sidebar-nav-link {{ Request::routeIs('admin.payments.*') ? 'active' : '' }}" href="#">
                <i class="bi bi-wallet2 me-2"></i> <span>Pembayaran Masuk</span>
            </a>
            <a class="sidebar-nav-link" href="#">
                <i class="bi bi-person-circle me-2"></i> <span>Profil</span>
            </a>
            <a class="sidebar-nav-link" href="#">
                <i class="bi bi-box-arrow-right me-2"></i> <span>Logout</span>
            </a>
        </nav>
    </div>

    {{-- Konten Utama --}}
    <div id="content-wrapper" class="flex-grow-1">
        {{-- Top Navbar untuk Toggle Sidebar (hanya di mobile/tablet) dan Brand/Judul --}}
        <nav class="navbar navbar-expand-lg top-navbar sticky-top">
            <div class="container-fluid">
                {{-- Tombol Toggle Sidebar --}}
                <button class="btn btn-link navbar-toggler d-none d-lg-block" id="sidebarToggleDesktop">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                {{-- Brand di top-navbar (opsional, bisa juga dihilangkan jika sudah ada di sidebar) --}}
                <a class="navbar-brand d-none d-lg-block" href="#">@yield('title', 'Admin Dashboard')</a>

                <div class="collapse navbar-collapse" id="mainTopNavbar">
                    <ul class="navbar-nav ms-auto">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggleDesktop = document.getElementById('sidebarToggleDesktop');
            if (sidebarToggleDesktop) {
                sidebarToggleDesktop.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-toggled');
                });
            }

            // Tambahkan span pada teks link navigasi agar mudah dihide
            document.querySelectorAll('.sidebar-nav-link').forEach(link => {
                const textNode = link.childNodes[1]; // Asumsi teks adalah child node kedua setelah icon
                if (textNode && textNode.nodeType === 3) { // Hanya jika itu node teks
                    const span = document.createElement('span');
                    span.textContent = textNode.textContent.trim();
                    link.replaceChild(span, textNode);
                }
            });
             // Untuk sidebar heading juga
            const sidebarHeading = document.querySelector('#sidebar-wrapper .sidebar-heading');
            if (sidebarHeading) {
                const text = sidebarHeading.textContent.trim();
                sidebarHeading.innerHTML = `<span class="d-none d-lg-inline">${text}</span><span class="d-lg-none">${text.substring(0, 1)}</span>`; // Untuk mobile bisa pakai huruf awal saja
                // Untuk desktop, ini akan tetap full, tapi di mobile di offcanvas akan full juga.
                // Untuk kondisi menyusut, kita hide span d-lg-inline
            }
        });
    </script>
    @stack('scripts')
</body>

</html>