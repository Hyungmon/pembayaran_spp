<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-4.6.0-dist/css/bootstrap.min.css') }}">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>Aplikasi Pembayaran SPP</title>
</head>

<body>
    @include('layouts.navbar')
    
    {{-- Sidebar --}}
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="">History Pembayaran</a>
                        </li>
                    </ul>
                </div>
            </nav>
    
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="container mt-3">
                    {{-- Content --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{--  Jquery, Popper, Bootstrap Js --}}
    <script src="{{ asset('assets/bootstrap-4.6.0-dist/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-4.6.0-dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-4.6.0-dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
