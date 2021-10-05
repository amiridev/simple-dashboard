<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

/**
 * @property string $slug
 * @property string $title
 * @property string $picture
 * @property string $picture_url
 * @property string $brand_id
 * @property string $price
 * @property string $discount_price
 * @property string $inventory
 * @property string $short_desc
 * @property string $long_desc
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Category[] $categories
 */
class Product extends Model
{
    use HasFactory, ModelTrait, Slugify;

    protected $fillable = [
        'brand_id',
        'slug',
        'picture',
        'title',
        'price',
        'discount_price',
        'inventory',
        'short_desc',
        'long_desc',
        'status',
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

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'product_category',
            'product_id',
            'category_id'
        );
    }

    public function hasCategory($catId)
    {
        if(!blank($this->categories)){
            $cat = collect($this->categories)->where('id', $catId)->first();
            return (bool)$cat;
        }
        return false;
    }

    public static function Datatable($products)
    {
        $datatable = DataTables::of($products)
            ->editColumn('picture' , function ($product){
                return '<img src="' . $product->picture_url . '" height="40px"/>';
            })->editColumn('brand_title' , function ($product){
                return $product->brand_title;
            })->editColumn('created_at', function ($product) {
                return '<span>' . j_date_format($product->created_at) . '</span>';
            })->editColumn('updated_at', function ($product) {
                return '<span>' . j_date_format($product->updated_at) . '</span>';
            })->editColumn('action', function ($product) {
                $editLink = route('dashboard.products.edit', ['product' => $product->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['picture', 'created_at', 'updated_at' ,'action'])->make(true);
    }
}
