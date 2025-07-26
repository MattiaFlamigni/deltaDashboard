@extends("templates.default")

@section("content")
    <form method="POST" action="{{route("curiosity.update", $cur->id)}}">
        @csrf
        @method("PATCH")

        <div class="mb-3">
            <label for="title">Titolo</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$cur->title}} ">
        </div>

        <div class="mb-3">
            <label for="subtitle">SubTitle</label>
            <input class="form-control" type="text" name="subtitle" id="subtitle" value="{{$cur->subtitle}} ">
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30"
                      rows="10">{{$cur->description}}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Invia</button>
        </div>
    </form>
@endsection
