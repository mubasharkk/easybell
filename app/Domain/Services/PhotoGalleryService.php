<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PhotosRepository;
use App\Http\Resources\PhotoResource;
use Ramsey\Uuid\UuidInterface;

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

    public function toggleFavorites(UuidInterface $photoId, int $userId): bool
    {
        if ($this->photosRepo->findFavorite($photoId, $userId)->exists()) {
            return $this->photosRepo->removeFavorite($photoId, $userId);
        }

        return $this->photosRepo->addFavorite($photoId, $userId);
    }

    public function findPhoto(UuidInterface $photoId)
    {
        return $this->photosRepo->find($photoId)->first();
    }
}
