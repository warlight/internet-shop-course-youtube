@extends('auth.layouts.master')

@section('title', 'Купоны')

@section('content')
    <div class="col-md-12">
        <h1>Купоны</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Описание
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id}}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->description }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('coupons.destroy', $coupon) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('coupons.show', $coupon) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('coupons.edit', $coupon) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $coupons->links() }}
        <a class="btn btn-success" type="button" href="{{ route('coupons.create') }}">Добавить купон</a>
    </div>
@endsection
