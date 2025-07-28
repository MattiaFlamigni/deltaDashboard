@extends("templates.default")

@section("content")
    @include($view, ["data"=>$data])
@endsection
