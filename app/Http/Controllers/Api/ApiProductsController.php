<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductShowResource;
use App\Models\Product;

class ApiProductsController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return ProductListResource::collection($data);
    }

    public function show(Product $product)
    {
        return new ProductShowResource($product);
    }
}
