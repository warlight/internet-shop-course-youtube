
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Интернет Магазин</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://laravel-diplom-1.rdavydov.ru">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="http://laravel-diplom-1.rdavydov.ru">Все товары</a></li>
                <li  class="active" ><a href="http://laravel-diplom-1.rdavydov.ru/categories">Категории</a>
                </li>
                <li ><a href="http://laravel-diplom-1.rdavydov.ru/basket">В корзину</a></li>
                <li><a href="http://laravel-diplom-1.rdavydov.ru/reset">Сбросить проект в начальное состояние</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://laravel-diplom-1.rdavydov.ru/admin/home">Панель администратора</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="starter-template">
        <div class="panel">
            <a href="/mobiles">
                <img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/mobile.jpg">
                <h2>Мобильные телефоны</h2>
            </a>
            <p>
                В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!
            </p>
        </div>
        <div class="panel">
            <a href="/portable">
                <img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/portable.jpg">
                <h2>Портативная техника</h2>
            </a>
            <p>
                Раздел с портативной техникой.
            </p>
        </div>
        <div class="panel">
            <a href="/appliances">
                <img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/appliance.jpg">
                <h2>Бытовая техника</h2>
            </a>
            <p>
                Раздел с бытовой техникой
            </p>
        </div>
    </div>
</div>
</body>
</html>
