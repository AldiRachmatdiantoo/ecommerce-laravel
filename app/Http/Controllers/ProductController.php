<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:70|min:5',
            'description' => 'required',
            'price' => 'required|min:0',
            'stock' => 'required|min:0',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp'
        ]);
        $image_url = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            //ubah nama
            $imgName = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads/image'), $imgName);
            $image_url = asset('/uploads/image/' . $imgName);
        }
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $image_url
        ]);
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
