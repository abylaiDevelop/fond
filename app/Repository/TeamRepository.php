<?php

namespace App\Repository;

use App\Models\Team;
use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class TeamRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return mixed
     */
    public function store(FormRequest $request)
    {
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $team = new Team();
        $team::create([
            "first_name" => $request->first_name,
            "second_name" => $request->second_name,
            "patron_name" => $request->patron_name,
            "position" => $request->position,
            "whatsapp" => $request->whatsapp,
            "telegram" => $request->telegram,
            "phone" => $request->phone,
            "img_path" => "images/upload/".$imageName
        ]);
        return $team;
    }

    /**
     * @param FormRequest $request
     * @param Model $model
     * @return mixed
     */
    public function update(FormRequest $request, Model $model)
    {
        $service = new ImageUploadService();
        $imageName = $service->upload($request);
        $model->update([
           "first_name" => $request->first_name,
           "second_name" => $request->second_name,
           "patron_name" => $request->patron_name,
           "position" => $request->position,
           "whatsapp" => $request->whatsapp,
           "telegram" => $request->telegram,
           "phone" => $request->phone,
           "img_path" => "images/upload/".$imageName,
        ]);
        return $model;
    }
}
