<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.product.index');
    });
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
    });
    Route::prefix('/service')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/create', [ServiceController::class, 'store'])->name('admin.service.store');
    });
});
Route::prefix('/cart')->group(function () {});
Route::prefix('/product')->group(function () {
    Route::get('/detail/{product}', [ProductController::class, 'show'])->name('public.product-show');
});
Route::prefix('/service')->group(function(){
    Route::get('/detail/{service}', [ServiceController::class, 'show'])->name('public.service-show');
});
Route::get('/', function () {
    return redirect()->route('public.home');
});
Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('public.products-public', compact('products'));
})->name('public.products');
Route::get('/services', function () {
    $services = \App\Models\Service::all();
    return view('public.services-public', compact('services'));
})->name('public.services');
Route::get('/about', function () {
    return view('public.about');
})->name('public.about');
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/home', function () {
    $products = \App\Models\Product::all();
    $services = \App\Models\Service::all();
    return view('public.index', compact('products', 'services'));
})->name('public.home');
