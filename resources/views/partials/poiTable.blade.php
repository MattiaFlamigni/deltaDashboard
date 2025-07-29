<div class="card shadow-sm mb-4 border-0 rounded-3">
    <div class="card-header bg-primary text-white d-flex align-items-center">
        <i class="fas fa-binoculars me-2"></i>
        <strong>Punti Di Interesse</strong>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table id="datatablesSimple" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Posizione</th>
                    <th>Categoria</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $poi)
                    @php
                        $loc = json_decode($poi->location);
                        $desc = Str::limit($poi->description, 50);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $poi->title }}</strong></td>
                        <td>
                                <span title="{{ $poi->description }}">
                                    {{ $desc }}
                                </span>
                        </td>
                        <td>
                            @if($loc)
                                <a href="https://www.google.com/maps?q={{ $loc->latitude }},{{ $loc->longitude }}"
                                   target="_blank" class="text-decoration-none">
                                    📍 {{ number_format($loc->latitude, 3) }}, {{ number_format($loc->longitude, 3) }}
                                </a>
                            @else
                                <em class="text-muted">N/D</em>
                            @endif
                        </td>
                        <td>
                                <span class="badge bg-info text-dark">
                                    {{ $poi->category ?? 'N/A' }}
                                </span>
                        </td>
                        <td>
                            <form action="{{route("poi.destroy", $poi)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
