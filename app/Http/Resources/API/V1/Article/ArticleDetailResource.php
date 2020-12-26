<?php

namespace App\Http\Resources\API\V1\Article;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'categories' => $this->category,
            'headline_image' => asset(articleUrl($this->headline_photo)),
            'content' => $this->content,
            'created_at' => date("Y-m-d H:i:s", strtotime($this->created_at))
        ];
    }
}
