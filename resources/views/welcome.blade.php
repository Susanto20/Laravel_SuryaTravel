<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Surya Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Surya Travel</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                @if (Auth::check())
                    <a class="nav-link px-3" href="#">{{ Auth::user()->email }}</a>
                @else
                    <script>
                        window.location.href = "{{ route('auth.login') }}"
                    </script>
                @endif
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>

                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Cetak Laporan</span>
                        <a class="link-secondary" href="generate-pdf" aria-label="Add a new report">
                            <span data-feather="printer" class="align-text-bottom"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            {{-- <form action="{{ route('logout.store') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link" aria-current="page" href="#">
                                    <span data-feather="log-out" class="align-text-bottom"></span>
                                    Log Out
                                </button>
                            </form> --}}
                            <a class="btn btn-dark btn-sm" href="{{route('auth.login')}}"
                            >Logout </a>
                            {{-- <form method="POST" action="{{route('logout.store')}}">  --}}
                            {{-- @csrf --}}
                                {{-- <button class="btn btn-dark btn-sm" :href="route('auth.login')"  --}}
                                {{--  --}}
                                {{-- onclick="event.preventDefault();  --}}
                                {{-- // this.closest('form').submit();">  --}}
                                {{-- {{__('Log Out')}}  --}}
                                {{-- <span data-feather="log-out" class="align-text-bottom"></span> --}}
                            {{-- </button>  --}}
                            {{--  --}}
                                {{-- </form> --}}
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm border p-2 ">
                        <thead class="border">
                            <tr class="border">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tanggal Berangkat</th>
                                <th scope="col">Jam Berangkat</th>
                                <th scope="col">Jumlah Kursi</th>
                                {{-- <th scope="col">Bukti Pembayaran</th> --}}
                                <th scope="col">Total Bayar</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        @include('table')
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <script src="/js/dashboard.js"></script>
</body>

</html>
