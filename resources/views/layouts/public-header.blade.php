<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Judul Halaman - Akan diisi dari setiap halaman yang extends layout ini --}}
    <title>@yield('title', 'UMKMshop')</title> 

    {{-- Bootstrap 5.3 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Custom CSS untuk Global Styling (opsional, bisa Anda isi di sini atau file terpisah) --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins atau fallback sans-serif */
            background-color: #f8f9fa; /* Latar belakang abu-abu muda */
            color: #333;
        }

        /* Navbar Styling */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #212529 !important; /* Warna brand lebih gelap */
        }
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #212529 !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0d6efd !important; /* Warna biru primary Bootstrap */
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        /* Tambahan styling lainnya bisa Anda tempatkan di sini */
    </style>

    {{-- Anda bisa menambahkan link ke file CSS eksternal Anda di sini --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    @stack('styles') {{-- Untuk CSS spesifik halaman --}}

</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shop me-2"></i> UMKMshop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('services*') ? 'active' : '' }}" href="{{url('/products')}}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('services*') ? 'active' : '' }}" href="{{ url('/services') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Kontak</a>
                    </li>
                    {{-- Contoh item navbar dengan dropdown --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akun
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li> --}}
                </ul>
                <div class="d-flex ms-lg-3">
                    <a href="{{ url('/cart') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="bi bi-cart"></i> Keranjang
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Konten utama dari halaman yang meng-extends layout ini --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer (Anda bisa memindahkannya ke file terpisah dan meng-include di sini jika ingin) --}}
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} UMKMshop. All rights reserved.</p>
            <div class="social-icons mb-3">
                <a href="#" class="text-white mx-2"><i class="bi bi-facebook fs-4"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-instagram fs-4"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-twitter fs-4"></i></a>
                <a href="#" class="text-white mx-2"><i class="bi bi-linkedin fs-4"></i></a>
            </div>
            <p>Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> untuk UMKM Indonesia.</p>
        </div>
    </footer>

    {{-- Bootstrap 5.3 JS Bundle (termasuk Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Custom JavaScript (opsional, bisa Anda isi di sini atau file terpisah) --}}
    <script>
        // Contoh JavaScript kustom
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Public header loaded!');
        });
    </script>

    @stack('scripts') {{-- Untuk JavaScript spesifik halaman --}}

</body>
</html>