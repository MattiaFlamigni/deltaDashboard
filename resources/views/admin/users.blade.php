@extends("templates.default")

@section("content")
    @include("partials.displayErrors")
    <div class="container py-4">
        <div class="row gx-5 gy-4">
            <!-- Staff Users Table -->
            <div class="col-12">
                <h2 class="mb-4 d-flex align-items-center gap-2">
                    <i class="bi bi-people-fill"></i> STAFF USERS
                </h2>

                <div class="table-responsive shadow-sm rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-primary">
                        <tr>
                            <th scope="col" style="width: 40px;">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="width: 100px;">Ruolo</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if($item->isAdmin)
                                        <span class="badge bg-success">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route("admin.destroy", $item)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Nessun utente trovato.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    {{ $data->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
