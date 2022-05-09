<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportsRequest;
use App\Http\Requests\UpdateReportsRequest;
use App\Http\Resources\ReportResource;
use App\Models\Reports;
use App\Repository\ReportRepository;
use function response;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Reports::all();
        return response(['reports' => $reports]);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Reports  $reports
     * @return ReportResource
     */
    public function show(Reports $reports)
    {
        return new ReportResource($reports);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateReportsRequest $request
     * @param \App\Models\Reports $reports
     * @param ReportRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportsRequest $request, Reports $reports, ReportRepository $repository)
    {
        $report = $repository->update($request,$reports);
        return response(['report' => $report]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $reports)
    {
        $reports->delete();
        return response(['message' => 'deleted successfully']);
    }
}
