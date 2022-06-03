<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadService extends FileUploadService
{
    /**
     * Upload an image to the public folder images
     *
     * @param FormRequest $request
     * @return string
     */
    public function upload(FormRequest $request) : string
    {
        $imageName = time().'.'.$request->file("img_path")->extension();
        $request->file("img_path")->move(public_path('images/upload'), $imageName);
        return $imageName;
    }

}
