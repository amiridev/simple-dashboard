<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'users' => User::count(),
            'brands' => Brand::count(),
            'categories' => Category::count(),
            'products' => Product::count(),
        ];

        $categories = Category::with(['children'])->isParent()->get();

        return view('admin.dashboard', compact('count', 'categories'));
    }
}
