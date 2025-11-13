@extends('layouts.header')

@section('title', 'List Service')

@section('content')
<div class="container my-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <h1 class="mb-0">List Service</h1>
        </div>
        <div class="col-md-6 text-md-end">
            {{-- Tombol untuk menambah service baru --}}
            <a href="{{ route('admin.service.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Service Baru
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>${{ number_format($service->price, 2) }}</td>
                    <td>{{ $service->duration }}</td>
                    <td>
                        @if ($service->status == 'active')
                            <span class="badge bg-success">{{ ucfirst($service->status) }}</span>
                        @elseif ($service->status == 'inactive')
                            <span class="badge bg-danger">{{ ucfirst($service->status) }}</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($service->status) }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($service->image_url)
                            <img src="{{ $service->image_url }}" class="img-fluid rounded" style="max-width:100px; height: auto;" alt="{{ $service->title }}">
                        @else
                            <img src="https://via.placeholder.com/100x70/f8f9fa/dee2e6?text=No+Image" class="img-fluid rounded" style="max-width:100px; height: auto;" alt="No Image">
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <i class="bi bi-emoji-frown display-4 text-muted d-block mb-2"></i>
                        Tidak ada service yang tersedia.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection