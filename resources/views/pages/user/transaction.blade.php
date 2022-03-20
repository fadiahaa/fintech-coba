@extends("layouts.app")

@section('content')
    <div class="container">

        {{-- my balance --}}
        <div class="card">
            <div class="card-header">
                Balance
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Rp. 20000</p>
                </blockquote>
            </div>
        </div>

        {{-- menu --}}
        <div class="card mt-5">
            <div class="card-header">
                Menu
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bakso</h5>
                                <p class="card-text">Bakso daging</p>
                                <input type="number">
                                <a href="#" class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        Cart
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bakso</td>
                                    <td>10000</td>
                                    <td>1</td>
                                    <td>10000</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-primary">Check Out</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        Check Out
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Bakso</td>
                                    <td>10000</td>
                                    <td>1</td>
                                    <td>10000</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
