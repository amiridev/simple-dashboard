<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        return view('admin.brands.index');
    }

    public function datatable()
    {
        $brands = Brand::all();
        return Brand::Datatable($brands);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|max:512|mimes:jpeg,png,gif,jpg',
            'title' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:400',
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = Brand::slugify($request->title);
        $data['picture'] = uploadFile($request->picture);

        Brand::create($data);

        return redirect()->route('dashboard.brands.index');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'picture' => 'nullable|image|max:512|mimes:jpeg,png,gif,jpg',
            'title' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:400',
        ]);

        $data = $request->only(['title', 'description']);

        if (isset($request->picture)) {
            $data['picture'] = $this->uploadFile($request->picture);
        }

        $brand->update($data);

        return redirect()->route('dashboard.brands.index');
    }

    public function delete(Brand $brand)
    {
        try {
            $brand->delete();
        } catch (\Exception $exp) {
            throw $exp;
        }

        return redirect()->route('dashboard.brands.index');
    }
}
