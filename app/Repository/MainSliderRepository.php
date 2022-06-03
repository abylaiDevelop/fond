<?php

namespace App\Repository;

use App\Models\Common;
use App\Models\MainSlider;
use App\Models\News;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class MainSliderRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return MainSlider
     */
    public function store(FormRequest $request): MainSlider
    {
        $slider = new MainSlider();
        $slider::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "youtube" => $request->youtube,
            "instagram" => $request->instagram,
            "facebook" => $request->facebook,
        ]);
        return $slider;
    }

    /**
     * @param FormRequest $request
     * @param Model $model
     * @return Model
     */
    public function update(FormRequest $request, Model $model)
    {
        $model->update([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "youtube" => $request->youtube,
            "instagram" => $request->instagram,
            "facebook" => $request->facebook,
        ]);
        return $model;
    }
}
