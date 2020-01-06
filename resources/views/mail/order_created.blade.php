<p>Уважаемый {{ $name }}</p>

<p>Ваш заказ на сумму {{ $fullSum }} создан</p>

<table>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                    <img height="56px" src="{{ Storage::url($product->image) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td><span class="badge">{{ $product->pivot->count }}</span>
                <div class="btn-group form-inline">
                    {!! $product->description !!}
                </div>
            </td>
            <td>{{ $product->price }} руб.</td>
            <td>{{ $product->getPriceForCount() }} руб.</td>
        </tr>
    @endforeach
    </tbody>
</table>
