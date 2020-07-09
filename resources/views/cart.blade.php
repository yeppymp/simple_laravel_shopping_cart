<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    @php
    $cart_products = $cart->cart_products;
    @endphp

    <div class="container-fluid my-4">
        @if(count($cart_products) > 0)
        <div class="text-center mb-5">
            <h1>List Of Your Carts</h1>
            <p>Customer: {{ $cart->user->name }}</p>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Sub Total</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($cart_products as $cp)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        <img src="{{ $cp->product->photo_url }}" alt="" height="100"><br>
                        {{ $cp->product->name }} (x{{ $cp->qty }}) <br>
                    </td>
                    <td>Rp. {{ number_format($cp->product->price) }}</td>
                    <td>Rp. {{ number_format($cp->product->price * $cp->qty) }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('cart_delete', ['id' => $cp->product->id]) }}">Delete</button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3" style="text-align: left;">TOTAL</th>
                    <td>
                        <h3><strong>Rp. {{ number_format($cart->total) }}</strong></h3>
                    </td>
                    <td><a class="btn btn-primary" target="_blank" href="{{ route('invoice', ['id_cart' => $cart->id]) }}">Print Invoice</a><br></td>
                </tr>
            </tbody>
        </table>
        @else
        <div class="text-center mt-5">
            <h1 class="mb-4">No Cart Data</h1>
            <a href="{{ route('products') }}">Shop a product</a>
        </div>
        @endif
        <br>
        <div class="text-center">
            <a href="{{ route('home') }}">Back to Home</a>
        </div>
    </div>
</body>

</html>