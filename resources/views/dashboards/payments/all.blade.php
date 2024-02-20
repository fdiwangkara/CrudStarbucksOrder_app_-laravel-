<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="" rel="stylesheet">
</head>

<body>



    <header class="navbar sticky-top" style="background-color: #00704A; color: #FFFFFF;">
        <a class="navbar-brand col-md-3 col-lg-2 me-auto px-3 fs-6 text-white" href="/dashboard/all">
            <img src="/images/starbucks-logo.png" alt="Starbucks Logo" style="width: 35px; height: 35px;">
        </a>

        @auth
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Welcome, {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/home">Home</a></li>
                    <li>
                        <form method="post" action="/logins/logout">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
                        style="height: 100vh; position: relative;">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                    href="/dashboards/all">
                                    <i class="bi bi-house-door-fill bi-lg"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/dashboards/orders/all">
                                    <i class="bi bi-cup-hot-fill"></i>
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="/dashboards/payments/all">
                                    <i class="bi bi-cash"></i>
                                    Payments
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
            </main>
        </div>
    </div>
    <script src="dashboard.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-...">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-..."
        crossorigin="anonymous"></script>

</body>

</html>
