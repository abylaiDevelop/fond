<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMainSliderRequest;
use App\Http\Requests\UpdateMainSliderRequest;
use App\Http\Resources\MainSliderResource;
use App\Models\MainSlider;
use App\Repository\MainSliderRepository;
use Illuminate\Http\Request;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $slider = MainSlider::all();
        return MainSliderResource::collection($slider);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainSliderRequest $request, MainSliderRepository $repository)
    {
        $slider = $repository->store($request);
        return response(["message" => "created success", "slider" => $slider]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return MainSliderResource
     */
    public function show(MainSlider $mainSlider)
    {
        return new MainSliderResource($mainSlider);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainSliderRequest $request, MainSlider $mainSlider, MainSliderRepository $repository)
    {
        $mainSlider = $repository->update($request, $mainSlider);
        return response(['message'=>'updated successfully', "project" => $mainSlider]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id )
    {
        $slider = MainSlider::find($id);
        if ($slider) {
            $slider->delete();
            return response(['message' => 'Deleted']);
        }
        return response(['message'=> 'Project not found']);
    }
}
