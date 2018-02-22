@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 align="center">Success!</h1>

        @if($order)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Items</th>
                <th>Grand Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        <table class="table table-condensed">
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>$ {{ $item->quantity * $item->product->price }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>{{ $order->sum() }}</td>
                    <td>
                        @switch($order->payment_status)
                            @case(1) Fail @break
                            @case(2) Paid @break
                            @default Waiting
                        @endswitch
                    </td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
@endsection