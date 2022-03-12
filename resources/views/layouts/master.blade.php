<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')
    </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/blog/">

    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.1/examples/blog/blog.css" rel="stylesheet">
</head>

<body>

    @include('layouts.nav')

    <main role="main" class="container">

        <div class="row">

            @yield('content')

            @section('sidebar')
                @include('layouts.sidebar')
            @show

        </div>

    </main>

@include('layouts.footer')

</body>
</html>
