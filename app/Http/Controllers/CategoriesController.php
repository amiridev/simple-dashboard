<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }
    public function datatable()
    {
        $categories = Category::with(['parent'])->get();
        return Category::Datatable($categories);
    }


    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|max:512|mimes:jpeg,png,gif,jpg',
            'parent_id' => 'nullable|numeric|exists:categories,id',
            'title' => 'required|string|min:2|max:255',
        ]);
        $data = $request->only(['title']);
        $data['slug'] = Category::slugify($request->title);
        $data['picture'] = uploadFile($request->picture);

        if (isset($request['parent_id'])) {
            /** @var Category $parent */
            $parent = Category::where('id', $request['parent_id'])->first();

            if ($parent && $parent->parent_id) {
                return redirect()->back();
            }

            $data['parent_id'] = $request['parent_id'];
        }

        Category::create($data);

        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'picture' => 'nullable|image|max:512|mimes:jpeg,png,gif,jpg',
            'parent_id' => 'nullable|numeric|exists:categories,id',
            'title' => 'required|string|min:2|max:255',
        ]);

        $data = $request->only(['title']);

        if (isset($request->picture)) {
            $data['picture'] = uploadFile($request->picture);
        }

        if (isset($request['parent_id'])) {
            /** @var Category $parent */
            $parent = Category::where('id', $request['parent_id'])->first();

            if ($parent && $parent->parent_id || $parent->id == $category->id) {
                return redirect()->back()->with(['has_parent_error' => true]);
            }

            $data['parent_id'] = $request['parent_id'];
        }

        $category->update($data);
        return redirect()->route('dashboard.categories.index');
    }

    public function delete(Category $category)
    {
        DB::beginTransaction();

        $category->load(['products', 'children']);
        try {
            if (!blank($category->products)) {
                $category->products()->sync([]);
            }
            if (!blank($category->children)) {
                foreach ($category->children as $child) {
                    $child->update(['parent_id' => null]);
                }
            }
            $category->delete();
            DB::commit();
        } catch (\Exception $exp) {
            DB::rollBack();
            return redirect()->back()->with(['deleted' => false]);
        }
        return redirect()->route('dashboard.categories.index');
    }

}
