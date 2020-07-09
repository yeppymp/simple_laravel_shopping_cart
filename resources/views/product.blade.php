<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    <div class="container-fluid my-4">
        <h1 class="mb-4 text-center">List Of Products</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $p->name }}</td>
                    <td><img src="{{ $p->photo_url }}" alt="" height="100"></td>
                    <td>{{ number_format($p->price) }}</td>
                    <td style="max-width: 300px;">{{ $p->description }}</td>
                    <td>
                        <form action="{{ route('add_to_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_product" value="{{ $p->id }}">
                            <input type="hidden" name="qty" value="1">
                            <button class="btn btn-primary" type="submit">Add to cart</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div style="text-align: center;">
            <a href="{{ route('home') }}">Back to Home</a>
        </div>
    </div>
</body>

</html>