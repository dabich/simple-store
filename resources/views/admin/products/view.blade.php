@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $product->name }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-dark">
            <span data-feather="chevron-left"></span> Products
        </a>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <img src="{{ $product->image_lg }}" width="100%" class="rounded">
        </div>
        <div class="col-md-8 col-sm-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Name:</b> {{ $product->name }}</li>
                <li class="list-group-item"><b>Price:</b> $ {{ $product->price }}</li>
                <li class="list-group-item"><b>Total orders:</b> {{ $product->orders()->count() }}</li>
            </ul>
        </div>
    </div>
@endsection