<?php

namespace App\Repository;

use App\Models\Common;
use App\Models\News;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class CommonRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return Common
     */
    public function store(FormRequest $request): Common
    {
        $common = new Common();
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $common::create([
            "logo" => "images/upload/".$imageName,
            "email" => $request->email,
            "phone" => $request->phone
        ]);
        return $common;
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
            "logo" => "images/upload/".$imageName,
            "email" => $request->email,
            "phone" => $request->phone
        ]);
        return $model;
    }
}
