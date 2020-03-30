@extends('auth.layouts.master')

@section('title', 'Sku ' . $skus->name)

@section('content')
    <div class="col-md-12">
        <h1>Sku {{ $skus->product->name }}</h1>
        <h2>{{ $skus->propertyOptions->map->name->implode(', ') }}</h2>
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
                <td>{{ $skus->id }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $skus->price }}</td>
            </tr>
            <tr>
                <td>Кол-во</td>
                <td>{{ $skus->count }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
