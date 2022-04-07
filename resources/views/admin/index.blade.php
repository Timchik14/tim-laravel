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
            <li class="list-group-item border-0"><a href="{{ route('admin.tidings') }}">News</a></li>
            <li class="list-group-item border-0"><a href="{{ route('tidings.create') }}">Create news</a></li>
        </ul>
        <br>
        <br>

    </div>
@endsection
