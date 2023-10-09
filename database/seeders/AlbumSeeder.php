<?php

namespace Database\Seeders;

use App\Models\Album;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AlbumSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::truncate();
        $data = \json_decode(
            file_get_contents(__DIR__.'/data/albums.json'),
            true
        );

        $rows = [];

        foreach ($data as $album) {
            $rows[] = [
                'id'           => Uuid::uuid4(),
                'title'        => $album['title'],
                'user_id'      => $album['userId'] ?? 1,
                'reference_id' => $album['id'],
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];
        }
        Album::insert($rows);
    }
}
