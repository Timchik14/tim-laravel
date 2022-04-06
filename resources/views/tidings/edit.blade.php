
@extends('layouts.master')
@section('title', 'Изменить новость')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Edit news
        </h3>

        @include('layouts.errors')

        <form method="post" action="{{ route('tidings.show', ['tiding' => $tiding]) }}">
            @method('PATCH')
            @include('tidings.create_edit_form')
        </form>
        <br>
        <form method="post" action="{{ route('tidings.show', ['tiding' => $tiding]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
