<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Resources\AboutResource;
use App\Models\About;
use App\Repository\AboutRepository;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
       $about = About::all();
       return AboutResource::collection($about);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request, AboutRepository $repository)
    {
        $about = $repository->store($request);
        return response(["message" => "created success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return AboutResource
     */
    public function show(About $about)
    {
        return new AboutResource($about);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about, AboutRepository $repository)
    {
        $about = $repository->update($request, $about);
        return response(["message" => "updated success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $about = About::find($id);
        if (!$about) {
            return response(["error" => "cannot find item"], 303);
        } else {
            $about->delete();
        }
        return response(["message" => "deleted success"]);
    }
}
