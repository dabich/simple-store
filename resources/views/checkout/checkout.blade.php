@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>

        @if($cart && $cart['items'])
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
                        <span class="text-muted">${{ number_format($item['price'], 2) }}</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{ number_format($cart['totalPrice'], 2) }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form id="payment-form" action="{{ route('checkout') }}" class="needs-validation" novalidate method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Full name <span class="text-danger">*</span></label>
                            <input id="name" type="text" name="name"
                                   class="form-control @if($errors->has('name')) is-invalid @endif"
                                   value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" name="email"
                                   class="form-control @if($errors->has('email')) is-invalid @endif"
                                   placeholder="you@example.com"
                                   value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
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

                    <payment-component></payment-component>

                    <hr class="mb-4">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay ${{ number_format($cart['totalPrice'], 2) }}</button>
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

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
@endpush