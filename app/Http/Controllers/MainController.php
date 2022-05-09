<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\MainSlider;
use App\Models\Reports;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;


class MainController extends Controller
{

    public function index()
    {
        return view("index",[
            'news' => News::latest()->simplePaginate(6)->withQueryString(),
            'projects' => Project::latest()->simplePaginate(6)->withQueryString(),
            'reports' => Reports::latest()->simplePaginate(3)->withQueryString(),
            'slider' => MainSlider::latest()->simplePaginate(3)->withQueryString(),
            'common' => Common::find(1),
        ]);
    }

    public function show(News $news)
    {
        return view('news.news-detail',[
            'news' => $news
        ]);
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

    public function admin()
    {
        return view('admin.index');
    }

    public function about() {
        return view('about', [
            'common' => Common::find(1),
            'teams' => Team::latest()->simplePaginate(3)->withQueryString(),
        ]);
    }
}
