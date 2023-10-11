<?php

namespace Tests\Feature;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PhotosControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_photos_index_endpoint()
    {
        $user = User::factory()->create();
        $album = Album::factory()->create(['user_id' => $user->id]);
        $photos = Photo::factory()->createMany(5);

        $response = $this->json('GET', '/photos');
        $response->assertSuccessful();
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('meta')
                ->has('data', 5)
                ->etc()
            );
    }
}
