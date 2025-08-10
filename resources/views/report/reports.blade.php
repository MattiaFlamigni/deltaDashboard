@extends("templates.default")

@section("content")
    @include("partials.displayErrors")

    <div class="container py-4">
        <div class="row gx-5 gy-4">
            <!-- Prima tabella -->
            <div class="col-12 ">
                <h2 class="mb-3">Report Aperti</h2>
                <div class="table-responsive shadow-sm rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-primary">
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th>Data</th>
                            <th>Immagine</th>
                            <th>Commento</th>
                            <th>Tipo</th>
                            <th>Posizione</th>
                            <th>Verifiche</th>
                            <th style="width: 110px;">Azioni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($openReports as $report)
                            {{-- supponendo $openReports --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $report->data }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
                                       data-img="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $report->image_path }}">
                                        <img
                                            src="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $report->image_path }}"
                                            width="60" height="60" alt="img" style="cursor:pointer;">
                                    </a>
                                </td>
                                <td>{{ $report->comment }}</td>
                                <td>{{ $report->type }}</td>
                                <td>

                                    @if (is_array($report->position) && count($report->position) >= 2)
                                        <a href="https://www.google.com/maps?q={{ $report->position[0] }},{{ $report->position[1] }}"
                                           target="_blank" class="text-decoration-none">
                                            📍 {{ number_format((float)$report->position[0], 3) }}
                                            , {{ number_format((float)$report->position[1], 3) }}
                                        </a>
                                    @else
                                        <span class="text-muted">Posizione non disponibile</span>
                                @endif
                                <td>{{ $report->verified }}</td>
                                <td>
                                    <form action="{{route("reports.update", $report)}}" method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Apri">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    {{ $openReports->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>

            <!-- Seconda tabella -->
            <div class="col-12 ">
                <h2 class="mb-3">Report Chiusi</h2>
                <div class="table-responsive shadow-sm rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-secondary text-secondary">
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th>Data</th>
                            <th>Immagine</th>
                            <th>Commento</th>
                            <th>Tipo</th>
                            <th>Posizione</th>
                            <th>Verifiche</th>
                            <th style="width: 110px;">Azioni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($closedReports as $report)
                            {{-- supponendo $closedReports --}}
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $report->data }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
                                       data-img="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $report->image_path }}">
                                        <img
                                            src="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $report->image_path }}"
                                            width="60" height="60" alt="img" style="cursor:pointer;">
                                    </a>
                                </td>
                                <td>{{ $report->comment }}</td>
                                <td>{{ $report->type }}</td>
                                <td>

                                    @if (is_array($report->position) && count($report->position) >= 2)
                                        <a href="https://www.google.com/maps?q={{ $report->position[0] }},{{ $report->position[1] }}"
                                           target="_blank" class="text-decoration-none">
                                            📍 {{ number_format((float)$report->position[0], 3) }}
                                            , {{ number_format((float)$report->position[1], 3) }}
                                        </a>
                                    @else
                                        <span class="text-muted">Posizione non disponibile</span>
                                    @endif

                                </td>
                                <td>{{ $report->verified }}</td>
                                <td>

                                    <form action="{{route("reports.update", $report)}}" method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Apri">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    {{ $closedReports->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>



    @include("partials.resizeImage")
@endsection
