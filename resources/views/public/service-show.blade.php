@extends('layouts.public-header')

{{-- Judul Halaman dinamis berdasarkan nama layanan --}}
@section('title', $service->title ?? 'Detail Layanan')

@section('content')

{{-- Wrapper untuk section dengan padding --}}
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 my-5">
        
        {{-- Tombol Kembali --}}
        <div class="mb-4">
            {{-- Arahkan ini ke halaman daftar layanan Anda, misal: route('public.services') --}}
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-pill"> 
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>
        </div>

        {{-- Konten Detail Layanan --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4 p-md-5">
                <div class="row gx-4 gx-lg-5 align-items-start">
                    
                    {{-- 1. Kolom Gambar Layanan --}}
                    <div class="col-md-6">
                        <img class="img-fluid rounded-3 mb-3 mb-md-0" 
                             src="{{ $service->image_url ?? 'https://via.placeholder.com/600x400/6c757d/ffffff?text=Layanan' }}" 
                             alt="{{ $service->title ?? 'Gambar Layanan' }}"
                             style="object-fit: cover; width: 100%; aspect-ratio: 4/3;">
                    </div>

                    {{-- 2. Kolom Detail Info --}}
                    <div class="col-md-6">
                        {{-- Judul Layanan --}}
                        <h1 class="display-5 fw-bold">{{ $service->title ?? 'Nama Layanan' }}</h1>
                        
                        {{-- Harga Layanan --}}
                        <p class="fs-2 fw-bold text-info my-3">
                            {{-- Menggunakan 'Mulai Rp' seperti di kartu --}}
                            Mulai Rp{{ number_format($service->price ?? 0, 0, ',', '.') }}
                        </p>

                        {{-- Info Stok & Jumlah TIDAK ADA, diganti CTA --}}
                        <hr>

                        {{-- Deskripsi Lengkap Layanan --}}
                        <h5 class="fw-bold mt-4">Deskripsi Layanan</h5>
                        
                        {{-- 
                          PERUBAHAN DI SINI:
                          - Menghapus 'white-space: pre-wrap;'
                          - Menambahkan 'text-align: justify;'
                        --}}
                        <p class="text-muted" style="text-align: justify;">
                            {{ $service->description ?? 'Tidak ada deskripsi untuk layanan ini.' }}
                        </p>

                        <hr class="my-4">

                        {{-- 
                          Bagian Aksi (CTA) untuk Jasa
                          Ini menggantikan form "Tambah Keranjang" 
                        --}}
                        <div class="bg-light p-4 rounded-3 border">
                            <h5 class="fw-bold">Tertarik dengan layanan ini?</h5>
                            <p class="text-muted mb-3">
                                Hubungi kami untuk konsultasi, penjadwalan, atau mendapatkan penawaran khusus.
                            </p>
                            
                            {{-- Ganti '08123456789' dengan nomor WA Anda --}}
                            @php
                                $waNumber = "628123456789"; // Ganti dengan nomor Anda (diawali 62)
                                $waMessage = urlencode("Halo Di'Shop, saya tertarik dengan layanan: " . ($service->title ?? ''));
                            @endphp
                            
                            <div class="d-grid gap-2">
                                <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" 
                                   target="_blank" 
                                   class="btn btn-success btn-lg rounded-pill">
                                    <i class="bi bi-whatsapp me-2"></i>
                                    Pesan via WhatsApp
                                </a>
                                {{-- Arahkan ke halaman kontak Anda --}}
                                <a href="{{-- route('public.contact') --}}" class="btn btn-outline-primary btn-lg rounded-pill">
                                    <i class="bi bi-headset me-2"></i>
                                    Kontak Kami
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Anda bisa menambahkan section untuk "Layanan Terkait" di sini jika mau --}}

@endsection