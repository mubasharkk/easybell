<?php

namespace App\Http\Controllers;

use App\Domain\Services\PhotoGalleryService;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

class PhotosController extends Controller
{

    public function displayGallery()
    {
        return Inertia::render('Photos/Gallery');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PhotoGalleryService $service, Request $request)
    {
        return $service->getPhotos(
            $request->get('favorites', false)
        );
    }

    public function markFavorites(
        string              $photoId,
        Request             $request,
        PhotoGalleryService $service
    ) {
        $photoId = Uuid::fromString($photoId);
        $service->toggleFavorites($photoId, $request->user()->id);

        return response(
            new PhotoResource($service->findPhoto($photoId))
        );
    }
}
