@extends('layouts.public-header')

@section('title', 'Produk UMKMshop')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Semua Produk UMKMshop</h1>
        {{-- Anda bisa tambahkan filter/sort di sini jika diperlukan --}}
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-funnel me-1"></i> Filter / Urutkan
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><h6 class="dropdown-header">Urutkan Berdasarkan</h6></li>
                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                <li><a class="dropdown-item" href="#">Harga Termurah</a></li>
                <li><a class="dropdown-item" href="#">Harga Termahal</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><h6 class="dropdown-header">Kategori</h6></li>
                <li><a class="dropdown-item" href="#">Elektronik</a></li>
                <li><a class="dropdown-item" href="#">Fashion</a></li>
                <li><a class="dropdown-item" href="#">Makanan & Minuman</a></li>
                <li><a class="dropdown-item" href="#">Kerajinan Tangan</a></li>
            </ul>
        </div>
    </div>

    <div class="row g-4">
        {{-- Loop melalui daftar produk --}}
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card product-card flex-fill shadow-sm">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x220/f8f9fa/dee2e6?text=No+Image' }}" 
                         class="card-img-top" 
                         alt="{{ $product->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">{{ $product->title }}</h5>
                        <p class="card-text text-muted description">{{ Str::limit($product->description, 70) }}</p>
                        <p class="card-text price mt-auto">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ url('products/' . $product->id) }}" class="btn btn-primary btn-sm rounded-pill">
                            <i class="bi bi-info-circle me-1"></i> Detail Produk
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-box-seam-fill display-4 text-muted d-block mb-3"></i>
                <p class="lead text-muted">Maaf, belum ada produk yang tersedia saat ini.</p>
                <p class="text-muted">Kembali lagi nanti atau jelajahi layanan kami!</p>
            </div>
        @endforelse
    </div>

    {{-- Contoh Paginasi --}}
    <div class="d-flex justify-content-center mt-5">
        {{-- Pastikan $products adalah instance dari LengthAwarePaginator --}}
        {{-- {{ $products->links() }} --}} 
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
    /* Custom Styling untuk card produk di halaman publik */
    .product-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid #e9ecef;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .product-card .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: calc(0.75rem - 1px); /* Match card-border-radius */
        border-top-right-radius: calc(0.75rem - 1px);
    }
    .product-card .card-title {
        font-size: 1.15rem;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 0.5rem;
    }
    .product-card .description {
        line-height: 1.4;
        min-height: 3.8em; /* Untuk 2-3 baris deskripsi */
    }
    .product-card .price {
        font-size: 1.4rem;
        font-weight: 700;
        color: #28a745; /* Hijau untuk harga */
        margin-top: 1rem;
    }
    .pagination .page-link {
        color: #0d6efd;
        border-color: #dee2e6;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }
    .pagination .page-link:hover {
        background-color: #e9ecef;
    }
</style>
@endpush