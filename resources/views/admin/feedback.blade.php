@extends('layouts.master')
@section('title', 'Административный раздел')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Feedbacks
        </h3>
        @foreach($messages as $message)
            <div class="blog-post">
                <div>{{ $message->email }}</div>
                <p class="blog-post-meta">{{ $message->created_at->toFormattedDateString() }}</p>
                <hr>
                <p>{{ $message->message }}</p>
                <hr>
            </div>
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>

@endsection
