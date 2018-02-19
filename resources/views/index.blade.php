@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="mb-0">Store</h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="*">Product</th>
                                <th width="10%">Price</th>
                                <th width="10%">Qty</th>
                                <th width="20%">Action</th>
                            </tr>
                            </thead>

                            <tr>
                                <td>iPhone 7+</td>
                                <td>$700</td>
                                <td>
                                    <div class="form-group">
                                        <input name="qty" value="1" class="form-control"/>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success">Order</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection