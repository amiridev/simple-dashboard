<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class Brand
 * @package App\Models
 *
 * @property string $picture
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $picture_url
 * @property string $created_at
 * @property string $updated_at
 */
class Brand extends Model
{
    use HasFactory, ModelTrait, Slugify;

    protected $table = 'brands';

    protected $fillable = [
        'picture',
        'slug',
        'title',
        'description',
    ];

    protected $appends = [
        'picture_url'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getPictureUrlAttribute()
    {
        if ($this->picture) {
            return url('/') . str_replace('public', '', $this->picture);
        }
        return url('/') . '/no-img.jpg';
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public static function Datatable($brands)
    {
        $datatable = DataTables::of($brands)
            ->editColumn('picture' , function ($brand){
                return '<img src="' . $brand->picture_url . '" height="40px"/>';
            })->editColumn('created_at', function ($brand) {
                return '<span>' . j_date_format($brand->created_at) . '</span>';
            })->editColumn('updated_at', function ($brand) {
                return '<span>' . j_date_format($brand->updated_at) . '</span>';
            })->editColumn('title', function ($brand) {
                return $brand->title;
            })->editColumn('slug', function ($brand) {
                return $brand->slug;
            })->editColumn('description', function ($brand) {
                return $brand->description;
            })->editColumn('action', function ($brand) {
                $editLink = route('dashboard.brands.edit', ['brand' => $brand->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['picture', 'created_at', 'updated_at' ,'title', 'slug','description', 'action'])->make(true);
    }
}
