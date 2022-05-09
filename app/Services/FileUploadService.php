<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;

abstract class FileUploadService
{
    abstract public function upload(FormRequest $request);
}
