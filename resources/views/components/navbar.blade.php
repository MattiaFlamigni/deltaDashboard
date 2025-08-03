<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expand at sm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        {{-- Menù sinistra --}}
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("dashboard.index")}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("curiosity.index")}}">Curiosity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("reports.index")}}">Reports</a>
            </li>

            @if(Auth::user()->isAdmin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                        <a class="dropdown-item" href="{{route("admin.create")}}">Registra utente</a>
                        <a class="dropdown-item" href="{{route("admin.index")}}">Visualizza utenti</a>
                    </div>
                </li>
            @endif
        </ul>

        {{-- Menù destra --}}
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->email }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
