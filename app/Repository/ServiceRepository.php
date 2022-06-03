<?php

namespace App\Repository;

use App\Models\Common;
use App\Models\News;
use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return Service
     */
    public function store(FormRequest $request): Service
    {
        $service = new Service();
        $imgservice = new ImageUploadService();
        $imageName = $imgservice->upload($request);
        $service::create([
            "img_path" => "images/upload/".$imageName,
            "title" => $request->title,
            "body" => $request->body,
            "about_id" => $request->about_id != null ? $request->about_id : 1,
        ]);
        return $service;
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
            "img_path" => "images/upload/".$imageName,
            "title" => $request->title,
            "body" => $request->body,
            "about_id" => $request->about_id != null ? $request->about_id : 1,
        ]);
        return $model;
    }
}
