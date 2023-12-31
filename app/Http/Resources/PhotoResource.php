<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'url'        => $this->url,
            'album'      => new AlbumResource($this->album),
            'fav_count'  => $this->fav_count,
            'created_at' => $this->created_at,
            'is_fav'     => $request->user()
                ? $this->favoritesByUsers()
                    ->where('user_id', $request->user()->id)
                    ->exists()
                : false,
        ];
    }
}
