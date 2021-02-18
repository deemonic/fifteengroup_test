@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Orders
                        </h2>

                    </div>

                    <div class="card-body">
                        <div id="filterContainer" class="col-12">
                            <form class="form-inline mb-2">
                                <div class="form-group mr-2">
                                    <label class="mr-2">No. of items</label>
                                    <select name="num_of_items" class="form-control">
                                        <option value="asc">Min number of items</option>
                                        <option value="desc">Max number of items</option>
                                    </select>
                                </div>
                                <div class="form-group mr-2">
                                    <label class="mr-2">Total Order</label>
                                    <select name="order_total" class="form-control">
                                        <option value="asc">Min order value</option>
                                        <option value="desc">Max order value</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-dark mr-2" value="Filter">
                                <a href="{{ route('orders') }}" class="btn btn-secondary">Clear</a>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Contact</th>
                                <th>No. of items</th>
                                <th>Order Total</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }}</td>
                                    <td>{{ count($order->lineItem) }} </td>
                                    <td>£ {{ number_format($order->order_total, 2, '.', ',') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let url = new URL('https://example.com?foo=1&bar=2');
        let params = new URLSearchParams(url.search.slice(1));

        //Add a second foo parameter.
        params.append('foo', 4);
        //Query string is now: 'foo=1&bar=2&foo=4'
    </script>


@endsection
