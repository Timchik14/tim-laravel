<form method="post" action="{{ route('comments') }}">

    @csrf

    <div class="mb-3">
        <textarea type="text" class="form-control" id="text" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Комментировать</button>
</form>
