<?php

namespace App\Observers;

use App\Models\Favorites;
use App\Models\Photo;

class FavoritesObserver
{

    /**
     * Handle the Favorites "created" event.
     */
    public function created(Favorites $favorites): void
    {
        Photo::where('id', $favorites->photo_id)->increment('fav_count');
    }

    /**
     * Handle the Favorites "deleted" event.
     */
    public function deleted(Favorites $favorites): void
    {
        Photo::where('id', $favorites->photo_id)->decrement('fav_count');
    }
}
