@extends("templates.default")

@section("content")
    <div class="container mt-5" style="max-width: 700px">
        <div class="card shadow rounded-3">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifica Curiosità</h4>

                <form method="POST" action="{{ route('curiosity.update', $cur->id) }}">
                    @csrf
                    @method("PATCH")

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="title"
                            value="{{ old('title', $cur->title) }}"
                            placeholder="Inserisci il titolo"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="subtitle"
                            id="subtitle"
                            value="{{ old('subtitle', $cur->subtitle) }}"
                            placeholder="Inserisci il sottotitolo"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea
                            class="form-control"
                            name="description"
                            id="description"
                            rows="6"
                            placeholder="Scrivi qui la descrizione della curiosità"
                            required
                        >{{ old('description', $cur->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-pencil-fill me-1"></i> Salva Modifiche
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
