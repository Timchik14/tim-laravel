@extends('layouts.without_sidebar')
@section('title', 'Статистика')
@section('content')
    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Reports
        </h3>
        <p><a href="{{ route('reports.total') }}">Итого</a></p>
    </div>
@endsection
