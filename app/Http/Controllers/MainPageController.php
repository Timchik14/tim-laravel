<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MainPageController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->published()->get();

        return view('index', compact('articles'));
    }
}
