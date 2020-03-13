@extends('layouts.master')

@section('title', __('basket.place_order'))

@section('content')
    <h1>@lang('basket.approve_order'):</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>@lang('basket.full_cost'): <b>{{ $order->getFullSum() }} {{ $currencySymbol }}.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>@lang('basket.personal_data'):</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.name'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.phone'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        @guest
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.email'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>
                        @endguest
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="@lang('basket.approve_order')">
                </div>
            </form>
        </div>
    </div>
@endsection
