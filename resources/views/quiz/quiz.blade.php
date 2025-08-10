@extends("templates.default")

@section("content")
@include("partials.displayErrors")
<div class="container my-4">
    @foreach ($quizQuestions as $index => $question)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Domanda {{ $index + 1 }}:</h5>
                <p class="card-text fw-semibold">{{ $question['question'] }}</p>

                <ul class="list-group">
                    @foreach ($question->answers as $key => $option)
                        <li class="list-group-item d-flex justify-content-between align-items-center
                            @if ($option->correct)
                                list-group-item-success
                            @endif
                        ">
                            {{ $option->answer }}

                            @if ($option->correct)
                                <span class="badge bg-success">Corretta</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>



            <div class="container">
                <form action="{{route("quiz.destroy", $question->id)}}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                </form>

                <a href="{{route("quiz.edit", $question)}}" class="btn btn-primary" role="button"><i class="bi bi-pencil-fill"></i></a>

            </div>

        </div>

    @endforeach
</div>
<div class="mt-3 d-flex justify-content-end">
    {{ $quizQuestions->links('vendor.pagination.bootstrap-5') }}
</div>
@endsection
