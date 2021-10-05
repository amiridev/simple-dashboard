<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryListResource;
use App\Http\Resources\CategoryShowResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class ApiCategoriesController extends Controller
{
    public function index()
    {
        /** @var Collection|Category[] $data */
        $data = Category::all();

        return CategoryListResource::collection($data);
    }

    public function show(Category $category)
    {
       return new CategoryShowResource($category);
    }
}
