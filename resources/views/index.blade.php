@extends('layouts.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Main page
        </h3>
<?php echo config('env'); ?>
        @foreach($articles as $article)
            @include('articles.article')
        @endforeach

        {{ $articles->links() }}

    </div>
@endsection
