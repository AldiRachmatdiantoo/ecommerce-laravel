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

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-striped table-hover align-middle mb-0" id="servicesTable">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="d-none d-md-table-cell">Description</th> {{-- Sembunyikan di bawah md --}}
                    <th scope="col">Price</th>
                    <th scope="col" class="d-none d-lg-table-cell text-center">Duration</th> {{-- Sembunyikan di bawah lg --}}
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="d-none d-sm-table-cell text-center">Image</th> {{-- Sembunyikan di bawah sm --}}
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $index => $service)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{ Str::limit($service->title, 30) }}</td>
                        <td class="d-none d-md-table-cell">{{ Str::limit($service->description, 50) }}</td>
                        <td>Rp.{{ number_format($service->price, 2, ',', '.') }}</td>
                        <td class="d-none d-lg-table-cell text-center">{{ $service->duration }}</td>
                        <td class="text-center">
                            @if ($service->status == 'active')
                                <span class="badge bg-success">{{ ucfirst($service->status) }}</span>
                            @elseif ($service->status == 'inactive')
                                <span class="badge bg-danger">{{ ucfirst($service->status) }}</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($service->status) }}</span>
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            @if ($service->image_url)
                                {{-- Pastikan menggunakan asset() untuk gambar yang diupload ke storage --}}
                                <img src="{{ $service->image_url }}" class="img-fluid rounded" style="max-width:80px; height: auto;" alt="{{ $service->title }}">
                            @else
                                <img src="https://via.placeholder.com/80x50/f8f9fa/dee2e6?text=No+Image" class="img-fluid rounded" style="max-width:80px; height: auto;" alt="No Image">
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-nowrap justify-content-center gap-1">
                                {{-- Link Edit yang benar --}}
                                <a href="" class="btn btn-sm btn-warning" title="Edit Service">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                {{-- Form Hapus yang benar --}}
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

    {{-- Paginasi (jika Anda menggunakan paginasi di controller) --}}
    {{-- Contoh: @if ($services->hasPages()) <div class="mt-4 d-flex justify-content-center"> {{ $services->links() }} </div> @endif --}}
</div>
@endsection

@push('styles')
<style>
    /* Kustomisasi lebar minimum kolom agar lebih kompak di mobile */
    #servicesTable th, #servicesTable td {
        white-space: nowrap; /* Mencegah teks memecah baris terlalu cepat di kolom penting */
    }

    #servicesTable th:nth-child(2), /* Title */
    #servicesTable td:nth-child(2) {
        min-width: 120px; 
        max-width: 150px; /* Batasi lebar title */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    #servicesTable th:nth-child(4), /* Price */
    #servicesTable td:nth-child(4) {
        min-width: 100px;
    }
    
    #servicesTable th:nth-child(8), /* Actions */
    #servicesTable td:nth-child(8) {
        min-width: 90px; /* Minimal width untuk tombol aksi agar tidak tumpang tindih */
    }

    /* Override Bootstrap's d-flex default for td to ensure vertical alignment for images */
    #servicesTable td.text-center img {
        display: block; /* Gambar menjadi blok untuk centering */
        margin-left: auto;
        margin-right: auto;
    }

    /* Media query untuk tampilan mobile yang sangat sempit */
    @media (max-width: 575.98px) { /* Extra small devices (HP portrait) */
        #servicesTable th, #servicesTable td {
            font-size: 0.85rem; /* Kurangi ukuran font tabel */
            padding: 0.5rem; /* Kurangi padding tabel */
        }
        
        /* Ensure image column is hidden if needed */
        #servicesTable th:nth-child(7), /* Image column */
        #servicesTable td:nth-child(7) {
            display: none !important; /* Paksa sembunyi jika masih terlihat */
        }
    }

    @media (max-width: 767.98px) { /* Small devices (HP landscape, tablet portrait) */
        .btn.w-100 {
            width: 100% !important; /* Memastikan tombol "Tambah" full width */
            margin-bottom: 0.5rem;
        }
    }
</style>
@endpush