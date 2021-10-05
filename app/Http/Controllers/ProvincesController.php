<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    public function index()
    {
        return view('admin.provinces.index');
    }

    public function datatable()
    {
        $provinces = Province::all();
        return Province::Datatable($provinces);
    }

    public function create()
    {
        return view('admin.provinces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);
        Province::create([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard.provinces.index');
    }

    public function edit(Province $province)
    {
        return view('admin.provinces.edit' , compact('province'));
    }

    public function update(Request $request,Province $province)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);
        return redirect()->route('dashboard.provinces.index');
    }

    public function delete(Province $province)
    {
        try{
            $province->delete();
        } catch (\Exception $exp){
            throw $exp;
        }
        return redirect()->route('dashboard.provinces.index');
    }
}
