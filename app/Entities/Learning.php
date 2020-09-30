<?php 

namespace App\Entities;
use Illuminate\Support\Facades\Redis;
use App\Lesson;

 trait Learning{
    public function completeLesson($lesson){
        Redis::sadd("user:{$this->id}:series:{$lesson->series->id}", $lesson->id);
    }

    public function percentangeCompletedForseries($series){
        $numberOfLessonsInSeries = $series->lessons->count();
        $nummberOfCompetedLessons = $this->getNumberOfCompletedlessonsForASeries($series);

        return ($nummberOfCompetedLessons / $numberOfLessonsInSeries)* 100;
    }

    public function getNumberOfCompletedlessonsForASeries($series){
    
        return count(Redis::smembers("user:{$this->id}: series:{$series->id}"));
    }

    public function hasStartedSeries($series){

        return $this->getNumberOfCompletedlessonsForASeries($series) > 0;
    }
    public function getCompletedLessons($series){
        
        $completedLessons = $this->getNumberOfCompletedlessonsForASeries($series);

        return collect($completedLessons)->map(function($lessonId){

            return Lesson::find($lessonId);
        });
    }
 }