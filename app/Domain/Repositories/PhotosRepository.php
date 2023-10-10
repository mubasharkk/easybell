<?php

namespace App\Domain\Repositories;

use App\Models\Favorites;
use App\Models\Photo;
use Illuminate\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

class PhotosRepository
{

    public function getAll(): LengthAwarePaginator
    {
        return Photo::orderBy('created_at', 'desc')->paginate();
    }

    public function getFavorites(): LengthAwarePaginator
    {
        return Photo::whereRaw('fav_count > 0')
            ->orderBy('fav_count', 'DESC')
            ->paginate();
    }

    public function findFavorite(Uuid $photoId, int $userId): Favorites
    {
        return Favorites::where([
            'photo_id' => $photoId,
            'user_id'  => $userId,
        ]);
    }

    public function addFavorite(Uuid $photoId, int $userId): bool
    {
        return (new Favorites([
            'photo_id' => $photoId,
            'user_id'  => $userId,
        ]))->save();
    }

    public function removeFavorite(Uuid $photoId, int $userId): bool
    {
        return $this->findFavorite($photoId, $userId)->delete();
    }
}
