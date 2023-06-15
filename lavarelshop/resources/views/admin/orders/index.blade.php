@extends('admin.layout')
@section('content')
@if(Session::has('status'))
<h3>{{ Session::get('status') }}</h3>
@endif
<div class="row">
    <a class="" href="{{ route('admin.products.create') }}"> Create New</a>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <p class="card-description"> Add class <code>.table</code> </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Desc</th>
                            <th>User</th>
                            <TH>Status</TH>
                            <th>View Detail</th>
                           
                        </tr>
                    </thead>
                   
                        @foreach($orderList as $order)
                        <tr>
                            <td>#</td>
                            <td>{{ $order->coder }}</td>
                            <td>{{ $order->desc }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->status }}</td>

                            <td>
                                <a class="badge badge-danger" href="{{ route('admin.order.show', $order->id) }}">Pending</a>
                            </td>

                           
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection