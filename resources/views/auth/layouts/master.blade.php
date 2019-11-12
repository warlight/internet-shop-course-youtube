<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ksSuYKnA4EytAfis4gZ1z98TxO8rZRWX5zGgktba">

    <title>Админка: @yield('title')</title>

    <!-- Scripts -->
    <script src="http://laravel-diplom-1.rdavydov.ru/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://laravel-diplom-1.rdavydov.ru/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="http://laravel-diplom-1.rdavydov.ru">
                Вернуться на сайт
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li ><a
                            href="http://laravel-diplom-1.rdavydov.ru/admin/categories">Категории</a></li>
                    <li ><a href="http://laravel-diplom-1.rdavydov.ru/admin/products">Товары</a>
                    </li>
                    <li ><a href="http://laravel-diplom-1.rdavydov.ru/admin/orders">Заказы</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">@yield('title')</div>

                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
