<?php

namespace App\Domain\Repositories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Collection;

class PhotosRepository
{
    public function getList(int $limit, int $page = 1): Collection
    {
        return Photo::limit($limit)->get();
    }
}
