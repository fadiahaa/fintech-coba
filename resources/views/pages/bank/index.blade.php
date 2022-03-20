@extends("layouts.app")

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->name }}</td>
                        <td>20000</td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
