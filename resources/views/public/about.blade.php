@extends('layouts.public-header')

@section('title', 'Tentang Kami - UMKMshop')

@section('content')
    {{-- Hero Section: About Us --}}
    <section class="hero-about-section text-center py-5 bg-light">
        <div class="container">
            <h1 class="display-4 fw-bold text-primary mb-3">Tentang UMKMshop</h1>
            <p class="lead text-muted mb-4">
                Platform yang didedikasikan untuk memberdayakan Usaha Mikro, Kecil, dan Menengah (UMKM) di seluruh Indonesia.
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
                         class="img-fluid rounded shadow-sm" alt="Misi dan Visi UMKMshop">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold mb-4 text-primary">Misi Kami</h2>
                    <p class="fs-5 text-muted">
                        Misi UMKMshop adalah menjadi jembatan antara pelaku UMKM lokal dengan pasar yang lebih luas, 
                        membantu mereka bertumbuh dan berinovasi. Kami berkomitmen untuk menyediakan platform yang mudah 
                        digunakan, aman, dan penuh dukungan bagi UMKM untuk memamerkan produk dan layanan terbaik mereka.
                    </p>
                    
                    <h2 class="fw-bold mt-5 mb-4 text-success">Visi Kami</h2>
                    <p class="fs-5 text-muted">
                        Visi kami adalah menciptakan ekosistem digital yang kuat bagi UMKM Indonesia, mendorong ekonomi lokal, 
                        serta memperkenalkan kekayaan produk dan jasa Indonesia ke kancah nasional dan internasional. 
                        Kami membayangkan masa depan di mana setiap UMKM memiliki kesempatan yang sama untuk sukses di era digital.
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
                                Kami percaya pada kekuatan setiap UMKM untuk berkembang dan kami hadir untuk memberdayakan mereka.
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
                                Kami berkomitmen pada kualitas, baik dalam platform maupun produk/layanan yang kami tawarkan.
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
                                Membangun komunitas yang solid antara UMKM, pelanggan, dan mitra adalah prioritas kami.
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
            <h2 class="fw-bold mb-3">Siap Bergabung dengan UMKMshop?</h2>
            <p class="lead mb-4">
                Baik Anda pemilik UMKM yang ingin memperluas jangkauan, atau pembeli yang mencari produk lokal berkualitas, 
                kami mengundang Anda untuk menjadi bagian dari komunitas kami.
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