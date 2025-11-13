<div class="card h-100 shadow-sm border-0 text-center">
    <div class="card-body d-flex flex-column justify-content-center p-4">
        <i class="bi bi-{{ $service->icon ?? 'tools' }} display-4 text-primary mb-3"></i> {{-- Asumsi ada field 'icon' di service --}}
        <h5 class="card-title fw-bold mb-2">{{ $service->title ?? 'Nama Layanan' }}</h5>
        <p class="card-text text-muted small text-truncate mb-3">{{ $service->description ?? 'Deskripsi singkat layanan yang ditawarkan.' }}</p>
        <p class="card-text fs-5 fw-bold text-info mt-auto">Mulai Rp{{ number_format($service->price ?? 0, 0, ',', '.') }}</p>
        <div class="d-grid mt-2">
            <a href="" class="btn btn-outline-info rounded-pill">
                <i class="bi bi-info-circle me-1"></i> Detail Layanan
            </a>
        </div>
    </div>
</div>