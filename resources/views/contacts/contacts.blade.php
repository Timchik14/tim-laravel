@extends('layouts.master')
@section('title', 'Контакты')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Contacts
        </h3>

        @include('layouts.errors')

        <form method="post" action="{{ route('contacts') }}">

            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Текст сообщения</label>
                <input type="text" class="form-control" id="message" name="message">
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
