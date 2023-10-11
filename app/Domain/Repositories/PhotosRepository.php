<?php

namespace App\Domain\Repositories;

use App\Models\Favorites;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\UuidInterface;

class PhotosRepository
{

    public function getAll(): LengthAwarePaginator
    {
        return Photo::orderBy('fav_count', 'desc')->paginate();
    }

    public function getFavorites(): LengthAwarePaginator
    {
        return Photo::whereRaw('fav_count > 0')
            ->orderBy('fav_count', 'DESC')
            ->paginate();
    }

    public function findFavorite(UuidInterface $photoId, int $userId): Builder
    {
        return Favorites::where([
            'photo_id' => $photoId,
            'user_id'  => $userId,
        ]);
    }

    public function addFavorite(UuidInterface $photoId, int $userId): bool
    {
        return (new Favorites([
            'photo_id' => $photoId,
            'user_id'  => $userId,
        ]))->save();
    }

    public function removeFavorite(UuidInterface $photoId, int $userId): bool
    {
        Photo::find($photoId)->decrement('fav_count'); // need to fix this in observer
        return $this->findFavorite($photoId, $userId)->delete();
    }

    public function find(UuidInterface $photoId)
    {
        return Photo::find($photoId);
    }
}
