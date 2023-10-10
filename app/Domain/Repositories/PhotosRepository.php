<?php

namespace App\Domain\Repositories;

use App\Models\Photo;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotosRepository
{
    public function getAll(): LengthAwarePaginator
    {
        return Photo::paginate();
    }

    public function getFavorites()
    {
        return Photo::paginate();
    }
}
