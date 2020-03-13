<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::latest()->with('publisher', 'category')->paginate(12);

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', News::class);

        $categories = Category::orderBy('title')->get();

        return view('news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(News $news)
    {
        $news->load('publisher', 'category');

        return view('news.show')->with(['newsItem' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News         $news
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
    }
}
