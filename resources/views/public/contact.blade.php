@extends('layouts.public-header')

@section('title', 'Hubungi Kami - UMKMshop')

@section('content')
    {{-- Hero Section: Contact Us --}}
    <section class="hero-contact-section text-center py-5 bg-primary text-white">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
            <p class="lead mb-4">
                Kami senang mendengar dari Anda! Silakan isi formulir di bawah atau gunakan informasi kontak kami.
            </p>
            <i class="bi bi-headset display-1 text-white"></i>
        </div>
    </section>

    <div class="container my-5">
        <div class="row gx-5">
            {{-- Contact Form Section --}}
            <div class="col-lg-7 mb-5 mb-lg-0">
                <h2 class="fw-bold mb-4 text-primary">Kirim Pesan Kepada Kami</h2>
                <p class="text-muted mb-4">
                    Punya pertanyaan, saran, atau ingin berkolaborasi? Jangan ragu untuk menghubungi kami.
                    Tim kami akan merespons Anda sesegera mungkin.
                </p>

                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email aktif Anda" required>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- START: Penambahan field Nomor Telepon --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Nomor Telepon (Opsional)</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Contoh: +6281234567890">
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- END: Penambahan field Nomor Telepon --}}
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek pesan Anda" required>
                        @error('subject')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label fw-bold">Pesan Anda</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        @error('message')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
                        Kirim Pesan <i class="bi bi-send-fill ms-2"></i>
                    </button>
                </form>
            </div>

            {{-- Contact Info Section --}}
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4 text-success">Informasi Kontak</h2>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-geo-alt-fill text-muted fs-4 me-3"></i>
                    <div>
                        <h5 class="fw-bold mb-0">Alamat</h5>
                        <p class="mb-0 text-muted">Jl. UMKM Jaya No. 123, Kota Kreatif, Indonesia</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-envelope-fill text-muted fs-4 me-3"></i>
                    <div>
                        <h5 class="fw-bold mb-0">Email</h5>
                        <p class="mb-0 text-muted">info@umkmshop.co.id</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-phone-fill text-muted fs-4 me-3"></i>
                    <div>
                        <h5 class="fw-bold mb-0">Telepon</h5>
                        <p class="mb-0 text-muted">(+62) 812-3456-7890</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4">
                    <i class="bi bi-whatsapp text-muted fs-4 me-3"></i>
                    <div>
                        <h5 class="fw-bold mb-0">WhatsApp</h5>
                        <p class="mb-0 text-muted">(+62) 812-3456-7890</p>
                    </div>
                </div>

                <h2 class="fw-bold mb-4 text-secondary">Temukan Kami di Peta</h2>
                <div class="map-responsive rounded shadow-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3023963486374!2d106.8209861147699!3d-6.219808495509747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f417e2b7e127%3A0x3b1c6d8e0f1d0b5e!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1678912345678!5m2!1sen!2sid" 
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .hero-contact-section {
        background-color: #0d6efd; /* Primary color */
        color: white;
    }
    .hero-contact-section .bi {
        color: white;
    }
    .text-primary {
        color: #0d6efd !important;
    }
    .text-success {
        color: #198754 !important;
    }
    .text-secondary {
        color: #6c757d !important;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    /* Responsif untuk Google Maps */
    .map-responsive {
        overflow:hidden;
        padding-bottom:56.25%; /* 16:9 Aspect Ratio */
        position:relative;
        height:0;
    }
    .map-responsive iframe {
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
        border-radius: 0.5rem; /* Match Bootstrap card/element styling */
    }
</style>
@endpush