@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card card-default mb-3">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <b>Name</b>
                        </div>
                        <div class="col-md-9 col-sm-6">
                            <span>{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <b>Email</b>
                        </div>
                        <div class="col-md-9 col-sm-6">
                            <span>{{ $user->email }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">My orders</div>

                <div class="card-body">
                    @if(!sizeof($orders))
                        <p class="text-center m-0">No orders yet</p>
                    @endif

                    @foreach($orders as $order)
                        <div class="border bg-light mb-3 p-3 rounded">
                            <h4>
                                #{{ $order->id }}
                                <small class="float-right text-info">${{ number_format($order->sum(), 2) }}</small>
                            </h4>
                            <p>
                                <b>Status: </b>
                                @switch($order->payment_status)
                                    @case(1) Fail @break
                                    @case(2) Paid @break
                                    @default Waiting
                                @endswitch
                            </p>
                            <table class="table table-sm table-condensed">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-right">
                                                ${{ number_format($item->quantity * $item->product->price, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach

                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
