<p>@lang('mail.order_created.dear') {{ $name }}</p>

<p>@lang('mail.order_created.your_order') {{ $fullSum }} @lang('mail.order_created.created')</p>

<table>
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
                    {!! $product->__('description') !!}
                </div>
            </td>
            <td>{{ $product->price }} {{ $currencySymbol }}.</td>
            <td>{{ $product->getPriceForCount() }} {{ $currencySymbol }}.</td>
        </tr>
    @endforeach
    </tbody>
</table>
