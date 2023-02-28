<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'details' => $this->details,
            'price' => $this->price,
            'image' => $this->image ?? "https://desklass.com/resources/a43efd70-90a2-4492-80f5-8d43ad8ee3b9",
            'lecturer' => new UserResource($this->whenLoaded('lecturer')),
            'chapters' => new ChapterCollection($this->whenLoaded('chapters')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
