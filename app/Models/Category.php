<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

/**
 * Class Category
 * @package App\Models
 *
 * @property string $picture
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string $picture_url
 * @property string $parent_title
 *
 * @property Product[] $products
 * @property Category $parent
 * @property Category[] $children
 *
 * @method static isParent()
 */
class Category extends Model
{
    use HasFactory, ModelTrait, Slugify;

    protected $fillable = [
        'picture',
        'parent_id',
        'slug',
        'title',
    ];

    protected $appends = [
        'picture_url'
    ];

    public function getPictureUrlAttribute()
    {
        if ($this->picture) {
            return url('/') . str_replace('public', '', $this->picture);
        }
        return url('/') . '/no-img.jpg';
    }

    public function getParentTitleAttribute()
    {
        if ($this->parent) {
            return $this->parent->title;
        }
        return 'بدون والد';
    }

    public function scopeIsParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_category',
            'category_id',
            'product_id'
        );
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function Datatable($categories)
    {
        $datatable = DataTables::of($categories)
            ->editColumn('picture' , function ($category){
                return '<img src="' . $category->picture_url . '" height="40px"/>';
            })->editColumn('parent_title' , function ($category){
                return $category->parent_title;
            })->editColumn('created_at', function ($category) {
                return '<span>' . j_date_format($category->created_at) . '</span>';
            })->editColumn('updated_at', function ($category) {
                return '<span>' . j_date_format($category->updated_at) . '</span>';
            })->editColumn('action', function ($category) {
                $editLink = route('dashboard.categories.edit', ['category' => $category->id]);
                return "<a href='$editLink' class='btn btn-xs btn-outline-dark'>ویرایش</a>";
            });
        return $datatable->rawColumns(['picture', 'created_at', 'updated_at' ,'action'])->make(true);
    }
}
