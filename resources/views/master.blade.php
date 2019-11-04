<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li  class="active" ><a href="{{ route('index') }}">Все товары</a></li>
                <li ><a href="{{ route('categories') }}">Категории</a>
                </li>
                <li ><a href="{{ route('basket') }}">В корзину</a></li>
                <li><a href="{{ route('index') }}">Сбросить проект в начальное состояние</a></li>
            </ul>

{{--            <ul class="nav navbar-nav navbar-right">--}}
{{--                <li><a href="http://laravel-diplom-1.rdavydov.ru/admin/home">Панель администратора</a></li>--}}
{{--            </ul>--}}
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
