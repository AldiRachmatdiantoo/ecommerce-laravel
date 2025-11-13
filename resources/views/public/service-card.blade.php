{{-- KARTU LAYANAN (Struktur Asli Dipertahankan) --}}
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
            {{-- 
              PERUBAHAN HANYA DI SINI:
              - href="" menjadi href="#"
              - Menambahkan data-bs-toggle="modal"
              - Menambahkan data-bs-target="#..." (ID modal yang unik)
            --}}
            <a href="#" 
               class="btn btn-outline-info rounded-pill btn-detail-service" 
               data-bs-toggle="modal" 
               data-bs-target="#detailLayananModal-{{ $service->id ?? '' }}">
                <i class="bi bi-info-circle me-1"></i> Detail Layanan
            </a>
        </div>
    </div>
</div>

{{-- 
  ===========================================
   HTML MODAL DETAIL LAYANAN (TAMBAHAN BARU)
  ===========================================
  Letakkan ini SETELAH </div> penutup kartu, 
  (masih di dalam loop @foreach Anda).
--}}
<div class="modal fade" id="detailLayananModal-{{ $service->id ?? '' }}" tabindex="-1" aria-labelledby="detailLayananModalLabel-{{ $service->id ?? '' }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"> {{-- modal-lg untuk lebih lebar --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="detailLayananModalLabel-{{ $service->id ?? '' }}">
                    {{ $service->title ?? 'Nama Layanan' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            {{-- Isi Modal --}}
            <div class="modal-body">
                <div class="row">
                    {{-- Kolom Gambar --}}
                    <div class="col-md-6 mb-3 mb-md-0">
                        <img src="{{ $service->image_url ?? 'https://via.placeholder.com/400x300/6c757d/ffffff?text=Layanan+UMKM' }}" 
                             class="img-fluid rounded shadow-sm w-100" 
                             style="object-fit: cover; aspect-ratio: 4/3;"
                             alt="{{ $service->title ?? 'Nama Layanan' }}">
                    </div>
                    
                    {{-- Kolom Detail Teks --}}
                    <div class="col-md-6 d-flex flex-column">
                        <h3 class="fw-bold text-info mb-3">
                            Mulai Rp{{ number_format($service->price ?? 0, 0, ',', '.') }}
                        </h3>

                        <hr>
                        
                        {{-- Menampilkan deskripsi lengkap (bukan yang dipotong) --}}
                        <p class="text-muted" style="white-space: pre-wrap;">{{ $service->description ?? 'Deskripsi lengkap layanan tidak tersedia.' }}</p>
                        
                    </div>
                </div>
            </div>
            
            {{-- Footer Modal (Hanya Tombol Tutup) --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


{{-- CSS Anda (Tidak berubah, tetap di sini) --}}
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