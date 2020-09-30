<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $with = ['lessons'];

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function getImagePathAttribute(){
        return asset('/'.$this->image_url);
    }
}
