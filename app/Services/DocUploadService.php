<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;

class DocUploadService extends FileUploadService
{

    /**
     * Uploads file to the public directory files
     * @param FormRequest $request
     * @return string
     */
    public function upload(FormRequest $request)
    {
        $fileName = time().'.'.$request->file("file")->extension();
        $request->file("file")->move(public_path("files"),$fileName);
        return $fileName;
    }
}
