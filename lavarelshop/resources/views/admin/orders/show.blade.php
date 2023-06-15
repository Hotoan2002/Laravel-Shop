@extends('admin.layout')
@section('content')
@if(Session::has('status'))
<h3>{{ Session::get('status') }}</h3>
@endif
<div class="row">
  
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <p class="card-description"> Add class <code>.table</code> </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>quantity</th>
                            <TH>Order</TH>
                            <th>Total</th>
                           
                        </tr>
                    </thead>
                   
                        @foreach($orders as $order)
                        <tr>
                            <td>#</td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->quantity *  $order->price }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection