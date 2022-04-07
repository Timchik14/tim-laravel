@extends('layouts.master')
@section('title', 'Создать статью')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Create news
        </h3>

        @include('layouts.errors')

        <form method="post" action="{{ route('tidings.store') }}">
            @include('tidings.create_edit_form')
        </form>
    </div>
@endsection

