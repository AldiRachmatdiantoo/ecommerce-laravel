@extends('layouts.public-header')

@section('title', "Tentang Kami - Di'Shop")

@section('content')
    {{-- Hero Section: About Us --}}
    <section class="hero-about-section text-center py-5 bg-light">
        <div class="container">
            <h1 class="display-4 fw-bold text-primary mb-3">Tentang Di'Shop</h1>
            <p class="lead text-muted mb-4">
                Platform yang menyediakan berbagai jasa dan produk berkualitas dari pelaku lokal di seluruh Indonesia.
            </p>
            <i class="bi bi-shop display-1 text-primary"></i>
        </div>
    </section>

    {{-- Misi & Visi Section --}}
    <section class="py-5">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{asset('assets/umkm.jpg')}}" 
                         class="img-fluid rounded shadow-sm" alt="Misi dan Visi Di'Shop">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4 text-primary">Misi Kami</h2>
                    <p class="fs-5 text-muted">
                        Misi Di'Shop adalah menjadi jembatan antara pelaku usaha lokal dengan pasar yang lebih luas, 
                        membantu mereka bertumbuh dan berinovasi. Kami berkomitmen menyediakan platform yang mudah 
                        digunakan, aman, dan mendukung berbagai layanan maupun produk terbaik dari para penjual.
                    </p>
                    
                    <h2 class="fw-bold mt-5 mb-4 text-success">Visi Kami</h2>
                    <p class="fs-5 text-muted">
                        Visi kami adalah menciptakan ekosistem digital yang kuat bagi penyedia jasa dan produk di Indonesia, 
                        mendorong ekonomi lokal, serta memperkenalkan kreativitas dan kualitas karya anak bangsa ke tingkat nasional dan internasional. 
                        Kami membayangkan masa depan di mana setiap pelaku usaha memiliki kesempatan yang sama untuk sukses di era digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Nilai-nilai Kami Section --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5 text-primary">Nilai-Nilai Inti Kami</h2>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 py-4 px-3">
                        <div class="card-body">
                            <i class="bi bi-heart-fill text-danger display-4 mb-3"></i>
                            <h3 class="card-title fw-bold mb-2">Pemberdayaan</h3>
                            <p class="card-text text-muted">
                                Kami percaya pada potensi setiap pelaku usaha untuk berkembang dan kami hadir untuk memberdayakan mereka.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 py-4 px-3">
                        <div class="card-body">
                            <i class="bi bi-award-fill text-warning display-4 mb-3"></i>
                            <h3 class="card-title fw-bold mb-2">Kualitas</h3>
                            <p class="card-text text-muted">
                                Kami berkomitmen pada kualitas, baik dalam platform maupun layanan dan produk yang ditawarkan di Di'Shop.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 py-4 px-3">
                        <div class="card-body">
                            <i class="bi bi-people-fill text-info display-4 mb-3"></i>
                            <h3 class="card-title fw-bold mb-2">Komunitas</h3>
                            <p class="card-text text-muted">
                                Membangun komunitas yang solid antara penjual, penyedia jasa, dan pelanggan adalah prioritas kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section: Bergabunglah Bersama Kami --}}
    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Siap Bergabung dengan Di'Shop?</h2>
            <p class="lead mb-4">
                Baik Anda penjual jasa, penyedia produk, atau pembeli yang mencari layanan dan barang lokal berkualitas, 
                kami mengundang Anda untuk menjadi bagian dari komunitas Di'Shop.
            </p>
            <a href="" class="btn btn-warning btn-lg me-3 rounded-pill">Daftar Sekarang <i class="bi bi-person-plus"></i></a>
            <a href="" class="btn btn-outline-light btn-lg rounded-pill">Hubungi Kami <i class="bi bi-chat-dots"></i></a>
        </div>
    </section>

@endsection

@push('styles')
<style>
    .hero-about-section {
        background-color: #f8f9fa; /* Light gray background */
        color: #343a40;
    }
    .hero-about-section .bi {
        color: #0d6efd; /* Primary color for icon */
    }
    .text-primary {
        color: #0d6efd !important;
    }
    .text-success {
        color: #198754 !important;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
        color: #212529;
    }
</style>
@endpush
