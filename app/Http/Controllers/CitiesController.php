<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::paginate(20);
        return view('admin.cities.index' , compact('cities'));
    }
    public function datatable()
    {
        $cities = City::with(['province'])->get();
        return City::Datatable($cities);
    }
    public function create()
    {
        $provinces = Province::all();
        return view('admin.cities.create',compact('provinces'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'province_id' => 'required|numeric|exists:provinces,id',
        ]);
        $data = $request->only([
            'name',
            'province_id',
        ]);

        City::create($data);
        $provinces = Province::all();

        return redirect()->route('dashboard.cities.index',compact($provinces));
    }
    public function edit(City $city)
    {
        $provinces = Province::all();
        return view('admin.cities.edit' , compact('city' , 'provinces'));
    }
    public function update(Request $request,City $city)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'province_id' => 'required|numeric|exists:provinces,id'
        ]);
        $data = $request->only([
            'name',
            'province_id',
        ]);
        $city->update($data);
        return redirect()->route('dashboard.cities.index');
    }
    /**
     *@throws \Exception
     */
    public function delete(City $city)
    {
        try{
            $city->delete();
        } catch (\Exception $exp){
            throw $exp;
        }
        return redirect()->route('dashboard.cities.index');
    }
}
