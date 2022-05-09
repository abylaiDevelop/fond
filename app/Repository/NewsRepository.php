<?php

namespace App\Repository;

use App\Models\News;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class NewsRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return News
     */
    public function store(FormRequest $request): News
    {
        $news = new News();
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $news::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => "images/".$imageName
        ]);
        return $news;
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
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => $imageName != "" ? 'images/'.$imageName : ""
        ]);
        return $model;
    }
}
