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
                @else
                    @can('update', $article)
                        <p><a href=" {{ route('articles.edit', ['article' => $article]) }}">Редактировать</a></p>
                    @endcan
                @endadmin

            <p class="blog-post-meta">{{ $article->created_at ? $article->created_at->toFormattedDateString() : '' }}</p>
            <p>{{ $article->short_description }}</p>
            <hr>
            <p>{{ $article->long_description  }}</p>
            <hr>
            <p>{{ $article->body }}</p>
            <hr>

            @forelse($article->history as $item)
                <p>{{$item->email}} <b>changed field(s):</b> {{$item->pivot->changes}} <b>at</b> {{$item->pivot->created_at}}</p>
            @empty
                <p>No changes</p>
            @endforelse

            <hr>

            <p>Комментарии</p>
            @auth()
                @include('layouts.errors')
                @include('comments.create')
            @endauth
            <br>
            @foreach($article->comments as $comment)
                @include('comments.comment')
            @endforeach
            <hr>
            <p><a href="{{ route('articles.index') }}">К статьям</a></p>

        </div>
    </div>
@endsection
