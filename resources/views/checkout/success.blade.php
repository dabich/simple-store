@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 align="center">Thank you!</h1>

        <h4 class="text-center mt-3">Order №{{ $order->id }}</h4>

        @guest
            <p class="text-center">
                You can see your orders by
                <a href="{{ url('register') }}">registering</a>
                or
                <a href="{{ url('login') }}">login</a>
                with an email
                <b>{{ $order->email }}</b>
            </p>
        @else
            <p class="text-center">
                <a href="{{ url('orders') }}">My orders</a>
            </p>
        @endauth
    </div>
@endsection