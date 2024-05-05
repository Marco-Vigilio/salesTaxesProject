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
                <table class="table table-striped table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th class="col">Name</th>
                            <th class="col-2">Quantity</th>
                            <th class="col-3">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsOnCart as $product)
                        <tr>
                            <td>
                                {{$product->name_product}}
                            </td>
                            <td>
                                {{$product->quantity}}
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-around">
                    <a type="button" class="btn btn-primary" href="{{ route('index')}}">Return to the catalogue</a>

                    <button type="button" class="btn btn-success">Buy</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>