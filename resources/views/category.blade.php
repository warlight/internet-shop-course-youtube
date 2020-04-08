@extends('layouts.master')

@section('title', __('main.category') . $category->__('name'))

@section('content')
    <h1>
        {{$category->__('name')}}
    </h1>
    <p>
        {{ $category->__('description') }}
    </p>
    <div class="row">
        @foreach($category->products->map->skus->flatten() as $sku)
            @include('layouts.card', compact('sku'))
        @endforeach
    </div>
@endsection
