@extends('layoutcart')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($carts->isEmpty())
    <div class="alert alert-warning">
        Your cart is empty!
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr>
                <td>
                    <img src="{{ $cart->product->img }}" alt="{{ $cart->product->name }}" class="product-image-small">
                </td>
                <td>
                    <div class="product-info">
                        <div class="product-name">{{ $cart->product->name }}</div>
                    </div>
                </td>
                <td>${{ $cart->product->price }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>${{ $cart->product->price * $cart->quantity }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <input type="number" name="quantity" class="from-update" value="{{ $cart->quantity }}"
                                min="1" max="{{ $cart->product->quantity }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"><strong>Total</strong></td>
                <td>${{ $total }}</td>
            </tr>
        </tbody>
    </table>
    <a href="#" class="btn btn-primary">Checkout</a>
    <style>
    .product-image-small {
        width: 100px;
        height: auto;
    }
    </style>
    @endif
</div>
@endsection