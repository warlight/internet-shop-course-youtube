@extends('layouts.master')

@section('title', __('main.product'))

@section('content')
    <h1>{{ $product->__('name') }}</h1>
    <h2>{{ $product->category->name }}</h2>
    <p>@lang('product.price'): <b>{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</b></p>
    <img src="{{ Storage::url($product->image) }}">
    <p>{{ $product->__('description') }}</p>

    @if($product->isAvailable())
        <form action="{{ route('basket-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">@lang('product.add_to_cart')</button>

            @csrf
        </form>
    @else

        <span>@lang('product.not_available')</span>
        <br>
        <span>@lang('product.tell_me'):</span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form method="POST" action="{{ route('subscription', $product) }}">
            @csrf
            <input type="text" name="email"></input>
            <button type="submit">@lang('product.subscribe')</button>
        </form>
    @endif
@endsection
