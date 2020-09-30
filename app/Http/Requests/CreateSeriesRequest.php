<?php

namespace App\Http\Requests;

use App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Series;

class CreateSeriesRequest extends SeriesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }


    public  function storeSeries()
    {
        $series = Series::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'image_url' => 'series/' . $this->fileName
        ]);

        session()->flash('success', 'Series created successfully.');
        return redirect()->route('series.show', $series->slug);
    }
}
