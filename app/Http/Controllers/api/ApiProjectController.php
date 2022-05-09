<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserResource;
use App\Models\Project;
use App\Repository\ProjectRepository;

class ApiProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return UserResource::collection($project);
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request, ProjectRepository $repository)
    {
        $project = $repository->store($request);
        return response(["message" => "created success", "project" => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, ProjectRepository $repository, Project $project)
    {
        $project = $repository->update($request, $project);
        return response(['message'=>'updated successfully', "project" => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingProject = Project::find($id);
        if ($existingProject) {
            $existingProject->delete();
            return response(['message' => 'Deleted']);
        }
        return response(['message'=> 'Project not found']);
    }
}
