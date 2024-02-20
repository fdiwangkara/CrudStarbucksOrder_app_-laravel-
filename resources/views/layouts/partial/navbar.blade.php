<style>
    .navbar-nav .nav-link {
        color: white;
        position: relative;
    }

    .navbar-nav .nav-link:hover {
        color: white;
    }

    .navbar-nav .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: white;
        transition: width 0.3s;
    }

    .navbar-nav .nav-link:hover::before {
        width: 100%;
    }

    .vertical-divider {
        height: 20px;
        width: 1px;
        background-color: #ccc;
        margin: 0 10px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #00704A;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/starbucks-logo.png" alt="Starbucks Logo" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Coffee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/payments/all">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders/all">Orders</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Welcome, {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form method="get" action="/dashboards/all">
                            @csrf
                            <button type="submit" class="dropdown-item">Dashboard</button>
                        </form>
                        <form method="post" action="/logins/logout">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders/all">Orders</a>
                    </li>
                </ul>
            </div>

            <div class="nav-item">
                <a href="/logins/login" type="button" class="btn btn-outline-light mr-2">Login</a>
                <a href="/registers/register" type="button" class="btn btn-outline-light">Register</a>
            </div>
        @endauth
    </div>
</nav>
