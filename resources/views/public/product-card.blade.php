<div class="card h-100 shadow-sm border-0 product-card-custom" >
    {{-- Badge "Stok Habis" --}}
    @if (($product->stock ?? 0) == 0)
        <span class="badge bg-danger position-absolute top-0 end-0 m-2 z-1 fw-bold fs-6">Stok Habis</span>
    @endif

    {{-- Gambar Produk --}}
    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x220/e9ecef/6c757d?text=Produk+UMKM' }}" 
         class="card-img-top" 
         alt="{{ $product->title ?? 'Nama Produk' }}" 
         style="width: 300px; object-fit: cover;aspect-ratio: 1/1; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
    
    <div class="card-body d-flex flex-column">
        {{-- Judul Produk --}}
        <h5 class="card-title fw-bold mb-2 product-title-limit" title="{{ $product->title ?? 'Nama Produk' }}">
            {{ $product->title ?? 'Nama Produk' }}
        </h5>
        
        {{-- Deskripsi Produk --}}
        <p class="card-text text-muted small mb-3 description-limit" title="{{ $product->description ?? 'Deskripsi singkat produk ini.' }}">
            {{ Str::limit($product->description ?? 'Deskripsi singkat produk ini untuk memberikan gambaran kepada pembeli.', 60, '...') }}
        </p>
        
        {{-- Harga Produk --}}
        <p class="card-text fs-5 fw-bold text-success mt-auto price-text">
            Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}
        </p>
        
        {{-- Tombol Aksi --}}
        <div class="d-grid mt-3 action-buttons-container"> {{-- Menambahkan container untuk tombol --}}
            <a href="" class="btn btn-primary rounded-pill btn-detail">
                <i class="bi bi-eye me-1"></i> Detail
            </a>
            <form action="" method="POST" class="d-grid mt-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                <input type="hidden" name="quantity" value="1"> {{-- Default quantity --}}
                <button type="submit" class="btn btn-outline-primary rounded-pill btn-add-cart" {{ (($product->stock ?? 0) == 0) ? 'disabled' : '' }}>
                    <i class="bi bi-cart-plus me-1"></i> Tambah Keranjang
                </button>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Global styling untuk .card-img-top */
    .card-img-top {
        width: 100%; /* Pastikan gambar mengisi 100% lebar parent */
        max-width: 100%; /* Pastikan gambar tidak melebihi lebar parent */
    }

    /* Styling tambahan untuk card produk */
    .product-card-custom {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 0.75rem; 
        position: relative; 
        overflow: hidden; 
    }
    .product-card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .product-card-custom .badge {
        font-size: 0.85em; 
        padding: 0.4em 0.7em;
        border-radius: 0.5rem;
        z-index: 10; 
    }
    .product-card-custom .card-img-top {
        height: 200px; /* Tinggi gambar konsisten */
        object-fit: cover;
        border-top-left-radius: 0.5rem; 
        border-top-right-radius: 0.5rem;
    }
    .product-card-custom .card-body {
        padding: 1rem; 
    }
    /* Fixed height for title to ensure 2 lines */
    .product-card-custom .product-title-limit {
        font-size: 1.15rem; 
        line-height: 1.4;
        height: calc(1.4em * 2); /* Fixed height for exactly 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        margin-bottom: 0.5rem !important; /* Adjust margin to fit */
    }
    /* Fixed height for description to ensure 2 lines */
    .product-card-custom .description-limit {
        line-height: 1.3;
        height: calc(1.3em * 2); /* Fixed height for exactly 2 lines */
        min-height: calc(1.3em * 2);
        max-height: calc(1.3em * 2);
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        margin-bottom: 0.75rem !important; /* Adjust margin */
    }
    .product-card-custom .price-text {
        color: #198754; 
        font-size: 1.3rem; 
        white-space: nowrap; 
        overflow: hidden;
        text-overflow: ellipsis;
        margin-top: auto; /* Push price to bottom, then buttons */
        margin-bottom: 1rem !important; /* Add space before buttons */
    }
    /* Ensure action buttons container also has consistent spacing/height */
    .product-card-custom .action-buttons-container {
        flex-shrink: 0; /* Prevent buttons from shrinking */
        padding-top: 0.5rem; /* Add consistent padding above buttons */
    }
    .product-card-custom .btn-detail {
        background-color: #0d6efd; 
        border-color: #0d6efd;
    }
    .product-card-custom .btn-add-cart {
        color: #0d6efd;
        border-color: #0d6efd;
    }
    .product-card-custom .btn-add-cart:hover {
        background-color: #0d6efd;
        color: white;
    }

    /* MEDIA QUERIES untuk responsif */
    @media (max-width: 575.98px) { /* Extra small devices (HP portrait) */
        .product-card-custom {
            margin: 0 auto; 
            width: 95%; 
            max-width: 320px; 
        }
        .product-card-custom .btn-detail,
        .product-card-custom .btn-add-cart {
            font-size: 0.9rem; 
            padding: 0.6rem 0.8rem;
        }
        .product-card-custom .product-title-limit {
            font-size: 1rem; 
            height: calc(1.3em * 2); /* Adjust line-height and height for smaller font */
            line-height: 1.3;
        }
        .product-card-custom .description-limit {
            font-size: 0.75rem; /* Smaller font for description on mobile */
            height: calc(1.2em * 2); /* Adjust line-height and height */
            line-height: 1.2;
        }
        .product-card-custom .price-text {
            font-size: 1.1rem; 
        }
    }

    /* Pastikan gambar di navbar tidak menyebabkan overflow */
    .navbar-brand img {
        max-height: 40px; 
        width: auto;
    }
</style>
@endpush