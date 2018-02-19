@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $product->name ?? 'Create product' }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-dark">
            <span data-feather="chevron-left"></span> Products
        </a>
    </div>

    @include('admin.layouts._errors')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
                @csrf
                @if(isset($product))
                    {{ method_field('PATCH') }}
                @endif

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               placeholder="Name"
                               value="{{ $product->name ?? request('name') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text"
                               class="form-control"
                               id="price"
                               placeholder="Price"
                               value="{{ $product->price ?? request('price') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
            </form>
        </div>
    </div>
@endsection