@extends("layouts.app")

<?php
$page = 'Top Up';
?>

@section('content')
    <div class="container row justify-content-center">
     

        Balance: {{ $balance->balance??0 }}
        <form method="POST" action={{ route('topup.create') }}>
            @csrf
            <div class="mb-3">
                <label for="topup" class="form-label">Top Up</label>
                <input type="number" class="form-control" id="topup" name="amount">
                <input type="hidden" name="type" value="1">
                <div id="topup" class="form-text">Top up, here</div>
            </div>
            <button type="submit" class="btn btn-primary">Top Up</button>
        </form>
    </div>
@endsection
