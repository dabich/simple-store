@extends('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

            @if (!sizeof($products))
                <div class="col-md-12">
                    <h4 class="text-center">No products</h4>
                </div>
            @endif

            @foreach($products as $product)
                <div class="col-lg-3 col-sm-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ $product->image_md }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $product->name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <buy-button-component :product="{{ $product->toJson() }}"></buy-button-component>
                                <span class="text-muted">${{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection