<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommonRequest;
use App\Http\Resources\CommonResource;
use App\Models\Common;
use App\Repository\CommonRepository;

class CommonController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $commons = Common::all();
        return CommonResource::collection($commons);
    }

    public function store(StoreCommonRequest $request,CommonRepository $repository)
    {
        $common = $repository->store($request);
        return response(["message" => "created success", "common" => $common]);
    }

    public function show(Common $common)
    {
        return new CommonResource($common);
    }

    public function update(StoreCommonRequest $request,CommonRepository $repository, Common $common)
    {
        $common = $repository->update($request,$common);
        return response(["message" => "updated success", "common" => $common]);
    }

    public function destroy(int $id)
    {
        $common = Common::find($id);
        if (!$common) {
            return response(["error" => "can not find model"],303);
        } else {
            $common->delete();
        }
        return response(["message" => "deleted"]);

    }
}
