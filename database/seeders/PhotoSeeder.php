<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PhotoSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = Album::all()->keyBy('reference_id');
        Photo::truncate();
        $data = \json_decode(
            file_get_contents(__DIR__.'/data/photos.json'),
            true
        );

        $rows = [];

        $id = 1;
        foreach ($data as $photo) {
            $id = $id > 1000 ? 1 : $id;

            $rows[] = [
                'id'         => Uuid::uuid4(),
                'title'      => $photo['title'],
                'album_id'   => $albums->get($photo['albumId'])->id,
                'url'        => "https://picsum.photos/id/$id/600/600",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $id++;
        }

        Photo::insert($rows);
    }
}
