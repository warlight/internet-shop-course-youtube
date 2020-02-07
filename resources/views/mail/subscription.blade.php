Уважаемый клиент, товар {{ $product->name }} появился в наличии.

<a href="{{ route('product', [$product->category->code, $product->code]) }}">Узнать подробности</a>
