@extends("templates.default")

@section("content")

    <form action="{{ route('quiz.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="question" class="form-label">Domanda</label>
            <textarea class="form-control" id="question" name="question" rows="3" required>{{ old('question') }}</textarea>
        </div>

        <hr>

        <h5>Opzioni (Risposte)</h5>

        @for ($i = 0; $i < 4; $i++)
            <div class="mb-3">
                <label for="answers_{{ $i }}" class="form-label">Risposta {{ $i + 1 }}</label>
                <input type="text" class="form-control" id="answers_{{ $i }}" name="answers[]" value="{{ old('answers.' . $i) }}" required>
            </div>
        @endfor

        <div class="mb-3">
            <label class="form-label">Risposta Corretta</label>
            <div>
                @for ($i = 0; $i < 4; $i++)
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer_{{ $i }}" value="{{ $i }}" {{ old('correct_answer') == $i ? 'checked' : '' }} required>
                        <label class="form-check-label" for="correct_answer_{{ $i }}">Risposta {{ $i + 1 }}</label>
                    </div>
                @endfor
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salva Domanda</button>
    </form>

@endsection
