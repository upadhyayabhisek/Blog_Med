<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'post_id'=>$this->id,
            'post_title'=>$this->title,
            'post_category_id'=>$this->category_id,
            'post_published_date'=>$this->created_at->format('Y-m-d'),
            'post_slug'=>$this->slug,
            'image'=>$this->image,
            'likes'=>LikeResource::collection($this->likes)
        ];
    }
}
