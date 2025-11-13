<div class="card h-100 shadow-sm border-0 service-card-custom"> {{-- Menambahkan class custom untuk styling --}}
    {{-- Gambar Service --}}
    {{-- Anda bisa mengganti URL placeholder dengan $service->image_url jika ada --}}
    <img src="{{ $service->image_url ?? 'https://via.placeholder.com/300x200/6c757d/ffffff?text=Layanan+UMKM' }}" 
         class="card-img-top service-card-img" 
         alt="{{ $service->title ?? 'Nama Layanan' }}">
    
    <div class="card-body d-flex flex-column p-4">
        {{-- Ikon Service (Opsional, bisa di atas atau diganti gambar) --}}
        {{-- Jika Anda ingin ikon tetap ada, pertimbangkan posisinya atau bisa dihapus jika gambar sudah cukup --}}
        {{-- <i class="bi bi-{{ $service->icon ?? 'tools' }} display-4 text-primary mb-3"></i> --}}
        
        <h5 class="card-title fw-bold mb-2 service-title-limit" title="{{ $service->title ?? 'Nama Layanan' }}">
            {{ $service->title ?? 'Nama Layanan' }}
        </h5>
        <p class="card-text text-muted small service-description-limit mb-3" title="{{ $service->description ?? 'Deskripsi singkat layanan yang ditawarkan.' }}">
            {{ Str::limit($service->description ?? 'Deskripsi singkat layanan yang ditawarkan untuk memberikan gambaran kepada pembeli.', 60, '...') }}
        </p>
        <p class="card-text fs-5 fw-bold text-info mt-auto price-text">Mulai Rp{{ number_format($service->price ?? 0, 0, ',', '.') }}</p>
        <div class="d-grid mt-2">
            <a href="" class="btn btn-outline-info rounded-pill btn-detail-service"> {{-- Mengubah href ke named route --}}
                <i class="bi bi-info-circle me-1"></i> Detail Layanan
            </a>
        </div>
    </div>
</div>

@push('styles')
<style>
    .service-card-custom {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 0.75rem;
        overflow: hidden; /* Penting untuk gambar dengan border-radius */
    }
    .service-card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .service-card-custom .service-card-img {
        height: 180px; /* Tinggi gambar yang konsisten */
        object-fit: cover; /* Memastikan gambar terisi penuh tanpa distorsi */
        width: 100%;
        border-top-left-radius: 0.75rem; /* Menyesuaikan radius card */
        border-top-right-radius: 0.75rem;
    }
    .service-card-custom .card-body {
        padding: 1rem; /* Sesuaikan padding jika perlu */
        text-align: left; /* Mengatur kembali teks ke kiri karena tidak lagi ada ikon di tengah */
    }
    .service-card-custom .service-title-limit {
        font-size: 1.15rem;
        line-height: 1.4;
        height: 2.8em; /* 2 baris x 1.4em line-height */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Batasi judul 2 baris */
        -webkit-box-orient: vertical;
    }
    .service-card-custom .service-description-limit {
        line-height: 1.3;
        min-height: 2.6em; /* Untuk 2 baris deskripsi */
        max-height: 2.6em; /* Pastikan tidak lebih dari 2 baris */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Batasi deskripsi 2 baris */
        -webkit-box-orient: vertical;
    }
    .service-card-custom .price-text {
        font-size: 1.3rem; /* Ukuran font harga */
        white-space: nowrap; /* Mencegah harga terpotong ke baris baru */
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .service-card-custom .btn-detail-service {
        color: #0dcaf0; /* Warna info Bootstrap */
        border-color: #0dcaf0;
    }
    .service-card-custom .btn-detail-service:hover {
        background-color: #0dcaf0;
        color: white;
    }

    /* Responsif untuk tombol dan teks di layar kecil */
    @media (max-width: 575.98px) {
        .service-card-custom .btn-detail-service {
            font-size: 0.9rem;
            padding: 0.6rem 0.8rem;
        }
        .service-card-custom .service-title-limit {
            font-size: 1rem;
            height: 2.6em;
        }
        .service-card-custom .price-text {
            font-size: 1.1rem;
        }
    }
</style>
@endpush