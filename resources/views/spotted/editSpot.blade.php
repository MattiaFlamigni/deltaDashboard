@extends("templates.default")

@section("content")
    <form method="POST" action="{{route("spotted.update", $spotted->id)}}">
        @csrf
        @method("PATCH")

        <div class="mb-3">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment" id="comment" cols="30"
                      rows="10">{{$spotted->comment}}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label fw-semibold">Category</label>
            <select name="category" id="category" class="form-select" aria-label="Select category" required>
                <option value="" disabled selected>Seleziona una categoria</option>
                @foreach($categorie as $cat)
                    <option value="{{ $cat }}" @if($cat->nome == $spotted->category) selected @endif>{{ $cat->nome }}</option>
                @endforeach
            </select>
            <div class="form-text">Scegli la categoria appropriata.</div>
        </div>



        <div class="mb-3">
            <label for="subCategory">subCategory</label>
            <input class="form-control" type="text" name="subCategory" id="subCategory" value="{{$spotted->subCategory}} ">
        </div>



        <div class="form-group">
            <button class="btn btn-primary">Invia</button>
        </div>
    </form>
@endsection
