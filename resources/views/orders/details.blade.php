@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-5" style="margin-top: 20vh">Starbucks Order Details</h2>

        <div class="card" style="max-width: 500px; margin: 0 auto; margin-top: 10px">
            <div class="card-header bg-success text-white">
                Order #{{ $orders->id }} Details
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Beverage:</strong> {{ $orders->beverage }}
                </div>
                <div class="mb-3">
                    <strong>Payment:</strong> {{ $orders->payments->name }}
                </div>
                <div class="mb-3">
                    <strong>Total:</strong> ${{ $orders->total }}
                </div>
                <div class="mb-3">
                    <strong>Order Date:</strong> {{ $orders->order_date }}
                </div>
                <div class="mb-3">
                    <strong>Customer:</strong> {{ $orders->buyer }}
                </div>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $orders->address }}
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="/orders/all" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
@endsection
