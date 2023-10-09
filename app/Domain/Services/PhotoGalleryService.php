<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PhotosRepository;
use App\Http\Resources\PhotoResource;

class PhotoGalleryService
{

    public function __construct(private PhotosRepository $photosRepo)
    {
    }

    public function getPhotos(int $limit = 15, bool $onlyFavorites = false)
    {
        $photos = $this->photosRepo->getList($limit);
        return PhotoResource::collection($photos);
    }
}
