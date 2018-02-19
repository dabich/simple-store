@extends('layout')

@section('content')
    <h1>Checkout</h1>
    <form>

        <div class="form-group">
            <input class="form-control" placeholder="Name"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Email"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Address"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Credit card #"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Month"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Year"/>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="CVV"/>
        </div>



    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-success pull-right">Checkout</button>
        </div>
    </div>

    </form>
@endsection