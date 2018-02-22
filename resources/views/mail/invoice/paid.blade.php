@component('mail::message')
# Thank you for your purchase

## Order №{{ $order->id }}

#### Details:
- {{ $order->name }}
- {{ $order->address }}

@component('mail::table')
    | Name          | Quantity      | Price    |
    | ------------- |:-------------:| --------:|
    @foreach($order->items as $item)
    | {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->product->price * $item->quantity) }} |
    @endforeach
@endcomponent

### Total: ${{ number_format($order->sum()) }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
