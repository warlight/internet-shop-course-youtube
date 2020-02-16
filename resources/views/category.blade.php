@extends('layouts.master')

@section('title', __('main.category') . $category->__('name'))

@section('content')
    <h1>
        {{$category->__('name')}} {{ $category->products->count() }}
    </h1>
    <p>
        {{ $category->__('description') }}
    </p>
    <div class="row">
        @foreach($category->products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
