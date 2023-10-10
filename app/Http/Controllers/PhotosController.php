<?php

namespace App\Http\Controllers;

use App\Domain\Services\PhotoGalleryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        return $service->getPhotos();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
