@extends("templates.default")

@section("content")
    @include("partials.displayErrors")

    <div class="container py-4">
        <div class="row justify-content-center gx-5 gy-4">
            <!-- Form in colonna piena su xs, su md a fianco -->
            <div class="col-12 col-md-4">
                <div class="card shadow-sm rounded-3 border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Aggiungi Curiosità</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('curiosity.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input class="form-control" type="text" name="title" id="title"  placeholder="Titolo"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="subtitle" class="form-label fw-semibold">Sottotitolo</label>
                                <input class="form-control" type="text" name="subtitle" id="subtitle"
                                       placeholder="Sottotitolo" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Descrizione</label>
                                <textarea class="form-control" name="description" id="description" rows="5"
                                          placeholder="Descrizione..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i> Invia
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabella -->
            <div class="col-12 col-md-8">
                <div class="table-responsive shadow-sm rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-primary">
                        <tr>
                            <th scope="col" style="width: 40px;">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Sottotitolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col" style="width: 110px;">Azioni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($curiosity as $cur)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $cur->title }}</td>
                                <td>{{ $cur->subtitle }}</td>
                                <td>{{ Str::limit($cur->description, 80, '...') }}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('curiosity.edit', $cur) }}"
                                           class="btn btn-sm btn-outline-primary" title="Modifica">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('curiosity.destroy', $cur->id) }}" method="POST"
                                              onsubmit="return confirm('Sei sicuro di voler cancellare?')"
                                              style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    {{ $curiosity->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
