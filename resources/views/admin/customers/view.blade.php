@extends('admin.layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $user->name }}</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-dark">
            <span data-feather="chevron-left"></span> Customers
        </a>
    </div>

    <b>Email:</b> {{ $user->email }}
@endsection