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
                        <h4>#{{ $order->id }}</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                </tr>
                            </thead>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
