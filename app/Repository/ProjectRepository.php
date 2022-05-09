<?php

namespace App\Repository;

use App\Models\Project;
use App\Services\ImageUploadService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository implements Repository
{
    /**
     * Stores a new project from request
     * @return Project
     */
    public function store(FormRequest $request)
    {
        $project = new Project();
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $project::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => $imageName != "" ? 'images/upload/'.$imageName : ""
        ]);
        return $project;
    }

    /**
     * Update the specified resource in storage.
     * @return Model
     */
    public function update(FormRequest $request, Model $model)
    {
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $model->update([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => $imageName != "" ? 'images/upload/'.$imageName : ""
        ]);
        return $model;
    }
}
