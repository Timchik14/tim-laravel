<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleHistory;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $newsCount = DB::table('tidings')->count();
        $articlesCount = DB::table('articles')->count();

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

        $usersForMiddle = User::withCount('articles')
            ->whereRelation('articles', 'owner_id', '!=', null)
            ->get();

        $sum = 0;
        foreach ($usersForMiddle as $user) {
            $sum += ($user->articles_count);
        }
        $middleArticles = $sum/count($usersForMiddle);

        $mostChangeableArticle = Article::withCount('history')
            ->orderByDesc('history_count')
            ->first();

        $mostDiscussableArticle = Article::withCount('comments')
            ->orderByDesc('comments_count')
            ->first();

        return view('statistics.index',compact([
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
