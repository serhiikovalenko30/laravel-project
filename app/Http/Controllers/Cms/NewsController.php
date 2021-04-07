<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('cms.news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $categories->prepend('-- Выберите категорию --', null);
        $tags = Tag::pluck('name', 'id');
        return view('cms.news.edit')->with('categories', $categories)->with('tags', $tags);;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:news|max:255',
            'content' => 'required',
        ]);

        $news = new News;
        $news->title = $request->title;
        $news->slug = Str::slug($news->title);
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->seen =  $request->input('seen', 0);
        $news->active = $request->input('active', 0);
        $news->seo_title = $request->seo_title;
        $news->seo_key = $request->seo_key;
        $news->seo_desc = $request->seo_desc;

        $news->save();
        $news->tags()->sync($request->input('tag_list'), false);
        $news->category()->sync($request->input('category_list'), false);

        return redirect()->route('news.show', $news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('cms.news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        $categories = Category::pluck('name', 'id');
        $categories->prepend('-- Выберите категорию --', null);
        $tags = Tag::pluck('name', 'id');
        return view('cms.news.edit')->with('news', $news)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
//            'content' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = Str::slug($news->title);
        $news->summary = $request->summary;
        $news->content = $request->content;
        $news->seen =  $request->input('seen', 0);
        $news->active = $request->input('active', 0);
        $news->seo_title = $request->seo_title;
        $news->seo_key = $request->seo_key;
        $news->seo_desc = $request->seo_desc;

        $news->save();
        $news->tags()->sync($request->input('tag_list'), false);
        $news->category()->sync($request->input('category_list'), false);

        return redirect()->route('news.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index');
    }
}
