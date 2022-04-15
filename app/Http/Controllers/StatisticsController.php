<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tiding;
use App\Models\User;

class StatisticsController extends Controller
{
    public function index()
    {
        $newsCount = Tiding::all()->count();

        $articlesCount = Article::all()->count();

        $mostActiveAuthor = User::withCount('articles')
            ->orderByDesc('articles_count')
            ->first();

        $articles = Article::all();

        $longestArticle = $articles->sortByDesc(function ($article) {
            return strlen($article['body']);
        })->first();

        $shortestArticle = $articles->sortBy(function ($article) {
            return strlen($article['body']);
        })->first();

        $middleArticles = User::withCount('articles')
            ->whereRelation('articles', 'owner_id', '!=', null)
            ->get()
            ->avg('articles_count');

        $mostChangeableArticle = Article::withCount('history')
            ->orderByDesc('history_count')
            ->first();

        $mostDiscussableArticle = Article::withCount('comments')
            ->orderByDesc('comments_count')
            ->first();

        return view('statistics.index', compact([
            'articlesCount',
            'newsCount',
            'longestArticle',
            'shortestArticle',
            'middleArticles',
            'mostChangeableArticle',
            'mostDiscussableArticle',
            'mostActiveAuthor',
            ]));
    }
}
