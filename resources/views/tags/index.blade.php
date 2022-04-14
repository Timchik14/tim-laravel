@extends('layouts.master')
@section('title', 'Статьи')
@section('content')
    <div class="col-md-8 blog-main">

        @include('layouts.modal')

        <h3 class="pb-3 mb-4 font-italic border-bottom">
                Articles
        </h3>

        @foreach($articles as $article)
            @include('articles.article')
        @endforeach

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            News
        </h3>

        @foreach($tidings as $tiding)
            @include('tidings.tiding')
        @endforeach

    </div>
@endsection
