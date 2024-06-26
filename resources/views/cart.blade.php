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
                            <th class="col-">Name</th>
                            <th class="col">Quantity</th>
                            <th class="col-3">Price</th>
                            <th class="col-3">Price + iva</th>
                            <th class="col-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsOnCart as $productOnCart)
                        <tr>
                            <td>
                                {{$productOnCart->name_product}}
                            </td>
                            <td>
                                <form action="{{route('updateCart', $productOnCart->id_product)}}" class="d-flex justify-content-between form-terminator" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{$productOnCart->quantity}}" min="1">
                                    <button type="submit" class="btn btn-info mt-1">
                                        Confirm
                                    </button>
                                </form>
                            </td>
                            <td>
                                {{$productOnCart->product->price * $productOnCart->quantity}} &euro;
                            </td>
                            <td>
                                {{$productOnCart->price}} &euro;
                            </td>
                            <td>
                                <form action="{{route('deleteProductOnCart', $productOnCart->id_product)}}" class="d-inline form-terminator" method="POST">
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

                @if (!($productsOnCart->isEmpty()))
                <div class="d-flex justify-content-center m-auto border col-3 my-4 p-3">
                    <h4 class="font-weight-bold">Total : {{$totalPrice}} &euro;</h4>
                </div>
                @endif

                <div class="d-flex justify-content-around mb-4">
                    <a type="button" class="btn btn-primary" href="{{ route('index')}}">Return to the catalogue</a>

                    @if (!($productsOnCart->isEmpty()))
                    <a type="button" class="btn btn-success" href="{{ route('showReceipt')}}">Buy</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</body>

</html>