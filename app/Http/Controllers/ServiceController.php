<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
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
            'duration' => 'required',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,jpg,png,webp'
        ]);
        $image_url = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            //ubah nama
            $imgName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/image/services'), $imgName);
            $image_url = asset('/uploads/image/services/' . $imgName);
        }
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'status' => $request->status,
            'image_url' => $image_url
        ]);
        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
