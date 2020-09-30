<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class CreateSeriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_a_user_can_create_a_series()
    {
        $this->withoutExceptionHandling();
        Storage::fake(config('filesystems.default'));

        $this->post('admin/series/store', [
            'title' => 'vue js or the best',
            'description' => 'the best vue cats ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertRedirect();

        Storage::disk(config('filesystems.default'))->assertExists('series/' . Str::slug('vue js or the best') . '.png');

        $this->assertDatabaseHas('series', [
            'slug' => Str::slug('vue js or the best')
        ]);
    }
    public function test_only_administrators_can_createSeries()
    {

        //user

        $user = factory(User::class)->create();
        $this->actingAs($user);

        //visit

        $this->post('admin/series/store', [
            'title' => 'vue js or the best',
            'description' => 'the best vue cats ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertSessionHas('error', 'You are not authorised to peorm this action');

        //assert we are redirectd
    }
}
