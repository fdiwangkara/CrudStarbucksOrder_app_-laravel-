@extends('layouts.main')

@section('content')
    <div class="container mt-5 align-items-center justify-content-center">

        <div class="mb-2 d-flex justify-content-center">
            <a href="/payments/create" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> New Payment
            </a>
        </div>

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

        <div class="table-responsive d-flex justify-content-center align-items-center mt-5">
            <table class="table table-bordered table-hover" style="max-width: 1000px;">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <a href="/payments/edit/{{ $payment->id }}" style="color: #00704A;"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <div class="vertical-divider"></div>


                                    <form method="POST" action="/payments/delete/{{ $payment->id }}"
                                        onclick="return confirm('Are you sure you want to delete this order?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            style="color: #FF0000; border: none; background: none;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
