@extends('layouts.public-header')

@section('title', "Di'Shop - Aneka Produk & Jasa")

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section text-center py-5 bg-primary text-white">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di Di'Shop</h1>
            <p class="lead mb-4">
                Temukan berbagai produk menarik dan jasa profesional dalam satu tempat.
            </p>
            <a href="#products" class="btn btn-warning btn-lg me-2 rounded-pill">
                Jelajahi Produk <i class="bi bi-arrow-right-short"></i>
            </a>
            <a href="#services" class="btn btn-outline-light btn-lg rounded-pill">
                Cari Layanan <i class="bi bi-arrow-right-short"></i>
            </a>
        </div>
    </section>

    {{-- Section Produk Unggulan --}}
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-primary">Produk Unggulan</h2>

            {{-- Pencarian Produk --}}
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-start-pill" placeholder="Cari produk...">
                        <button class="btn btn-primary rounded-end-pill" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-box-seam display-1 text-muted"></i>
                    <p class="lead text-muted mt-3">Belum ada produk untuk ditampilkan saat ini.</p>
                    <p class="text-muted">Nantikan produk-produk menarik dari Di'Shop!</p>
                </div>
            @else
                <div class="row g-4 justify-content-center">
                    @foreach ($products->take(8) as $product)
                        {{-- Komponen produk --}}
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex" style="flex-wrap: wrap">
                            @include('public.product-card', ['product' => $product])
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('public.products') }}" class="btn btn-outline-primary btn-lg rounded-pill px-4">
                        Lihat Semua Produk <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Section Layanan Pilihan --}}
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-success">Jasa & Layanan Terbaik</h2>

            @if ($services->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-gear display-1 text-muted"></i>
                    <p class="lead text-muted mt-3">Belum ada layanan untuk ditampilkan saat ini.</p>
                    <p class="text-muted">Kunjungi kembali untuk penawaran jasa terbaru dari Di'Shop!</p>
                </div>
            @else
                <div class="row g-4 justify-content-center">
                    @foreach ($services as $service)
                        {{-- Komponen layanan --}}
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                            @include('public.service-card', ['service' => $service])
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{route('public.services')}}" class="btn btn-outline-success btn-lg rounded-pill px-4">
                        Lihat Semua Layanan <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Tentang Di'Shop --}}
    <section id="about" class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Tentang Di'Shop</h2>
            <p class="lead mb-4">
                Di'Shop adalah toko yang menyediakan berbagai produk dan jasa untuk memenuhi kebutuhan Anda —
                mulai dari barang berkualitas hingga layanan profesional.  
                Kami berkomitmen memberikan pengalaman berbelanja yang mudah, cepat, dan terpercaya.
            </p>
            <a href="" class="btn btn-light btn-lg rounded-pill px-4">
                Pelajari Lebih Lanjut <i class="bi bi-info-circle"></i>
            </a>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Di'Shop Homepage Loaded!");
        });
    </script>
@endpush
