@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2">
        <h1 class="h2">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-dark">
            <span data-feather="plus"></span> Create
        </a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th width="10">ID</th>
            <th width="10">Image</th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <img class="rounded"
                             src="{{ $product->image_sm }}"
                             title="{{ $product->name }}"
                             alt="{{ $product->name }}">
                    </a>
                </td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </td>
                <td>$ {{ $product->price }}</td>
                <td align="right">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href="{{ route('products.show', $product->id) }}">
                            <span data-feather="eye"></span>
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">
                            <span data-feather="edit"></span>
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">
                            <span data-feather="trash-2"></span>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection