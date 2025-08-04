@extends("templates.default")

@section("content")
    <div class="container mt-5" style="max-width: 600px">
        <div class="card shadow rounded-3">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifica Utente Admin</h4>

                <form method="POST" action="{{ route('admin.update', $admin) }}">
                    @csrf
                    @method("PATCH")

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input
                            class="form-control"
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $admin->name) }}"
                            placeholder="Inserisci il nome"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            class="form-control"
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $admin->email) }}"
                            placeholder="Inserisci l'email"
                            required
                        >
                    </div>

                    <div class="form-check mb-4">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="isAdmin"
                            name="isAdmin"
                            value="1"
                            @if($admin->isAdmin) checked @endif
                        >
                        <label class="form-check-label" for="isAdmin">
                            Admin
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-pencil-fill me-1"></i> Salva Modifiche
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
