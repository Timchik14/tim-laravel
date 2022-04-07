<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MainPageController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->published()->simplePaginate(10);
        return view('index', compact('articles'));
    }
}
