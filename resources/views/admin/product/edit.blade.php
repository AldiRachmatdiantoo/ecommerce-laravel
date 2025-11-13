@extends('layouts.header')

@section('title', 'Edit Product')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4 text-center">Edit Produk</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image_url)
                    <img src="{{ $product->image_url }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
