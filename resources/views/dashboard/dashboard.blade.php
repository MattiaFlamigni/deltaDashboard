<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">

<x-navbar/>


<main>
    @include("partials.displayErrors")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- cards !-->
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card text-white bg-primary h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <h5 class="card-title fw-bold mb-3">Utenti Totali</h5>
                        <p class="display-4 mb-0">{{ $users->count() }}</p>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between align-items-center bg-primary bg-opacity-75 border-top-0">
                        <a href="{{route("dashboard.detail", ["filter"=>"users"])}}"
                           class="text-white text-decoration-none small fw-semibold">Vedi dettagli</a>
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white bg-warning h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <h5 class="card-title fw-bold mb-3">Utenti attivi nell'ultimo mese</h5>
                        <p class="display-4 mb-0">{{ $activeUsers->count() }}</p>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between align-items-center bg-warning bg-opacity-75 border-top-0">
                        <a href="{{route("dashboard.detail", ["filter"=>"activeUsers"])}}"
                           class="text-white text-decoration-none small fw-semibold">Vedi dettagli</a>
                        <i class="fas fa-user-check fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white bg-success h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <h5 class="card-title fw-bold mb-3">Spotted Totali</h5>
                        <p class="display-4 mb-0">{{ $spotted->count() }}</p>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between align-items-center bg-success bg-opacity-75 border-top-0">
                        <a href="{{route("dashboard.detail", ["filter"=>"spotted"])}}"
                           class="text-white text-decoration-none small fw-semibold">Vedi dettagli</a>
                        <i class="fas fa-map-marker-alt fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white bg-danger h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <h5 class="card-title fw-bold mb-3">Nuovi Spot Questo Mese</h5>
                        <p class="display-4 mb-0">{{ $spottedMonth->count() }}</p>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between align-items-center bg-danger bg-opacity-75 border-top-0">
                        <a href="{{route("dashboard.detail", ["filter"=>"spottedMonth"])}}"
                           class="text-white text-decoration-none small fw-semibold">Vedi dettagli</a>
                        <i class="fas fa-bolt fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>


        @include("partials.charts")

        @include("partials.poiTable", ["data"=> $poi])
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>

<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>
</html>
