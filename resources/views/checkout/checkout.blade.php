@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        @if($cart)
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $cart['totalCount'] }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($cart['items'] as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>{{ $item['name'] }}</strong>
                        <span class="text-muted">${{ $item['price'] }}</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{ $cart['totalPrice'] }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form action="{{ route('checkout') }}" class="needs-validation" novalidate method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Full name <span class="text-danger">*</span></label>
                            <input id="name" type="text" name="user_name"
                                   class="form-control @if($errors->has('user_name')) is-invalid @endif"
                                   value="{{ old('user_name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user_name') }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" name="user_email"
                                   class="form-control @if($errors->has('user_email')) is-invalid @endif"
                                   placeholder="you@example.com"
                                   value="{{ old('user_email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user_email') }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input id="address" type="text" name="address"
                               class="form-control @if($errors->has('address')) is-invalid @endif"
                               placeholder="1234 Main St"
                               value="{{ old('address') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number <span class="text-danger">*</span></label>
                            <input id="cc-number" type="text" name="card_number"
                                   class="form-control @if($errors->has('card_number')) is-invalid @endif"
                                   value="{{ old('card_number') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('card_number') }}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration <span class="text-danger">*</span></label>
                            <input id="cc-expiration"  type="text" name="expiration"
                                   class="form-control @if($errors->has('expiration')) is-invalid @endif"
                                   placeholder="01/21"
                                   value="{{ old('expiration') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('expiration') }}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV <span class="text-danger">*</span></label>
                            <input id="cc-cvv" type="text" name="cvv"
                                   class="form-control @if($errors->has('cvv')) is-invalid @endif"
                                   value="{{ old('cvv') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('cvv') }}
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
        @else
            <h6 align="center">Empty cart</h6>
        @endif

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; {{ date('Y') }} Simple Shop</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
@endsection