<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class City extends Model
{
    use HasFactory, ModelTrait;

    protected $fillable = [
        'name',
        'province_id'
    ];
    protected $dates =[
        'created_at',
        'updated_at'
    ];

    public function getProvinceNameAttribute()
    {
        return $this->province->name;
    }

    public function province()
    {
        return $this->belongsTo(Province::class , 'province_id');
    }

    public static function Datatable($cities)
    {
        $datatable = DataTables::of($cities)
            ->editColumn('province_name', function ($city) {
                return $city->province_name;
            })->editColumn('created_at', function ($city) {
                return '<span>' . j_date_format($city->created_at) . '</span>';
            })->editColumn('updated_at', function ($city) {
                return '<span>' . j_date_format($city->updated_at) . '</span>';
            })->editColumn('action', function ($city) {
                $editLink = route('dashboard.cities.edit', ['city' => $city->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['created_at' , 'updated_at' , 'action'])->make(true);
    }
}
