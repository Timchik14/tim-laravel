<?php

namespace App\Http\Controllers;

use App\Notifications\ArticleCreated;
use App\Notifications\ArticleUpdated;
use App\Notifications\ArticleDeleted;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('about', 'show');
    }

    public function index()
    {
        $articles = auth()->user()->articles()->with('tags')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create(Article $article)
    {
        return view('articles.create', compact('article'));
    }

    public function store(ArticleRequest $articleRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $articleRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);
        $validated['owner_id'] = auth()->id();

        $article = Article::create($validated);

        $tags = $articleRequest->getTags();
        $tagsSynchronizer->sync($tags, $article);

        auth()->user()->notify(new ArticleCreated($article));

        return redirect(route('articles.index'))->with('status', 'Article saved!');
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $articleRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $articleRequest->validated();
        $validated['created_at'] = (request()->get('published') === 'on' ? time() : null);

        $article->update($validated);

        $tags = $articleRequest->getTags();
        $tagsSynchronizer->sync($tags, $article);

        auth()->user()->notify(new ArticleUpdated($article));

        return redirect(route('articles.index'))->with('status', 'Article changed!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        auth()->user()->notify(new ArticleDeleted($article));

        return redirect(route('articles.index'))->with('status', 'Article deleted!');
    }
}
