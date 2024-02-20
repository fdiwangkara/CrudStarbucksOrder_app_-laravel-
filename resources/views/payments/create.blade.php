@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="border p-4" style="margin-top: 20vh">
            <div class="text-center mb-4">
                <img src="/images/starbucks-logo.png" alt="Starbucks Logo" style="max-width: 40px;">
            </div>

            <h2 class="text-center mb-4">Starbucks Create Payment</h2>

            <div class="d-flex justify-content-center align-items-center">
                <form action="/payments/add" method="post" style="max-width: 400px; width: 100%;">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Payment</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Confirm Add
                        </button>
                    </div>
                </form>
            </div>

            <hr>

            <div class="text-center mt-3">
                <a href="/payments/all" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Payments
                </a>
            </div>
        </div>
    </div>
@endsection
