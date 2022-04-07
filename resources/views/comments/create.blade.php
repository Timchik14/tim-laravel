<form method="post" action="{{ route('article.comments', ['article' => $article]) }}">

    @csrf

    <div class="mb-3">
        <textarea type="text" class="form-control" id="text" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Комментировать</button>
</form>
