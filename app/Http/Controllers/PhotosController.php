<?php

namespace App\Http\Controllers;

use App\Domain\Services\PhotoGalleryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $service->toggleFavorites(
            Uuid::fromString($photoId),
            1
        );

        return response(Response::HTTP_OK);
    }
}
