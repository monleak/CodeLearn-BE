<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "thumbnail" => $this->thumbnail,
            "status" => $this->status,
            "type" => $this->type,
            "content" => $this->content,
            "duration" => $this->duration,
            "order" => $this->order,

            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
