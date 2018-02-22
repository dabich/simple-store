@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 align="center">Payment failed!</h1>

        @if($payResult)
            <div class="alert alert-danger">
                {{ $payResult->message }}
            </div>
        @endif
    </div>
@endsection