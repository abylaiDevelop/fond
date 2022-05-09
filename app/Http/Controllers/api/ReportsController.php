<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportsRequest;
use App\Http\Requests\UpdateReportsRequest;
use App\Http\Resources\ReportResource;
use App\Models\Reports;
use App\Repository\ReportRepository;
use Illuminate\Http\Response;
use function response;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $reports = Reports::all();
        return ReportResource::collection($reports);
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store(StoreReportsRequest $request,ReportRepository $repository)
    {
        $report = $repository->store($request);
        return response([
           'report' => $report
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Reports $reports
     * @return ReportResource
     */
    public function show(Reports $reports)
    {
        return new ReportResource($reports);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReportsRequest $request
     * @param Reports $reports
     * @param ReportRepository $repository
     * @return Response
     */
    public function update(UpdateReportsRequest $request, Reports $reports, ReportRepository $repository)
    {
        $report = $repository->update($request,$reports);
        return response(['report' => $report]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $existingResport = Reports::find($id);
        if ($existingResport) {
            $existingResport->delete();
        }
        return response(['message' => 'deleted successfully']);
    }
}
