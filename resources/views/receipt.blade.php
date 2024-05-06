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
        <h1 class="text-center my-4">Receipt</h1>

        <table class="table table-striped table-hover text-center table-bordered">
            <thead>
                <tr>
                    <th class="col-">Name</th>
                    <th class="col">Quantity</th>
                    <th class="col-3">Price + iva</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productsOnCart as $productOnCart)
                <tr>
                    <td>
                        {{$productOnCart->name_product}}
                    </td>
                    <td>
                        {{$productOnCart->quantity}}
                    </td>
                    <td>
                        {{$productOnCart->price}} &euro;
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-striped table-hover text-center table-bordered">
            <thead>
                <tr>
                    <th class="col-">Total price of the products</th>
                    <th class="col">{{$totalPrice}} &euro;</th>
                </tr>
                <tr>
                    <th class="col-">Total price of the IVA</th>
                    <th class="col-">{{$iva}} &euro;</th>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>