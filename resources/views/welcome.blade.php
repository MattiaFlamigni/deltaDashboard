<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso Amministratore | Delta Explorer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center">
    <h1 class="display-5 fw-bold mb-4">Pannello Amministrativo</h1>
    <p class="lead mb-4">Gestione contenuti e monitoraggio dell'app Delta Explorer</p>

    @if (Route::has('login'))
        <div class="d-flex justify-content-center gap-3">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg">
                    Vai al Pannello
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                    Accedi come Amministratore
                </a>
            @endauth
        </div>
    @endif

    <footer class="mt-5 text-muted small">
        © {{ now()->year }} Delta Explorer – Accesso riservato
    </footer>
</div>

</body>
</html>
