@extends('layouts.master')
@section('title', 'Страница новости')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            One news
        </h3>
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $tiding->name }}</h2>

                @admin
                    <p><a href=" {{ route('admin.tiding.edit', ['tiding' => $tiding]) }}">Редактировать</a></p>
                @else
                    @can('update', $tiding)
                        <p><a href=" {{ route('tidings.edit', ['tiding' => $tiding]) }}">Редактировать</a></p>
                    @endcan
                @endadmin

            <p class="blog-post-meta">{{ $tiding->created_at ? $tiding->created_at->toFormattedDateString() : '' }}</p>
            <p>{{ $tiding->short_description }}</p>
            <hr>
            <p>{{ $tiding->long_description  }}</p>
            <hr>
            <p>{{ $tiding->body }}</p>
            <hr>
                <p>Комментарии</p>
                @auth()
                    @include('layouts.errors')
                    @include('tidings.comment-create')
                @endauth
                <br>
                @foreach($tiding->comments as $comment)
                    @include('comments.comment')
                @endforeach
            <hr>
        </div>
    </div>
@endsection
