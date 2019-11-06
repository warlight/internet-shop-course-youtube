@extends('master')

@section('title', 'Корзина')

@section('content')
    <div class="starter-template">
        <h1>Корзина</h1>
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge">1</span>
                            <div class="btn-group">
                                <a type="button" class="btn btn-danger"
                                   href="http://laravel-diplom-1.rdavydov.ru/basket/1/remove"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                <form action="{{ route('basket-add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                       href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} руб.</td>
                        <td>{{ $product->price }} руб.</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>71990 руб.</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/place">Оформить
                    заказ</a>
            </div>
        </div>
    </div>
@endsection
