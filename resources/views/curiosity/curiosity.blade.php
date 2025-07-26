@extends("templates.default")

@section("content")
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Subtitle</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($curiosity as $cur)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $cur->title }}</td>
                <td>{{ $cur->subtitle }}</td>
                <td>{{ $cur->description }}</td>
                <td>
                    <form action="{{route("curiosity.destroy", $cur->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>

                    </form>


                    <a class="btn btn-primary" href="{{route("curiosity.edit", $cur)}}"><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
