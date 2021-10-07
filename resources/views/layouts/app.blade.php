<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('inc.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            @yield('search')
        </div>
    </div>
</div>

<div class="container mt-5">
    @include('inc.messages')
</div>

@if(Request::is('/'))
    @include('info')
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            @yield('content')
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            @yield('contact')
        </div>
    </div>
</div>

@include('inc.footer')



</body>
</html>
