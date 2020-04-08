@lang('mail.subscription.dear_client') {{ $sku->__('name') }} @lang('mail.subscription.appeared_in_stock').

<a href="{{ route('product', [$sku->category->code, $sku->code]) }}">@lang('mail.subscription.more_info')</a>
