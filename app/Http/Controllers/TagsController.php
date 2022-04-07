<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index (Tag $tag)
    {
        $tidings = $tag->tidings()->with('tags')->get();
        $articles = $tag->articles()->with('tags')->get();
        return view('tags.index', compact(['articles', 'tidings']));
    }
}
