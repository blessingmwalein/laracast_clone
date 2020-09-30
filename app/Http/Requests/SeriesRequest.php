<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SeriesRequest extends FormRequest
{

    public function uploadSeriesImage()
    {

        $uploadedImage = $this->image;
        $this->fileName =
            Str::slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('series', $this->fileName);

        return $this;
    }
}
