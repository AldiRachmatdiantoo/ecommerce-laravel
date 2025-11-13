@extends('layouts.header')

@section('title', 'List Service')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6 col-12 mb-2 mb-md-0">
            <h1 class="mb-0 fs-3">List Service</h1> 
        </div>
        <div class="col-md-6 col-12 text-md-end text-start">
            <a href="{{ route('admin.service.create') }}" class="btn btn-primary w-100 w-md-auto">
                <i class="bi bi-plus-lg me-1"></i> Tambah Service Baru
            </a>
        </div>
    </div>

    {{-- Div table-responsive ini akan membuat tabel bisa di-scroll secara horizontal jika terlalu lebar --}}
    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-striped table-hover align-middle mb-0" id="servicesTable">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th> {{-- Hapus d-none d-md-table-cell --}}
                    <th scope="col">Price</th>
                    <th scope="col" class="text-center">Duration</th> {{-- Hapus d-none d-lg-table-cell --}}
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Image</th> {{-- Hapus d-none d-sm-table-cell --}}
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $index => $service)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td>Rp.{{ number_format($service->price, 2, ',', '.') }}</td>
                        <td class="text-center">{{ $service->duration }}</td>
                        <td class="text-center">
                            @if ($service->status == 'active')
                                <span class="badge bg-success">{{ ucfirst($service->status) }}</span>
                            @elseif ($service->status == 'inactive')
                                <span class="badge bg-danger">{{ ucfirst($service->status) }}</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($service->status) }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($service->image_url)
                                <img src="{{ $service->image_url }}" class="img-fluid rounded" style="max-width:80px; height:auto;" alt="{{ $service->title }}">
                            @else
                                <img src="https://via.placeholder.com/80x50/f8f9fa/dee2e6?text=No+Image" class="img-fluid rounded" style="max-width:80px; height:auto;" alt="No Image">
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                <a href="" class="btn btn-sm btn-warning" title="Edit Service">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus service ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Service">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="bi bi-emoji-frown display-4 text-muted d-block mb-2"></i>
                            Tidak ada service yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Umum: izinkan teks memecah baris secara default */
#servicesTable th, #servicesTable td {
    white-space: normal;
    word-wrap: break-word;
    vertical-align: middle;
}

/* Minimal width untuk setiap kolom agar konten tidak terlalu rapat */
#servicesTable th:nth-child(1), #servicesTable td:nth-child(1) { min-width: 50px; white-space: nowrap; } /* ID */
#servicesTable th:nth-child(2), #servicesTable td:nth-child(2) { min-width: 150px; } /* Title */
#servicesTable th:nth-child(3), #servicesTable td:nth-child(3) { min-width: 250px; } /* Description */
#servicesTable th:nth-child(4), #servicesTable td:nth-child(4) { min-width: 120px; white-space: nowrap; } /* Price */
#servicesTable th:nth-child(5), #servicesTable td:nth-child(5) { min-width: 100px; white-space: nowrap; } /* Duration */
#servicesTable th:nth-child(6), #servicesTable td:nth-child(6) { min-width: 80px; white-space: nowrap; } /* Status */
#servicesTable th:nth-child(7), #servicesTable td:nth-child(7) { min-width: 100px; white-space: nowrap; } /* Image */
#servicesTable th:nth-child(8), #servicesTable td:nth-child(8) { min-width: 110px; white-space: nowrap; } /* Actions */

/* Gambar rata tengah */
#servicesTable td.text-center img {
    display: block;
    margin: 0 auto;
}

/* Penyesuaian font dan padding di mobile */
@media (max-width: 767.98px) { /* HP */
    #servicesTable th, #servicesTable td {
        font-size: 0.85rem; /* Sedikit lebih kecil */
        padding: 0.6rem; /* Sedikit lebih rapat */
    }
    /* Tombol tambah full width */
    .btn.w-100 { width: 100% !important; margin-bottom: 0.5rem; }
}

@media (max-width: 575.98px) { /* HP kecil */
    #servicesTable th, #servicesTable td {
        font-size: 0.8rem;
        padding: 0.5rem;
    }
}
</style>
@endpush