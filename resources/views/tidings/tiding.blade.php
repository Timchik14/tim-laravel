<div class="blog-post">
    <a href="{{ route('tidings.show', ['tiding' => $tiding]) }}">
        <h2 class="blog-post-title">{{ $tiding->name }}</h2>
    </a>
    <p class="blog-post-meta">{{ $tiding->created_at ? $tiding->created_at->toFormattedDateString() : 'Not published' }}</p>

    @include('articles.tags', ['tags' => $tiding->tags])

    <hr>
    <p>{{ $tiding->short_description }}</p>
    <hr>
</div>
