@extends("templates.default")

@section("content")
    @include("partials.displayErrors")

    <div class="container my-4">

        @foreach ($quizQuestions as $index => $question)
            <div class="card mb-4 shadow-lg border-2">
                <div class="card-body border-1">
                    <!-- Intestazione con domanda e azioni -->
                    <div class="d-flex justify-content-between align-items-center mb-3 border-2">
                        <h5 class="card-title mb-0">
                            Domanda {{ $quizQuestions->firstItem() + $index }}
                        </h5>
                        <div class="d-flex gap-2">
                            <a href="{{ route('quiz.edit', $question) }}" class="btn btn-sm btn-outline-primary" title="Modifica">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('quiz.destroy', $question->id) }}" method="POST" class="m-0 p-0">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Testo della domanda -->
                    <p class="card-text fw-semibold">{{ $question['question'] }}</p>

                    <!-- Lista risposte -->
                    <ul class="list-group list-group-flush card border-2">
                        @foreach ($question->answers as $option)
                            <li class="list-group-item d-flex justify-content-between align-items-center
                            {{ $option->correct ? 'list-group-item-success' : '' }}">
                                {{ $option->answer }}
                                @if ($option->correct)
                                    <span class="badge bg-success">Corretta</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach

        <!-- Pulsante floating per aggiungere domanda -->
        <a href="{{ route('quiz.create') }}"
           class="btn btn-primary rounded-circle shadow-lg position-fixed"
           style="bottom: 30px; right: 30px; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
            <i class="bi bi-plus-lg fs-3"></i>
        </a>

    </div>

    <!-- Paginazione -->
    <div class="mt-4 d-flex justify-content-end">
        {{ $quizQuestions->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
