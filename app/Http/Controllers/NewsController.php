<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;


class NewsController extends Controller
{

    public function index()
    {
        return view("index",[
            'news' => News::latest()->simplePaginate(6)->withQueryString(),
            'projects' => Project::latest()->simplePaginate(6)->withQueryString(),
            'reports' => Reports::latest()->simplePaginate(3)->withQueryString(),
        ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Models\News
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->name = $request->get("name");
        $news->preview_text = $request->get("preview_text");
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->get("image")->extension();
        $request->get("image")->move(public_path('images'), $imageName);
        $news->image_path = 'public/images'.$imageName;
        $news->save();
        return $news;
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
     * @param  \Illuminate\Http\Requests $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->update($request->all());
        return response(['message'=>'updated successfully']);
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

    public function admin()
    {
        return view('admin.index');
    }

    public function about() {
        return view('about');
    }
}
