@extends('layouts.header')

@section('title', 'List Produk')

@section('content')
<div class="container-fluid py-4"> {{-- Ubah dari .container menjadi .container-fluid untuk lebih banyak ruang --}}
    <div class="row mb-3 align-items-center">
        <div class="col-md-6 col-12 mb-2 mb-md-0"> {{-- Tambahkan col-12 untuk mobile --}}
            <h1 class="mb-0 fs-3">List Produk</h1> {{-- Sesuaikan ukuran font untuk h1 --}}
        </div>
        <div class="col-md-6 col-12 text-md-end text-start"> {{-- Sesuaikan text-start untuk mobile --}}
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary w-100 w-md-auto"> {{-- Tombol full width di mobile --}}
                <i class="bi bi-plus-lg me-1"></i> Tambah Produk Baru
            </a>
        </div>
    </div>

    {{-- Tabel responsif --}}
    <div class="table-responsive shadow-sm rounded-3"> {{-- Tambahkan shadow dan radius --}}
        <table class="table table-bordered table-striped table-hover align-middle mb-0" id="productsTable"> {{-- Tambahkan ID untuk JS/CSS kustom --}}
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="d-none d-md-table-cell">Description</th> {{-- Sembunyikan di bawah md --}}
                    <th scope="col">Price</th>
                    <th scope="col" class="d-none d-lg-table-cell text-center">Stock</th> {{-- Sembunyikan di bawah lg, tambahkan text-center --}}
                    <th scope="col" class="d-none d-sm-table-cell text-center">Image</th> {{-- Sembunyikan di bawah sm, tambahkan text-center --}}
                    <th scope="col" class="text-center">Actions</th> {{-- Kolom untuk Aksi --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td class="text-center">{{ $index+1 }}</td>
                        <td>{{ Str::limit($product->title, 30) }}</td> {{-- Batasi judul --}}
                        <td class="d-none d-md-table-cell">{{ Str::limit($product->description, 50) }}</td> {{-- Batasi deskripsi --}}
                        <td>Rp.{{ number_format($product->price, 2, ',', '.') }}</td> {{-- Format harga dengan titik --}}
                        <td class="d-none d-lg-table-cell text-center">
                            <span class="badge bg-{{ $product->stock > 0 ? 'primary' : 'danger' }}">
                                {{ $product->stock > 0 ? $product->stock . ' Tersedia' : 'Habis' }}
                            </span>
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url}}" class="img-fluid rounded" style="max-width:80px; height: auto;" alt="{{ $product->title }}"> {{-- Gunakan asset() untuk gambar yang diupload --}}
                            @else
                                <img src="https://via.placeholder.com/80x50/f8f9fa/dee2e6?text=No+Image" class="img-fluid rounded" style="max-width:80px; height: auto;" alt="No Image">
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-nowrap justify-content-center gap-1"> {{-- Gunakan flex-nowrap dan justify-content-center --}}
                                <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-sm btn-warning" title="Edit Produk">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{route('admin.product.destroy', $product->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Produk">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4"> {{-- Sesuaikan colspan --}}
                            <i class="bi bi-emoji-frown display-4 text-muted d-block mb-2"></i>
                            Tidak ada produk yang tersedia.
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
    /* Kustomisasi lebar minimum kolom agar lebih kompak di mobile */
    #productsTable th, #productsTable td {
        white-space: nowrap; /* Mencegah teks memecah baris terlalu cepat di kolom penting */
    }

    #productsTable th:nth-child(2), /* Title */
    #productsTable td:nth-child(2) {
        min-width: 120px; 
        max-width: 150px; /* Batasi lebar title */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    #productsTable th:nth-child(4), /* Price */
    #productsTable td:nth-child(4) {
        min-width: 100px;
    }
    
    #productsTable th:nth-child(7), /* Actions */
    #productsTable td:nth-child(7) {
        min-width: 90px; /* Minimal width untuk tombol aksi agar tidak tumpang tindih */
    }

    /* Override Bootstrap's d-flex default for td to ensure vertical alignment for images */
    #productsTable td.text-center img {
        display: block; /* Gambar menjadi blok untuk centering */
        margin-left: auto;
        margin-right: auto;
    }

    /* Media query untuk tampilan mobile yang sangat sempit */
    @media (max-width: 575.98px) { /* Extra small devices (HP portrait) */
        #productsTable th, #productsTable td {
            font-size: 0.85rem; /* Kurangi ukuran font tabel */
            padding: 0.5rem; /* Kurangi padding tabel */
        }
        
        /* Ensure image column is hidden if needed */
        #productsTable th:nth-child(6), /* Image column */
        #productsTable td:nth-child(6) {
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