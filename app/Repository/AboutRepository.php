<?php

namespace App\Repository;

use App\Models\About;
use App\Models\Common;
use App\Models\News;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class AboutRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return About
     */
    public function store(FormRequest $request): About
    {
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $about = new About();
        $about::create([
            "title" => $request->title,
            "body" => $request->body,
            "img_path" => "images/upload/".$imageName,
        ]);
        return $about;
    }

    /**
     * @param FormRequest $request
     * @param Model $model
     * @return Model
     */
    public function update(FormRequest $request, Model $model)
    {
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $model->update([
            "title" => $request->title,
            "body" => $request->body,
            "img_path" => "images/upload/".$imageName,
        ]);
        return $model;
    }
}
