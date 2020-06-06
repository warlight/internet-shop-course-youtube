@extends('auth.layouts.master')

@section('title', 'Купон ' . $coupon->code)

@section('content')
    <div class="col-md-12">
        <h1>{{ $coupon->code }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $coupon->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $coupon->code }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $coupon->description }}</td>
            </tr>
            <tr>
                <td>Валюта</td>
                <td>{{ $coupon->currency->code }}</td>
            </tr>
            <tr>
                <td>Абсолютное значенин</td>
                <td>@if($coupon->isAbsolute()) Да @else Нет @endif</td>
            </tr>
            <tr>
                <td>Использовать один раз</td>
                <td>@if($coupon->isOnlyOnce()) Да @else Нет @endif</td>
            </tr>
            <tr>
                <td>Использован:</td>
                <td>{{ $coupon->orders->count() }}</td>
            </tr>
            <tr>
                <td>Действителен до:</td>
                <td>{{ $coupon->expired_at->format('d.m.Y') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
