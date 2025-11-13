@extends('layouts.public-header')

@section('title', 'Layanan UMKMshop')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Jelajahi Layanan Kami</h1>
        {{-- Anda bisa tambahkan filter/sort di sini jika diperlukan --}}
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-filter-left me-1"></i> Filter Kategori
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><h6 class="dropdown-header">Kategori Layanan</h6></li>
                <li><a class="dropdown-item" href="#">Desain & Kreatif</a></li>
                <li><a class="dropdown-item" href="#">Digital Marketing</a></li>
                <li><a class="dropdown-item" href="#">Konsultasi Bisnis</a></li>
                <li><a class="dropdown-item" href="#">Pelatihan</a></li>
            </ul>
        </div>
    </div>

    <div class="row g-4">
        {{-- Loop melalui daftar layanan --}}
        @forelse ($services as $service)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card service-card flex-fill shadow-sm">
                    {{-- Anda bisa menggunakan ikon atau gambar kecil untuk layanan --}}
                    @if ($service->image_url)
                        <img src="{{ $service->image_url }}" 
                             class="card-img-top" 
                             alt="{{ $service->title }}">
                    @else
                        {{-- Contoh menggunakan ikon sebagai placeholder --}}
                        <div class="card-img-top d-flex justify-content-center align-items-center bg-light" style="height: 220px;">
                            <i class="{{ $service->icon_class ?? 'bi bi-tools' }} display-1 text-primary"></i>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-truncate">{{ $service->title }}</h5>
                        <p class="card-text text-muted description">{{ Str::limit($service->description, 70) }}</p>
                        <p class="card-text price mt-auto">Mulai dari Rp{{ number_format($service->price, 0, ',', '.') }}</p>
                        <span class="badge {{ $service->status == 'active' ? 'bg-success' : 'bg-warning text-dark' }} mb-3">
                            {{ ucfirst($service->status ?? 'Draft') }}
                        </span>
                        <a href="{{ url('services/' . $service->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                            <i class="bi bi-arrow-right-circle me-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-emoji-frown display-4 text-muted d-block mb-3"></i>
                <p class="lead text-muted">Maaf, belum ada layanan yang tersedia saat ini.</p>
                <p class="text-muted">Tetap terhubung untuk update terbaru!</p>
            </div>
        @endforelse
    </div>

    {{-- Contoh Paginasi --}}
    <div class="d-flex justify-content-center mt-5">
        {{-- Pastikan $services adalah instance dari LengthAwarePaginator --}}
        {{-- {{ $services->links() }} --}} 
        <nav aria-label="Page navigation">
            <ul class="pagination shadow-sm rounded-pill overflow-hidden">
                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom Styling untuk card layanan di halaman publik */
    .service-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid #e9ecef;
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .service-card .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: calc(0.75rem - 1px);
        border-top-right-radius: calc(0.75rem - 1px);
    }
    .service-card .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #0d6efd; /* Biru untuk judul layanan */
        margin-bottom: 0.5rem;
    }
    .service-card .description {
        line-height: 1.4;
        min-height: 3.8em; /* Untuk 2-3 baris deskripsi */
    }
    .service-card .price {
        font-size: 1.2rem;
        font-weight: 700;
        color: #6c757d; /* Abu-abu gelap untuk harga */
        margin-top: 1rem;
    }
    .service-card .badge {
        font-size: 0.8em;
        padding: 0.4em 0.8em;
    }
</style>
@endpush