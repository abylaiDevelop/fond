<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Repository\ServiceRepository;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $about = Service::all();
        return ServiceResource::collection($about);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request, ServiceRepository $repository)
    {
        $about = $repository->store($request);
        return response(["message" => "created success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return ServiceResource
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service, ServiceRepository $repository)
    {
        $service = $repository->update($request, $service);
        return response(["message" => "updated success", "item" => $service]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response(["error" => "cannot find item"], 303);
        } else {
            $service->delete();
        }
        return response(["message" => "deleted success"]);
    }
}
