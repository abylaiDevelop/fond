<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Repository\TeamRepository;
use Illuminate\Http\Request;

class ApiTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $team = Team::all();
        return TeamResource::collection($team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request, TeamRepository $repository)
    {
        $team = $repository->store($request);
        return response(["message" => "created succes", "team" => $team]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Team $team
     * @return TeamResource
     */
    public function show(Team $team)
    {
        return new TeamResource($team);
    }


    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team, TeamRepository $repository)
    {
        $team = $repository->update($request,$team);
        return response(["message"=>"updated success", "team" => $team]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTeam = Team::find($id);
        if (!$existingTeam){
            return response(["error"=>"Team not found"],303);
        } else {
            $existingTeam->delete();
            return response(["message" => "deleted successfully"]);
        }
    }
}
