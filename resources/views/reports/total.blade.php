@extends('layouts.without_sidebar')
@section('title', 'Статистика')
@section('content')

    <div class="col-md-8 blog-main">

        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Total
        </h3>
        @include('layouts.errors')
        <form method="get" action="{{ route('reports.send') }}">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="news" id="news" name="requested[]">
                <label class="form-check-label" for="news">
                    News
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="articles" id="articles" name="requested[]">
                <label class="form-check-label" for="articles">
                    Articles
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="comments" id="comments" name="requested[]">
                <label class="form-check-label" for="comments">
                    Comments
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="tags" id="tags" name="requested[]">
                <label class="form-check-label" for="tags">
                    Tags
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="users" id="users" name="requested[]">
                <label class="form-check-label" for="users">
                    Users
                </label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Generate report</button>
            <br>
            <br>
        </form>
    </div>
@endsection
