@extends("templates.default")

@section("content")
    @include("partials.displayErrors")

    <div class="container py-4">
        <div class="row gx-5 gy-4">
            <!-- Prima tabella -->
            <div class="col-12 ">
                <h2 class="mb-3">SPOTTED</h2>
                <div class="table-responsive shadow-sm rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-primary">
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th>Data</th>
                            <th>Immagine</th>
                            <th>Commento</th>
                            <th>Categoria</th>
                            <th>SubCategory</th>
                            <th>Location</th>
                            <th style="width: 110px;">Azioni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spotted as $spot)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $spot->data }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $spot->image_path }}">
                                    <img src="https://cvperzyahqhkdcjjtqvm.supabase.co/storage/v1/object/public/{{ $spot->image_path }}" width="60" height="60" alt="img" style="cursor:pointer;">
                                </a>
                            </td>
                            <td>{{ $spot->comment }}</td>
                            <td>{{ $spot->category }}</td>
                            <td>{{ $spot->subCategory }}</td>
                            <td>{{ $spot->location }}</td>
                            <td>
                                <a href="{{ route('spotted.edit', $spot) }}"> <i class="bi bi-pencil-fill"></i></a>


                                <form action="{{route("spotted.destroy", $spot)}}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
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
                <div class="mt-3 d-flex justify-content-end">
                    {{ $spotted->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- larghezza maggiore -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Immagine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img id="modalImage" src="" alt="Immagine grande" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var imageModal = document.getElementById('imageModal')
            imageModal.addEventListener('show.bs.modal', function (event) {
                var trigger = event.relatedTarget
                var imgSrc = trigger.getAttribute('data-img')
                var modalImage = imageModal.querySelector('#modalImage')
                modalImage.src = imgSrc
            })
        })
    </script>
@endsection





