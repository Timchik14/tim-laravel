@extends('layout.master')
@section('title', 'Страница статьи')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            One article
        </h3>
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $article->name }}</h2>
            <p><a href=" {{ route('articles.edit', ['article' => $article->slug]) }}">Редактировать</a></p>
            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>
            <p>{{ $article->short_description }}</p>
            <hr>
            <p>{{ $article->long_description  }}</p>
            <hr>
            <p>{{ $article->body }}</p>
            <hr>
            <p><a href="{{ route('articles.index') }}">К статьям</a></p>

        </div>
    </div>
@endsection
