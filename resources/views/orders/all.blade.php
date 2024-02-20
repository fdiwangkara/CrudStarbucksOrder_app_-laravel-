@extends('layouts.main')

@section('content')
    <div class="container mt-5">


        @if (session()->has('success'))
            <div id="success-alert" class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>

            <script>
                // Close the alert after 1 second
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 2000);
            </script>
        @endif

        <div class="table-responsive d-flex justify-content-center align-items-center mt-5 mb-5">
            <table class="table table-bordered table-hover" style="max-width: 1000px;">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Beverage</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Total</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $order->beverage }}</td>
                            <td>{{ $order->payments->name ?? 'Payment not found' }}</td>
                            <td>{{ $order->total }}$</td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <a href="/orders/details/{{ $order->id }}" style="color: #00704A;"><i
                                            class="fas fa-info-circle"></i></a>
                                    @auth
                                        <a href="/orders/edit/{{ $order->id }}" style="color: #00704A;"><i
                                                class="fas fa-pencil-alt"></i></a>

                                        <div class="vertical-divider"></div>


                                        <form method="POST" action="/orders/delete/{{ $order->id }}"
                                            onclick="return confirm('Are you sure you want to delete this order?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                style="color: #FF0000; border: none; background: none;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        {{ $orders->links() }}
    </div>
@endsection
