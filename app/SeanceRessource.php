<?php
/**
 *
 */
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\User as UserResource;

class Posts extends Resource
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
            'slug' => $this->slug,
            'bodys' => $this->body,
            'users' => UserResource::collection($this->user),
            'published' => $this->published,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}

?>