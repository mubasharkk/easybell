<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PhotosRepository;
use App\Http\Resources\PhotoResource;
use Ramsey\Uuid\Uuid;

class PhotoGalleryService
{

    public function __construct(private PhotosRepository $photosRepo)
    {
    }

    public function getPhotos(bool $onlyFavorites = false)
    {
        $photos = $onlyFavorites
            ? $this->photosRepo->getFavorites()
            : $this->photosRepo->getAll();

        return PhotoResource::collection($photos);
    }

    public function toggleFavorites(Uuid $photoId, int $userId): bool
    {
        if ($this->photosRepo->findFavorite($photoId, $userId)->exists()) {
            return $this->photosRepo->removeFavorite($photoId, $userId);
        }

        return $this->photosRepo->addFavorite($photoId, $userId);
    }
}
