<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Taxes Project</title>
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Sales Taxes Project</h1>
        <div class="row m-auto">
            <div class="col-11 m-auto">
                <a class="text-warning d-flex justify-content-end" href="{{ route('cart')}}">See cart</a>
                <table class="table table-striped table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th class="col">Name</th>
                            <th class="col-1">Price</th>
                            <th class="col-3">Category</th>
                            <th class="col-1">Buy</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->price}} &euro;
                            </td>
                            <td>
                                {{ $product->category->name }}
                            </td>
                            <td>
                                <form class="d-inline-block" action="{{ route('addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">
                                        Select
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>