<?php

namespace App\Providers;

use App\Http\Resources\AlbumResource;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        UserResource::withoutWrapping();
//        AlbumResource::withoutWrapping();
//        PhotoResource::withoutWrapping();
    }
}
