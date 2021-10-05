<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Province extends Model
{
    use HasFactory, ModelTrait;

    protected $table = 'provinces';

    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function cities()
    {
        return $this->hasMany(city::class , 'province_id');
    }

    public static function Datatable($provinces)
    {
        $datatable = DataTables::of($provinces)

            ->editColumn('created_at', function ($province) {
                return '<span>' . j_date_format($province->created_at) . '</span>';
            })->editColumn('updated_at', function ($province) {
                return '<span>' . j_date_format($province->updated_at) . '</span>';
            })->editColumn('action', function ($province) {
                $editLink = route('dashboard.provinces.edit', ['province' => $province->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['created_at' , 'updated_at' , 'action'])->make(true);
    }

}
