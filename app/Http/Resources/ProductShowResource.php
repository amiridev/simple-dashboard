<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductShowResource
 * @package App\Http\Resources
 *
 * @mixin Product
 */
class ProductShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand_id' => $this->brand_id,
            'slug' => $this->slug,
            'picture' => $this->picture,
            'title' => $this->title,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'inventory' => $this->inventory,
            'short_desc' => $this->short_desc,
            'long_desc' => $this->long_desc,
            'status' => $this->status,
        ];
    }
}
