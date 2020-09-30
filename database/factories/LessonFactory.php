<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(3),
        'series_id' => function () {
            return factory(\App\Series::class)->create()->id;
        },
        'episode_number' => 100,
        'vedio_id' => "pVUAVmu8YuI"
    ];
});
