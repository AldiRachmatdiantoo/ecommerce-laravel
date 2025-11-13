@extends('layouts.public-header')

{{-- Judul Halaman dinamis berdasarkan nama produk --}}
@section('title', $product->title ?? 'Detail Produk')

@section('content')

{{-- Wrapper untuk section dengan padding --}}
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 my-5">
        
        {{-- Tombol Kembali --}}
        <div class="mb-4">
            {{-- Arahkan ini ke halaman daftar produk Anda, misal: route('public.products') --}}
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-pill"> 
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>
        </div>

        {{-- Konten Detail Produk --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4 p-md-5">
                <div class="row gx-4 gx-lg-5 align-items-start">
                    
                    {{-- 1. Kolom Gambar Produk --}}
                    <div class="col-md-6 position-relative">
                        <img class="img-fluid rounded-3 mb-3 mb-md-0" 
                             src="{{ $product->image_url}}" 
                             alt="{{ $product->title}}"
                             style="object-fit: cover; width: 100%; aspect-ratio: 4/3;">
                        
                        {{-- Badge Stok Habis (jika stok = 0) --}}
                        @if (($product->stock ?? 0) == 0)
                            <span class="badge bg-danger fs-5 position-absolute top-0 start-0 m-3">Stok Habis</span>
                        @endif
                    </div>

                    {{-- 2. Kolom Detail Info --}}
                    <div class="col-md-6">
                        {{-- Judul Produk --}}
                        <h1 class="display-5 fw-bold">{{ $product->title ?? 'Nama Produk' }}</h1>
                        
                        {{-- Harga Produk --}}
                        <p class="fs-2 fw-bold text-success my-3">
                            Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}
                        </p>

                        {{-- Info Stok --}}
                        <p class="mb-3">
                            <strong>Stok Tersedia:</strong> 
                            <span class="badge {{ ($product->stock ?? 0) > 0 ? 'bg-success' : 'bg-danger' }} fs-6">
                                {{ ($product->stock ?? 0) > 0 ? $product->stock : 'Habis' }}
                            </span>
                        </p>

                        <hr>

                        {{-- Deskripsi Lengkap Produk --}}
                        <h5 class="fw-bold mt-4">Deskripsi Produk</h5>
                        {{-- style="white-space: pre-wrap;" berguna agar baris baru (enter) di deskripsi tetap tampil --}}
                        <p class="text-muted" style="white-space: pre-wrap;">
                            {{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}
                        </p>

                        <hr class="my-4">

                        {{-- Form Aksi (Tambah Keranjang) --}}
                        {{-- Ganti 'action' dengan route Anda, misal: route('cart.add') --}}
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                            
                            <div class="row g-3 align-items-center">
                                {{-- Input Jumlah --}}
                                <div class="col-md-4 col-lg-3">
                                    <label for="quantity" class="form-label fw-bold">Jumlah:</label>
                                    <input type="number" 
                                           name="quantity" 
                                           id="quantity" 
                                           class="form-control form-control-lg text-center" 
                                           value="1" 
                                           min="1" 
                                           max="{{ $product->stock ?? 1 }}"
                                           {{ (($product->stock ?? 0) == 0) ? 'disabled' : '' }}>
                                </div>
                                
                                {{-- Tombol Submit --}}
                                <div class="col-md-8 col-lg-9 d-grid">
                                    {{-- Tombol 'Tambah Keranjang' akan ada di atas 'Jumlah' pada layar HP --}}
                                    <button type="submit" 
                                            class="btn btn-primary btn-lg rounded-pill mt-md-4" 
                                            {{ (($product->stock ?? 0) == 0) ? 'disabled' : '' }}>
                                        <i class="bi bi-cart-plus me-2"></i>
                                        Tambah Keranjang
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Anda bisa menambahkan section untuk "Produk Terkait" di sini jika mau --}}

@endsection 