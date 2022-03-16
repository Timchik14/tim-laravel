@extends('layouts.master')
@section('title', 'Страница статьи')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            One article
        </h3>
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $article->name }}</h2>

                @admin
                    <p><a href=" {{ route('admin.edit', ['article' => $article]) }}">Редактировать</a></p>
                @endadmin
                @notadmin
                    @can('update', $article)
                        <p><a href=" {{ route('articles.edit', ['article' => $article]) }}">Редактировать</a></p>
                    @endcan
                @endnotadmin

            <p class="blog-post-meta">{{ $article->created_at ? $article->created_at->toFormattedDateString() : '' }}</p>
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
