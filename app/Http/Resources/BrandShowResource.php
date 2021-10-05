<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BrandShowResource
 * @package App\Http\Resources
 *
 * @mixin Brand
 */
class BrandShowResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture,
        ];
    }
}
