<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Redis;
use PHPUnit\Framework\TestCase;
use App\Lesson;
use App\Series;
use App\User;

class UserTest extends TestCase
{
    public function test_a_user_can_complete_a_lesson()
    {

        $user = factory(User::class)->create();

        //series
        $series = factory(Series::class)->create();

        $lesson = factory(Lesson::class)->create([
            'series_id' => $series->id
        ]);


        $user->completeLesson($lesson);


        $this->assertEquals(
            Redis::smembers('user:1:series:1'),
            [1]
        );
    }
}
