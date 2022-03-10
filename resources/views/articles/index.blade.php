@extends('layout.master')
@section('title', 'Главная')
@section('content')
    <div class="col-md-8 blog-main">

        @if (session('status'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = new bootstrap.Modal(document.querySelector('#modal'));
                    modal.show();
                })
            </script>
        @endif

        @include('layout.modal')

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            All articles
        </h3>

        @foreach($articles as $article)
            @include('articles.article')
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>
@endsection
