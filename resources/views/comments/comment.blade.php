<div class="mb-3">
    <p><b>{{ $comment->user->email}}</b></p>
    <p class="blog-post-meta">{{$comment->created_at}}</p>
    <p>{{$comment->text}}</p>
    <hr>
</div>
