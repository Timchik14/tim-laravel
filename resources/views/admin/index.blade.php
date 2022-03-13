@extends('layouts.without_sidebar')
@section('title', 'Административный раздел')
@section('content')
    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Admin page
        </h3>

        <ul class="list-group borderless">
            <li class="list-group-item border-0"><a href="{{ route('admin.feedbacks') }}">Feedbacks</a></li>
            <li class="list-group-item border-0"><a href="{{ route('admin.articles') }}">Articles</a></li>
        </ul>
        <br>
        <br>
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div>
@endsection
