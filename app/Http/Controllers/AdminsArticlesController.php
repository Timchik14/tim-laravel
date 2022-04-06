<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AdminsArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function showArticles()
    {
        $articles = Article::with('tags')->latest()->simplePaginate(20);
        return view('articles.index', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
}
