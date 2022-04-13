@extends('layouts.master')
@section('title', 'Статистика')
@section('content')
    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Statistics
        </h3>
        <div class="blog-post">
            <p>Всего статей - {{ $articlesCount }}</p>
            <hr>
            <p>Всего новостей - {{ $newsCount }}</p>
            <hr>
            <p>Пользователь, у которго больше всего статей - {{ $mostActiveAuthor->name }}</p>
            <hr>
            <p>Самая длинная статья -
                <a href="{{ route('articles.index') . '/' . $longestArticle->slug }}">{{ $longestArticle->name }}</a>
            </p>
            <p>Длина статьи - {{ strlen($longestArticle->body) }} </p>
            <p> </p>
            <hr>
            <p>Самая короткая статья -
                <a href="{{ route('articles.index') . '/' . $shortestArticle->slug }}">
                    {{ $shortestArticle->name }}
                </a>
            </p>
            <p>Длина статьи - {{ strlen($shortestArticle->body) }} </p>
            <p> </p>
            <hr>
            <p>Средние количество статей у активных пользователей - {{ $middleArticles }}</p>
            <hr>
            <p>Самая непостоянная статья -
                <a href="{{ route('articles.index') . '/' . $mostChangeableArticle->slug }}">
                    {{ $mostChangeableArticle->name }}
                </a>
            </p>
            <hr>
            <p>Самая обсуждаемая статья -
                <a href="{{ route('articles.index') . '/' . $mostDiscussableArticle->slug }}">
                    {{ $mostDiscussableArticle->name }}
                </a>
            </p>
        </div>
    </div>
@endsection
