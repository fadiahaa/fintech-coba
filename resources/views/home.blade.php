@extends('layouts.app')

<?php
$page = 'Home';
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if (Auth::user()->role_id === 1)
                            <ul>
                                {{-- <li><a href="{{ route('topup') }}">Top Up</a></li>
                                <li><a href="{{ route('transaksi') }}">Jajan</a></li> --}}
                                <li><a href={{ route('user.list') }}>User List</a></li>
                            </ul>
                        @endif

                        @if (Auth::user()->role_id === 2)
                            <ul>
                                {{-- <li><a href="{{ route('topup') }}">Top Up</a></li>
                                <li><a href="{{ route('transaksi') }}">Jajan</a></li> --}}
                                <li><a href={{ route('topup.check') }}>TopUp List</a></li>
                            </ul>
                        @endif

                        @if (Auth::user()->role_id === 3)
                            <ul>
                                {{-- <li><a href="{{ route('topup') }}">Top Up</a></li>
                                <li><a href="{{ route('transaksi') }}">Jajan</a></li> --}}
                                <li><a href={{ route('item.list') }}>Item List</a></li>
                            </ul>
                        @endif

                        @if (Auth::user()->role_id === 4)
                            <ul>
                                <li><a href="{{ route('topup.index') }}">Top Up</a></li>
                                <li><a href="">Shopping</a></li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
