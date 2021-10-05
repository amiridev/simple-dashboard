<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandListResource;
use App\Http\Resources\BrandShowResource;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class ApiBrandsController extends Controller
{
    public function index()
    {
        /** @var Collection|Brand[] $data */
        $data = Brand::all();
        return BrandListResource::collection($data);
    }

    public function show(Brand $brand)
    {
        return new BrandShowResource($brand);
    }
}
