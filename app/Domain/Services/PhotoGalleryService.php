<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PhotosRepository;
use App\Http\Resources\PhotoResource;

class PhotoGalleryService
{

    public function __construct(private PhotosRepository $photosRepo)
    {
    }

    public function getPhotos(bool $onlyFavorites = false)
    {
        return PhotoResource::collection(
            $this->photosRepo->getAll()
        );
    }
}
