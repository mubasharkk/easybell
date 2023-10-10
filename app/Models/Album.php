<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    use HasFactory;

    protected $keyType = 'string';

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
