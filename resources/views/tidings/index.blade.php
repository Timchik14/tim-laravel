@extends('layouts.master')
@section('title', 'Новости')
@section('content')
    <div class="col-md-8 blog-main">

        @include('layouts.modal')

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            All news
        </h3>

        @foreach($tidings as $tiding)
            @include('tidings.tiding')
        @endforeach

        {{ $tidings->links() }}

    </div>
@endsection
