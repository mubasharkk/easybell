<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{

    use HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'album_id',
        'fav_count'
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
