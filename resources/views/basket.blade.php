@extends('layouts.master')

@section('title', __('basket.cart'))

@section('content')
    <h1>@lang('basket.cart')</h1>
    <p>@lang('basket.ordering')</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('basket.name')</th>
                <th>@lang('basket.count')</th>
                <th>@lang('basket.price')</th>
                <th>@lang('basket.cost')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                            <img height="56px" src="{{ Storage::url($product->image) }}">
                            {{ $product->__('name') }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $product->countInOrder }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                                <button type="submit" class="btn btn-danger" href=""><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="POST">
                                <button type="submit" class="btn btn-success"
                                        href=""><span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</td>
                    <td>{{ $product->price * $product->countInOrder }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">@lang('basket.full_cost'):</td>
                <td>{{ $order->getFullSum() }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">@lang('basket.place_order')</a>
        </div>
    </div>
@endsection
