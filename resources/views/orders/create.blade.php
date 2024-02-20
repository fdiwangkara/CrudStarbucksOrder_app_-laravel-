@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="border p-4" style="margin-top: 20vh">
            <div class="text-center mb-4">
                <img src="/images/starbucks-logo.png" alt="Starbucks Logo" style="max-width: 40px;">
            </div>

            <h2 class="text-center mb-4">Starbucks Order Receipt</h2>

            <div class="d-flex justify-content-center align-items-center">
                <form action="/orders/add" method="post" style="max-width: 400px; width: 100%;">
                    @csrf

                    <div class="mb-3">
                        <label for="beverage" class="form-label">Beverage</label>
                        <input type="text" class="form-control" id="beverage" name="beverage"
                            value="{{ old('beverage') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment</label>
                        <select class="form-select" name="payments_id" id="">
                            @foreach ($payments as $item)
                                <option name="payments_id" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" id="total" name="total" value="{{ old('total') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" class="form-control" id="order_date" name="order_date"
                            value="{{ old('order_date') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="buyer" class="form-label">Buyer</label>
                        <input type="text" class="form-control" id="buyer" name="buyer" value="{{ old('buyer') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address') }}" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Confirm Order
                        </button>
                    </div>
                </form>
            </div>

            <hr>

            <div class="text-center mt-3">
                <a href="/orders/all" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Orders
                </a>
            </div>
        </div>
    </div>
@endsection
