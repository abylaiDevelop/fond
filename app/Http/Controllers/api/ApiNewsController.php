<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\UserResource;
use App\Models\News;
use App\Repository\NewsRepository;

class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return UserResource::collection($news);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request, NewsRepository $repository)
    {
        $news = $repository->store($request);
        return response(["message" => "created success", "news" => $news]);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request,NewsRepository $repository, News $news)
    {
        $news = $repository->update($request,$news);
        return response(['message'=>'updated successfully', "news" => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = News::find($id);
        if ($existingItem) {
            $existingItem->delete();
            return response(['message' => 'Deleted']);
        }
        return response(['message' => 'item not found']);
    }

}
