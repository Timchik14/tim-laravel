<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        Gate::allowIf(fn ($user) => $user->isAdmin());
        return view('admin.index');
    }

    public function show(Article $article)
    {
        Gate::allowIf(fn ($user) => $user->isAdmin());
        return view('articles.show', compact('article'));
    }

    public function showArticles()
    {
        Gate::allowIf(fn ($user) => $user->isAdmin());
        $articles = Article::with('tags')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function showFeedbacks()
    {
        Gate::allowIf(fn ($user) => $user->isAdmin());
        $messages = Message::latest()->get();
        return view('admin.feedback', compact('messages'));
    }

    public function edit(Article $article)
    {
        Gate::allowIf(fn ($user) => $user->isAdmin());
        return view('articles.edit', compact('article'));
    }
}
