<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
    public function datatable()
    {
        $products = Product::all();
        return Product::Datatable($products);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', compact('brands','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_ids' => 'required|array|min:1',
            'category_ids.*' => 'required|numeric|exists:categories,id',
            'brand_id' => 'required|numeric|exists:brands,id',
            'picture' => 'required|image|max:512|mimes:jpeg,png,gif,jpg',
            'title' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:1000',
            'discount_price' => 'nullable|numeric',
            'inventory' => 'required|numeric|min:1',
            'short_desc' => 'required|string|min:10|max:300',
            'long_desc' => 'nullable|string|min:30|max:10000',
            'status' => 'sometimes',
        ]);

        $data = $request->only([
            'brand_id',
            'title',
            'price',
            'discount_price',
            'inventory',
            'short_desc',
            'long_desc',
        ]);

        $data['status'] = isset($request->status);
        $data['slug'] = Product::slugify($request['title']);

        if (isset($request->picture)) {
            $data['picture'] = uploadFile($request->picture);
        }

        /** @var Product $product */
        $product = Product::create($data);

        $product->categories()->sync(array_unique($request['category_ids']));

        return redirect()->route('dashboard.products.index');
    }

    public function edit(Product $product)
    {
        $product->load(['categories']);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'brands','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'brand_id' => 'required|numeric|exists:brands,id',
            'picture' => 'nullable|image|max:512|mimes:jpeg,png,gif,jpg',
            'title' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:1000',
            'discount_price' => 'nullable|numeric',
            'inventory' => 'required|numeric|min:1',
            'short_desc' => 'required|string|min:10|max:300',
            'long_desc' => 'nullable|string|min:30|max:10000',
            'status' => 'sometimes',
        ]);
        $data = $request->only([
            'brand_id',
            'title',
            'price',
            'discount_price',
            'inventory',
            'short_desc',
            'long_desc',
        ]);

        $data['status'] = isset($request->status);
        if (isset($request->picture)) {
            $data['picture'] = uploadFile($request->picture);
        }

        $product->update($data);

        $product->categories()->sync(array_unique($request['category_ids']));

        return redirect()->route('dashboard.products.index');
    }
}
