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
                            <th class="col-5">Quantity</th>
                            <th class="col-3">Price</th>
                            <th class="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsOnCart as $product)
                        <tr>
                            <td>
                                {{$product->name_product}}
                            </td>
                            <td>
                                <form action="{{route('updateCart', $product->id_product)}}" class="d-inline form-terminator" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}" min="1">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="submit" class="btn btn-info mt-1">
                                        Confirm
                                    </button>
                                </form>
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                            <td>
                                <form action="{{route('deleteProductOnCart', $product->id_product)}}" class="d-inline form-terminator" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
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