@extends('layouts.header')

@section('title', 'List Produk')

@section('content')
    <div class="container my-4">
        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <h1 class="mb-0">List Produk</h1>
                </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Produk Baru
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
                    <th>Stock</th>
                    <th>Image</th>
                    </tr>
                </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>Rp.{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" class="img-fluid rounded" style="max-width:100px;"
                                    alt="{{ $product->title }}">
                            @else
                                -
                            @endif
                            </td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada produk.</td>
                        </tr>
                @endforelse
                </tbody>
            </table>
    </div>
@endsection
