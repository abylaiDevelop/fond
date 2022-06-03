<?php

namespace App\Repository;

use App\Models\Reports;
use App\Services\DocUploadService;
use App\Services\FileUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ReportRepository implements Repository
{

    /**
     * @param FormRequest $request
     * @return mixed
     */
    public function store(FormRequest $request)
    {
        $service = new DocUploadService();
        $fileName = $service->upload($request);
        $report = new Reports();
        $report::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "file" => "files/".$fileName
        ]);
        return $report;
    }

    /**
     * @param FormRequest $request
     * @param Model $model
     * @return mixed
     */
    public function update(FormRequest $request, Model $model)
    {
        $service = new DocUploadService();
        $fileName = $service->upload($request);
        $model->update([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "file" => "files/".$fileName
        ]);
        return $model;
    }
}
