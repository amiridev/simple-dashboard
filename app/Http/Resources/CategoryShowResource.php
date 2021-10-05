<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CategoryShowResource
 * @package App\Http\Resources
 *
 * @mixin Category
 */
class CategoryShowResource extends JsonResource
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
            'picture' => $this->picture,
            'parent_id' => $this->parent_id,
            'title' => $this->title,
        ];
    }
}
