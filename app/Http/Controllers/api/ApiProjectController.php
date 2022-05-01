<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\UserResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return UserResource::collection($project);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $imageName = "";
        if (!empty($request->img_path)) {
            $request->validate([
                'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->file("img_path")->extension();
            $request->file("img_path")->move(public_path('images'), $imageName);
        }
        $project::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => $imageName != "" ? '/images/'.$imageName : ""
        ]);
        return response(["message" => "created success", "project" => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $imageName = "";
        if (!empty($request->img_path)) {
            $request->validate([
                'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->file("img_path")->extension();
            $request->file("img_path")->move(public_path('images'), $imageName);
        }
        $project->update([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => $imageName != "" ? 'images/'.$imageName : ""
        ]);
        return response(['message'=>'updated successfully', "news" => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existinProject = Project::find($id);
        if ($existinProject) {
            $existinProject->delete();
            return response(['message' => 'Deleted']);
        }
        return response(['message'=> 'Project not found']);
    }
}
