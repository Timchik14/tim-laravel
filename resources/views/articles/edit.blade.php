@extends('layouts.master')
@section('title', 'Изменить статью')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Edit article
        </h3>

        @include('layouts.errors')

        <form method="post" action="{{ route('articles.show', ['article' => $article]) }}">
            @method('PATCH')
            @include('articles.create_edit_form')
        </form>
        <br>
        <form method="post" action="{{ route('articles.show', ['article' => $article]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
