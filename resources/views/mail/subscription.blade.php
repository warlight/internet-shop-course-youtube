@lang('mail.subscription.dear_client') {{ $product->__('name') }} @lang('mail.subscription.appeared_in_stock').

<a href="{{ route('product', [$product->category->code, $product->code]) }}">@lang('mail.subscription.more_info')</a>
