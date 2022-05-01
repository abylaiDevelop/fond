<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\News;
use http\Env\Response;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return UserResource::collection($news);
    }


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
        $imageName = "";
        $news = new News();
        if (!empty($request->img_path)) {
            $request->validate([
                'img_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->file("img_path")->extension();
            $request->file("img_path")->move(public_path('images'), $imageName);
        }
        $news::create([
            "name" => $request->name,
            "preview_text" => $request->preview_text,
            "img_path" => '/images/'.$imageName
        ]);
        return response(["message" => "created success", "news" => $request->file("img_path")]);
    }


    public function show(News $news)
    {
        return view('news.news-detail',[
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $news = News::find($id);
        $news->update($request->all());
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
