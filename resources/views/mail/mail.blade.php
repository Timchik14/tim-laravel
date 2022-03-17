<!doctype html>
<html lang="en">
<head>
    <title>
    </title>
</head>
<body>
<h3>New articles</h3>
    @foreach($articles as $article)
        @include('mail.article')
    @endforeach

</body>
</html>
